<?php

namespace App\View\Components\Server\Menu;

use Illuminate\View\Component;

class Form extends Component
{
    public $action;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $action = '')
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
        return view('components.server.menu.form');
    }
}
