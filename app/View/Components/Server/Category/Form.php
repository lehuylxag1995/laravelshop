<?php

namespace App\View\Components\Server\Category;

use Illuminate\View\Component;

class Form extends Component
{
    public $action = '';
    public function __construct(string $action)
    {
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.server.category.form');
    }
}
