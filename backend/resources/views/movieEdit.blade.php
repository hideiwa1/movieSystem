<x-app-layout>

    <x-content>

        <x-slot name="subtitle">
        <h2 class="mb-0">動画　編集画面</h2>
        </x-slot>
        <style>
            .form .area-drop {
    margin-bottom: 15px;
    width: 100%;
    min-height: 140px;
    background: #f6f5f4;
    color: #ccc;
    text-align: center;
    line-height: 100px;
    position: relative;
    box-sizing: border-box;
}

.form .input-file {
    opacity: 0;
    width: 100%;
    min-height: 140px;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    z-index: 2;
    box-sizing: border-box;
    /* 必ずz-indexをつけないと登録画像を変更する際にドラッグ＆ドロップできなくなる*/
}

.form .prev-img {
    display: block;
    vertical-align: middle;
    width: 100%;
    height: auto;
    position: absolute;
    position: relative;
    top: 0;
    left: 0;
    box-sizing: border-box;
}

.d-d {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.form .imgDrop-container {
    width: 33.333%;
    float: left;
    padding-right: 15px;
    box-sizing: border-box;
}

.form .counter-text {
    text-align: right;
}

.checkbox-tag:checked+label {
    background-color: #0dcaf0;
}
</style>
@if($movie_data)
<form id="deleteForm" method="POST" action="{{ route('movie.delete', ['id' => $movie_data -> id]) }}" hidden>
            @csrf
</form>
@endif

        <form method="POST" action="{{ route('movie.update') }}" enctype="multipart/form-data" class="form">
            @csrf
            <input type="hidden" name="id" value="{{ $movie_data -> id ?? ''}}">

        <x-colum-2>
           
        <x-slot name="left">
            <!-- name -->
            <div class="mb-3">
                <label class="area-drop">
                    <input type="hidden" name="MAX_FILE_SIZE" value="314572800">
                    <input type="file" name="movie" class="input-file">
                    <video src="{{ $movie_data -> filepath ?? '' }}" alt="" class="prev-img">
                    </video>
                    <span class="d-d">ドラッグ＆ドロップ</span>
                </label>
            </div>
            <div class="video-name"></div>

        </x-slot>
        
        <x-slot name="right">
            <!-- email -->
            <div class="mb-3">
                <x-label-block for="name" :value="__('タイトル')" />
                <x-input-block id="name" class="block mt-1 w-full" type="text" name="name" :value="$movie_data -> name ?? old('name')" />
            </div>

            <!-- category -->
            <div class="mb-3">
            <x-label-block for="category_id" :value="__('category')" />
                <div class="">
                    <select class="form-select" name="category_id" aria-label="Default select example">
                        @foreach($category_data as $key => $val)
                            <option value="{{$val['id']}}" {{ (old('category_id') == $val['id'] ? 'checked': ($movie_data ? ($movie_data -> category_id == $val['id']) :'' ) ) ? 'selected': ''}}>{{$val['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- status -->
            <div class="mb-3">
                <x-label-block for="open_flg" :value="__('status')" />
                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="open_flg" value="1" {{ (old('open_flg') == '1' ? 'checked': ($movie_data ? ($movie_data -> open_flg == '1') : '' )) ? 'checked': ''}}>
                        <label class="form-check-label" for="">公開</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="open_flg" value="2" {{ (old('open_flg') == '2' ? 'checked': ($movie_data ? ($movie_data -> open_flg == '2') : '' )) ? 'checked': ''}}>
                        <label class="form-check-label" for="">非公開</label>
                    </div>
                </div>
            </div>

            <!-- 備考欄 -->
            <div class="mb-3">
                <x-label-block for="commetn" :value="__('説明')" />
                <div class="col-lg-12">
                    <textarea name="comment" id="comment" rows="5" class="form-control">{{ $movie_data -> comment ?? old('comment') }}</textarea>
                </div>
            </div>

        </x-slot>
            
        </x-colum-2>
        @if($movie_data)
        <x-button-2 class="ml-4">
            
            <x-slot name="cancel">動画削除</x-slot>
            <x-slot name="submit">保存</x-slot>
        </x-button-2>
        @else
        <x-button>
        {{ __('Register') }}
        </x-button>
        @endif
</form>
<script>
    let dropArea =  document.querySelector('.area-drop');
    let fileInput = document.querySelector('.input-file');
    let videoName =  document.querySelector('.video-name');
    dropArea.addEventListener('dragover', function (e) {
        e.stopPropagation();
        e.preventDefault();
    });

    dropArea.addEventListener('dragleave', function (e) {
        e.stopPropagation();
        e.preventDefault();
    });

    fileInput.addEventListener('change', function (e) {
        var file = this.files[0], // 2. files配列にファイルが入っています
            name = file.name,
            video = document.querySelector('.prev-img'), // 3. jQueryのsiblingsメソッドで兄弟のimgを取得
            fileReader = new FileReader(); // 4. ファイルを読み込むFileReaderオブジェクト

console.log(name);
        // 5. 読み込みが完了した際のイベントハンドラ。imgのsrcにデータをセット
        fileReader.onload = function (event) {
            // 読み込んだデータをimgに設定
            video.src = fileReader.result;
            videoName.textContent = name;
        };

        // 6. 画像読み込み
        fileReader.readAsDataURL(file);

    });

</script>
    </x-content>
</x-app-layout>
