<?php

namespace App\View\Components\Server\Category;

use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\View\Component;

class FormCreate extends Component
{
    public $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $htmlOptions = $this->categoryRepository->recursive() ?? '';
        return view('components.server.category.form-create', compact(['htmlOptions']));
    }
}
