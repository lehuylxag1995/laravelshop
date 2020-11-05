<?php

namespace App\View\Components\Server\Category;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class ContentHeader extends Component
{
    public $collectionMenu;
    public function __construct($routeName = null)
    {
        $this->collectionMenu = $this->createCollectionMenu($routeName);
    }

    public function createCollectionMenu($routeName)
    {
        $routeName = Str::of($routeName)->lower()->trim();
        switch ($routeName) {
            case 'server.category.index':
                return collect([
                    'Danh sách menu của website' => 'server.category.index'
                ]);
                break;
            case 'server.category.create':
                return collect([
                    'Danh sách menu' => 'server.category.index',
                    'Thêm menu' => 'server.category.create'
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
        return view('components.server.category.content-header');
    }
}
