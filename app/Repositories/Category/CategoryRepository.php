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

    public function recursive($parent_id = 0, $text = '')
    {
        $collectionCategory = Category::all();
        foreach ($collectionCategory as $index => $item) {
            if ($item['parent_id'] == $parent_id) {
                $this->htmlOptions .= '<option value="' . $item['id'] . '">' . $text . $item['name'] . '</option>';
                $this->recursive($item['id'], $text . '---');
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
