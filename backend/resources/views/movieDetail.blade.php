<x-app-layout>
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('movie.list') }}">動画一覧</a></li>
        <li class="breadcrumb-item active" aria-current="page">動画詳細</li>
    </x-breadcrumb>
    <x-content>

        <x-slot name="subtitle">
        <h2 class="mb-0">動画詳細画面</h2>
        </x-slot>

        <x-colum-2>
           
        <x-slot name="left">
            <!-- name -->
            <div class="mb-3">
                <label class="area-drop">
                    <video controls src="{{ $movie_data -> filepath ?? '' }}" alt="" class="prev-img w-100">
                    </video>
                </label>
            </div>
            <div class="video-name"></div>

        </x-slot>
        
        <x-slot name="right">
            <!-- email -->
            <div class="mb-3">
                <x-label-block for="name" :value="__('タイトル')" />
                <x-input-data value="{{$movie_data -> name ?? '' }}" />
            </div>

            <!-- category -->
            <div class="mb-3">
                <x-label-block for="category_id" :value="__('category')" />
                <x-input-data value="{{$movie_data -> category -> name ?? '' }}" />
            </div>

            <!-- status -->
            <div class="mb-3">
                <x-label-block for="open_flg" :value="__('status')" />
                <x-input-data value="{{$movie_data -> open_flg == '1' ? '公開中': '非公開' }}" />
            </div>

            <!-- 備考欄 -->
            <div class="mb-3">
                <x-label-block for="commetn" :value="__('説明')" />
                <p class="ps-3 mb-3">{{$movie_data -> comment ?? '' }}</p>
                
            </div>

        </x-slot>
            
        </x-colum-2>
        <div class="row g-0 justify-content-center mb-3">
            <a href="{{ route('movie.edit' , ['id' => $movie_data -> id]) }}" class="btn btn-primary col-lg-6 m-3">編集する</a>
        </div>

    </x-content>
</x-app-layout>
