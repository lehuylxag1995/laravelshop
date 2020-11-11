<?php

namespace App\Repositories\Menu;

use App\Models\Menu;
use Illuminate\Support\Str;

class MenuRepository implements MenuRepositoryInterface
{
    public $html = '';

    public function getListUsePaginationAndSearch(int $perPage, string $keyword = '')
    {
        $list = new Menu();
        if (Str::of($keyword)->trim()->isNotEmpty() && $keyword != NULL)
            $list = $list::searchName($keyword);
        $list = $list->latest()->paginate($perPage);
        return $list;
    }

    public function getInfoById(int $id)
    {
        return Menu::findOrFail($id);
    }

    public function create(array $attributes = [])
    {
        $Menu = new Menu();
        $Menu->name = $attributes['name'];
        $Menu->slug = Str::slug($attributes['name']);
        $Menu->parent_id = $attributes['parent_id'] ?? 0;
        $Menu->save();
        return $Menu->id;
    }

    public function edit(int $id, array $attributes = [])
    {
        $menuInfo = $this->getInfoById($id);
        $menuInfo->name = $attributes['name'];
        $menuInfo->slug = Str::slug($attributes['name']);
        $menuInfo->parent_id = $attributes['parent_id'];
        return $menuInfo->save();
    }

    public function remove(int $id)
    {
        return $this->getInfoById($id)->delete();
    }

    public function recursive(int $parent_id, int $root = 0, string $text = '')
    {
        $data = Menu::all();

        foreach ($data as $key => $item) {
            if ($item['parent_id'] === $root) {
                if ($item['id'] === $parent_id)
                    $this->html .= '<option selected value="' . $item['id'] . '">' . $text . $item['name'] . '</option>';
                else
                    $this->html .= '<option value="' . $item['id'] . '">' . $text . $item['name'] . '</option>';
                $this->recursive($item['parent_id'], $item['id'], $text . '---');
            }
        }
        return $this->html;
    }
}
