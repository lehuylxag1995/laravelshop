<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryRepository implements CategoryRepositoryInterface
{
    public $htmlOptions = '';
    public function create($attributes = [])
    {
        $category = new Category();
        $category->name = $attributes['name'];
        $category->slug = Str::slug($attributes['name']);
        $category->parent_id = $attributes['parent_id'];
        $category->save();
        return $category->id;
    }

    public function getInfoById(int $id)
    {
        return Category::findOrFail($id);
    }

    public function update(int $id, array $attributes = [])
    {
        $categoryInfo = $this->getInfoById($id);
        $categoryInfo->name = $attributes['name'];
        $categoryInfo->slug = Str::slug($attributes['name']);
        $categoryInfo->parent_id = $attributes['parent_id'];
        return $categoryInfo->save();
    }

    public function recursive(int $parent_id, int $root = 0, string $text = '')
    {
        $collectionCategory = Category::all();
        foreach ($collectionCategory as $index => $item) {
            if ($item['parent_id'] == $root) {
                if (!empty($parent_id) && $item['id'] == $parent_id)
                    $this->htmlOptions .= '<option selected value="' . $item['id'] . '">' . $text . $item['name'] . '</option>';
                else
                    $this->htmlOptions .= '<option value="' . $item['id'] . '">' . $text . $item['name'] . '</option>';
                $this->recursive($parent_id, $item['id'], $text . '---');
            }
        }
        return $this->htmlOptions;
    }

    public function getElementsUsePaginationAndSearch($perPage, $keyword = '')
    {
        if (Str::of($keyword)->trim()->isNotEmpty())
            $pagination = Category::searchName($keyword)->pagination($perPage);
        else
            $pagination = Category::pagination($perPage);
        return $pagination;
    }
}
