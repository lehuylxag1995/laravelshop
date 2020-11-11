@extends('layouts.servers.v1')

@section('title', 'Danh sách menu')

@section('content')
    <x-server.assets.content-header route-name="{{ $routeName }}">
    </x-server.assets.content-header>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 mx-auto mb-2 d-flex justify-content-end ">
                    <form action="{{ route('server.menu.index') }}" method="GET" class="form-inline">
                        <input class="form-control mr-sm-2" value="{{ $keyword ?? '' }}" name="searchString" type="search"
                            placeholder="Tên menu" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                    </form>
                </div>
            </div>
            <div class="row">
                @if (session('type') || session('message'))
                    <x-server.assets.alert type="{{ session('type') }}" message="{{ session('message') }}">
                    </x-server.assets.alert>
                @endif
                <div class="col-sm-6 mx-auto">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên menu</th>
                                    <th scope="col">Slug</th>
                                    <th colspan="2">
                                        <a href="{{ route('server.menu.create') }}" class="btn btn-success btn-block"><i
                                                class="fas fa-plus"></i> Add</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listMenu as $menu)
                                    <tr>
                                        <th scope="row">{{ $menu->id }}</th>
                                        <td>{{ $menu->name }}</td>
                                        <td>{{ $menu->slug }}</td>
                                        <td>
                                            <a href="{{ route('server.menu.edit', [$menu]) }}"
                                                class="btn btn-info btn-block"> <i class="far fa-edit"></i>
                                                Sửa</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('server.menu.destroy', [$menu]) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-block"><i
                                                        class="far fa-trash-alt"></i> Xoá</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $listMenu->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
