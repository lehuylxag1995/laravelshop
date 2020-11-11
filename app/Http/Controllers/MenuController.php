<?php

namespace App\Http\Controllers;

use App\Http\Requests\Server\MenuRequest;
use App\Models\Menu;
use App\Repositories\Menu\MenuRepositoryInterface;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public $MenuRepository, $type = '', $message = '';

    public function __construct(MenuRepositoryInterface $MenuRepository)
    {
        $this->MenuRepository = $MenuRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $routeName = 'server.menu.index';
        $keyword = $request->query('searchString') ?? '';
        $listMenu = $this->MenuRepository->getListUsePaginationAndSearch(3, $keyword);
        return view('pages.servers.menu.index', compact(['routeName', 'listMenu', 'keyword']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routeName = 'server.menu.create';
        $optionsOfSelect = $this->MenuRepository->recursive(0);
        return view('pages.servers.menu.create', compact(['routeName', 'optionsOfSelect']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        $request->validated();
        $result = $this->MenuRepository->create($request->all());
        if ($result) {
            $this->type = 'primary';
            $this->message = 'Thêm menu thành công';
        } else {
            $this->type = 'danger';
            $this->message = 'Thêm menu thất bại';
        }
        return redirect()->route('server.menu.index')->with([
            'type' => $this->type,
            'message' => $this->message
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $routeName = 'server.menu.edit';
        $optionsOfSelect = $this->MenuRepository->recursive($menu->parent_id);
        return view('pages.servers.menu.edit', compact(['routeName', 'menu', 'optionsOfSelect']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        $request->validated();
        $result = $this->MenuRepository->edit($menu->id, $request->all());
        if ($result) {
            $this->type = 'primary';
            $this->message = 'Cập nhật menu thành công';
        } else {
            $this->type = 'danger';
            $this->message = 'Cập nhật menu thất bại';
        }
        return redirect()->route('server.menu.index')->with([
            'type' => $this->type,
            'message' => $this->message
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $result = $this->MenuRepository->remove($menu->id);
        if ($result) {
            $this->type = 'primary';
            $this->message = 'Xoá menu thành công';
        } else {
            $this->type = 'danger';
            $this->message = 'Xoá menu thất bại';
        }
        return redirect()->route('server.menu.index')->with([
            'type' => $this->type,
            'message' => $this->message
        ]);
    }
}
