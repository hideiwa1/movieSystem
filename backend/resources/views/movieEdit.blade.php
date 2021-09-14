<x-app-layout>

    <x-content>

        <x-slot name="subtitle">
        <h2 class="mb-0">動画　編集画面</h2>
        </x-slot>

        <form method="POST" action="{{ route('movie.update') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $ -> id ?? ''}}">

        <x-colum-2>
           
        <x-slot name="left">
            <!-- name -->
            <div class="mb-3">
                <label class="area-drop ">
                    <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
                    <input type="file" name="pic" class="input-file">
                    <video src="" alt="" class="prev-img">
                    </video>
                    <span class="d-d">ドラッグ＆ドロップ</span>
                </label>
            </div>

        </x-slot>
        
        <x-slot name="right">
            <!-- email -->
            <div class="mb-3">
                <x-label-block for="title" :value="__('タイトル')" />
                <x-input-block id="title" class="block mt-1 w-full" type="text" name="title" :value="$student_data -> email ?? old('email')" />
            </div>

            <!-- status -->
            <div class="mb-3">
            <x-label-block for="category" :value="__('category')" />
                <div class="">
                    <select class="form-select" name="category_id" aria-label="Default select example">
                        <@foreach($category_data as $key => $val)
                            <option value="{{$val['id']}}" {{ (old('category_id') == $val['id'] ? 'checked': ($trainer_data ? ($trainer_data -> category_id == $val['id']) :'' ) ) ? 'selected': ''}}>{{$val['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- 備考欄 -->
            <div class="mb-3">
                <x-label-block for="commetn" :value="__('説明')" />
                <div class="col-lg-12">
                    <textarea name="comment" id="comment" rows="5" class="form-control">{{ $student_data -> comment ?? old('comment') }}</textarea>
                </div>
            </div>

        </x-slot>
            
        </x-colum-2>
        <x-button-2 class="ml-4">
            <x-slot name="cancel">動画削除</x-slot>
            <x-slot name="submit">保存</x-slot>
        </x-button>
</form>
    </x-content>
</x-app-layout>
