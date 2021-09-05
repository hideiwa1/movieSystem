<x-app-layout>

    <x-content>

        <x-slot name="subtitle">
        <h2 class="col-lg-8 mb-0">トレーナー情報　編集画面</h2>
        </x-slot>

        <form method="POST" action="{{ route('trainer.update') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $trainer_data -> id ?? ''}}">

        <x-colum-2>
           
        <x-slot name="left">
            <!-- name -->
            <div class="mb-3">
                <x-label-block for="name" :value="__('name')" />
                <x-input-block id="name" class="block mt-1 w-full" type="text" name="name" :value="$trainer_data -> name ?? old('name')" />
            </div>

            <!-- sex -->
            <div class="mb-3">
                <x-label-block for="sex" :value="__('sex')" />
                <div class="mb-3">
                @foreach($sex_data as $key => $val)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex_id" value="{{$val['id']}}" {{ (old('sex') == $val['id'] ? 'checked': ($trainer_data -> sex_id == $val['id'])) ? 'checked': ''}}>
                        <label class="form-check-label" for="">{{$val['name']}}</label>
                    </div>
                @endforeach
                </div>
            </div>

            <!-- birthday -->
            <div class="mb-3">
                <x-label-block for="birthday" :value="__('birthday')" />
                <x-input-block id="birthday" class="block mt-1 w-full" type="date" name="birthday" :value="$trainer_data -> birthday ?? old('birthday')" />
            </div>

            <!-- club -->
            <div class="mb-3">
                <x-label-block for="club" :value="__('club')" />
                <div class="">
                    <select class="form-select" name="club_id" aria-label="Default select example">
                        <@foreach($club_data as $key => $val)
                            <option value="{{$val['id']}}" {{ (old('club_id') == $val['id'] ? 'checked': ($trainer_data -> club_id == $val['id'])) ? 'selected': ''}}>{{$val['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- category -->
            <div class="mb-3">
                <x-label-block for="category" :value="__('category')" />
                <div class="">
                    <select class="form-select" name="category_id" aria-label="Default select example">
                        <@foreach($category_data as $key => $val)
                            <option value="{{$val['id']}}" {{ (old('category_id') == $val['id'] ? 'checked': ($trainer_data -> category_id == $val['id'])) ? 'selected': ''}}>{{$val['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- address -->
            <div class="mb-3">
                <x-label-block for="address" :value="__('address')" />
                <x-input-block id="address" class="block mt-1 w-full" type="text" name="address" :value="$trainer_data -> address ?? old('address')" />
            </div>

            <!-- tel -->
            <div class="mb-3">
                <x-label-block for="tel" :value="__('tel')" />
                <x-input-block id="tel" class="block mt-1 w-full" type="text" name="tel" :value="$trainer_data -> tel ?? old('tel')" />
            </div>
        </x-slot>
        
        <x-slot name="right">
            <!-- email -->
            <div class="mb-3">
                <x-label-block for="email" :value="__('email')" />
                <x-input-block id="email" class="block mt-1 w-full" type="text" name="email" :value="$trainer_data -> email ?? old('email')" />
            </div>

            <!-- 体操コースメニュー作成権限 -->
            <div class="mb-3">
                <x-label-block for="create_flg" :value="__('体操コースメニュー作成権限')" />
                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="create_flg" value="1" {{ (old('create_flg') == '1' ? 'checked': ($trainer_data -> create_flg == '1')) ? 'checked': ''}}>
                        <label class="form-check-label" for="">登録可</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="create_flg" value="2" {{ (old('create_flg') == '2' ? 'checked': ($trainer_data -> create_flg == '2')) ? 'checked': ''}}>
                        <label class="form-check-label" for="">登録不可</label>
                    </div>
                </div>
            </div>

            <!-- status -->
            <div class="mb-3">
                <x-label-block for="status_flg" :value="__('status')" />
                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_flg" value="1" {{ (old('status_flg') == '1' ? 'checked': ($trainer_data -> status_flg == '1')) ? 'checked': ''}}>
                        <label class="form-check-label" for="">参加中</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_flg" value="2" {{ (old('status_flg') == '2' ? 'checked': ($trainer_data -> status_flg == '2')) ? 'checked': ''}}>
                        <label class="form-check-label" for="">退会</label>
                    </div>
                </div>
            </div>

            <a href="studentList.html" class="btn btn-secondary w-100" type="button">
                                    担当生徒一覧
                                </a>
        </x-slot>
        </x-colum-2>
        <x-button class="ml-4">
            {{ __('Register') }}
        </x-button>
</form>
    </x-content>
</x-app-layout>
