<?php

namespace App\Http\Controllers;

use App\Http\Requests\Server\StoreCategoryPost;
use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
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
        $keyword = $request->query('searchString') ?? '';
        $listCategories = $this->CategoryRepository->getElementsUsePaginationAndSearch(5, $keyword);
        $routeName = 'server.category.index';
        return view('pages.servers.category.index', compact(['routeName', 'listCategories','keyword']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routeName = 'server.category.create';
        return view('pages.servers.category.create', compact(['routeName']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param   App\Http\Requests\Server\StoreCategoryPost $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryPost $request)
    {
        $request->validated();
        $IDCategory = $this->CategoryRepository->create($request->all());
        if ($IDCategory)
            return redirect()->route('server.category.index')->with([
                'type' => 'primary',
                'message' => 'Tạo menu thành công',
            ]);
        else
            return redirect()->route('server.category.index')->with([
                'type' => 'danger',
                'message' => 'Tạo menu thất bại'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
