@extends('layouts.servers.v1')

@section('title', 'Thêm menu cho website')

@section('content')

    <x-server.category.content-header route-name="{{ $routeName }}">
    </x-server.category.content-header>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <x-server.category.form-create action="{{ route('server.category.store') }}">
                        <x-slot name="optionsOfSelect">{!! $htmlOptions !!}</x-slot>
                    </x-server.category.form-create>
                </div>
            </div>
        </div>
    </div>

@endsection
