<?php

namespace App\View\Components\Server\Assets;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class ContentHeader extends Component
{
    public $collectionMenu;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $routeName)
    {
        $this->collectionMenu = $this->createCollectionMenu($routeName);
    }

    public function createCollectionMenu($routeName)
    {
        $routeName = Str::of($routeName)->lower()->trim();
        switch ($routeName) {
            case 'server.category.index':
                return collect([
                    'Danh sách thể loại sản phẩm' => 'server.category.index'
                ]);
                break;
            case 'server.category.create':
                return collect([
                    'Danh sách thể loại' => 'server.category.index',
                    'Thêm thể loại' => 'server.category.create'
                ]);
                break;
            case 'server.category.edit':
                return collect([
                    'Danh sách thể loại' => 'server.category.index',
                    'Sửa thể loại' => 'server.category.edit'
                ]);
                break;
            case 'server.menu.index':
                return collect([
                    'Danh sách menu của website' => 'server.menu.index',
                ]);
                break;
            case 'server.menu.create':
                return collect([
                    'Danh sách menu' => 'server.menu.index',
                    'Thêm menu' => 'server.menu.create'
                ]);
                break;
            case 'server.menu.edit':
                return collect([
                    'Danh sách menu' => 'server.menu.index',
                    'Sửa menu' => 'server.menu.edit'
                ]);
                break;
            default:
                return collect(['']);
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.server.assets.content-header');
    }
}
