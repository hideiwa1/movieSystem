<x-app-layout>
    <x-breadcrumb>
        <li class="breadcrumb-item active" aria-current="page">動画一覧</li>
    </x-breadcrumb>
    <x-content>

    <x-slot name="submenu">
    <div class="nav d-flex justify-content-between mb-3">
        <div id="MovieSerch"  class="dropdown col-lg-3"></div>
        
        <a href="{{ route('movie.edit') }}" type="button" class="btn btn-primary col-lg-3">動画アップロード</a>

    </div>
    </x-slot>

    
        <x-slot name="subtitle">
            <h2 class="col-lg-8 mb-0">動画一覧</h2>
                        
            
        </x-slot>
        <div id="MovieList"></div>
        
    </x-content>
</x-app-layout>