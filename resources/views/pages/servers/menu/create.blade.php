@extends('layouts.servers.v1')

@section('title', 'Thêm menu cho website')

@section('content')

    <x-server.assets.content-header route-name="{{ $routeName }}">
    </x-server.assets.content-header>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <x-server.menu.form action="{{ route('server.menu.store') }}">
                        <x-slot name="methodToken">@method('POST')</x-slot>
                        <x-slot name="nameValue">{{ old('name') ?? '' }}</x-slot>
                        <x-slot name="optionsOfSelect">{!! $optionsOfSelect !!}</x-slot>
                    </x-server.menu.form>
                </div>
            </div>
        </div>
    </div>

@endsection
