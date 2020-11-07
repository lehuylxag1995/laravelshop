@extends('layouts.servers.v1')

@section('title', 'Thêm menu cho website')

@section('content')

    <x-server.category.contentheader route-name="{{ $routeName }}">
    </x-server.category.contentheader>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <x-server.category.formcreate action="{{ route('server.category.store') }}">
                        <x-slot name="optionsOfSelect">{!! $htmlOptions !!}</x-slot>
                    </x-server.category.formcreate>
                </div>
            </div>
        </div>
    </div>

@endsection
