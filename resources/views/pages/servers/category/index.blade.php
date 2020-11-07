@extends('layouts.servers.v1')

@section('title', 'Danh sách menu')

@section('content')
    <x-server.category.contentheader route-name="{{ $routeName }}">
    </x-server.category.contentheader>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 mx-auto mb-2 d-flex justify-content-end ">
                    <form action="{{ route('server.category.index') }}" method="GET" class="form-inline">
                        {{-- @csrf --}}
                        <input class="form-control mr-sm-2" value="{{ $keyword ?? '' }}" name="searchString" type="search"
                            placeholder="Tên menu" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                    </form>
                </div>
            </div>
            <div class="row">
                @if (session('type') || session('message'))
                    <x-alert type="{{ session('type') }}" message="{{ session('message') }}"></x-alert>
                @endif
                <div class="col-sm-6 mx-auto">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên thể loại</th>
                                    <th scope="col">Slug</th>
                                    <th colspan="2">
                                        <a href="{{ route('server.category.create') }}" class="btn btn-success btn-block"><i
                                                class="fas fa-plus"></i> Add</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listCategories as $category)
                                    <tr>
                                        <th scope="row">{{ $category->id }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            <a href="{{ route('server.category.edit', [$category]) }}"
                                                class="btn btn-info btn-block"> <i class="far fa-edit"></i>
                                                Sửa</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('server.category.destroy', [$category]) }}"
                                                method="post">
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
                        {{ $listCategories->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
