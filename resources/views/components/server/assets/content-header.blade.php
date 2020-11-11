<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ $collectionMenu->keys()->last() }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @if ($collectionMenu->count() === 1)
                        <li class="breadcrumb-item active">{{ $collectionMenu->keys()->last() }}</li>
                    @else
                        @for ($i = 0; $i < $collectionMenu->count(); $i++)
                            @if ($collectionMenu->keys()[$i] === $collectionMenu->keys()->last())
                                <li class="breadcrumb-item active">{{ $collectionMenu->keys()[$i] }}</li>
                                @break
                            @endif
                            <li class="breadcrumb-item"><a
                                    href="{{ route($collectionMenu->values()[$i]) }}">{{ $collectionMenu->keys()[$i] }}</a>
                            </li>
                        @endfor
                    @endif
                </ol>
            </div>
        </div>
    </div>
</div>
