<?php

namespace App\Http\Controllers;

use App\Http\Requests\Server\CategoryRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $type = '';
    public $message = '';
    public $CategoryRepository;

    public function __construct(CategoryRepositoryInterface $CategoryRepository)
    {
        $this->CategoryRepository = $CategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //process search keyword
        $keyword = $request->query('searchString') ?? '';
        $listCategories = $this->CategoryRepository->getElementsUsePaginationAndSearch(5, $keyword);

        //pass data to component to show sub menu
        $routeName = 'server.category.index';

        return view('pages.servers.category.index', compact(['routeName', 'listCategories', 'keyword']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routeName = 'server.category.create';
        $htmlOptions = $this->CategoryRepository->recursive(0);
        return view('pages.servers.category.create', compact(['routeName', 'htmlOptions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param   App\Http\Requests\Server\StoreCategoryPost $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $request->validated();

        $IDCategory = $this->CategoryRepository->create($request->all());
        if ($IDCategory) {
            $this->type = 'primary';
            $this->message = 'Tạo menu thành công';
        } else {
            $this->type = 'danger';
            $this->message = 'Tạo menu thất bại';
        }

        return redirect()->route('server.category.index')->with([
            'type' => $this->type,
            'message' => $this->message
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $routeName = 'server.category.edit';
        $htmlOptions = $this->CategoryRepository->recursive($category->parent_id);
        return view('pages.servers.category.edit', compact(['routeName', 'category', 'htmlOptions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $request->validated();

        $result = $this->CategoryRepository->update($category->id, $request->all());
        if ($result) {
            $this->type = 'primary';
            $this->message = 'Cập nhật thông tin thành công';
        } else {
            $this->type = 'danger';
            $this->message = 'Cập nhật thông tin thất bại';
        }
        return redirect()->route('server.category.index')->with([
            'type' => $this->type,
            'message' => $this->message
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $result = $this->CategoryRepository->remove($category->id);
        if ($result) {
            $this->type = 'primary';
            $this->message = 'Xoá menu thành công';
        } else {
            $this->type = 'danger';
            $this->message = 'Xoá menu thất bại';
        }
        return redirect()->route('server.category.index')->with([
            'type' => $this->type,
            'message' => $this->message
        ]);
    }
}
