<x-app-layout>

    <x-content>

        <x-slot name="subtitle">
        <h2 class="col-lg-8 mb-0">トレーナー情報　編集画面</h2>
        </x-slot>

        <form method="POST" action="{{ route('student.update') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $student_data -> id ?? ''}}">

        <x-colum-2>
           
        <x-slot name="left">
            <!-- name -->
            <div class="mb-3">
                <x-label-block for="name" :value="__('name')" />
                <x-input-block id="name" class="block mt-1 w-full" type="text" name="name" :value="$student_data -> name ?? old('name')" />
            </div>

            <!-- sex -->
            <div class="mb-3">
                <x-label-block for="sex" :value="__('sex')" />
                <div class="mb-3">
                @foreach($sex_data as $key => $val)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex_id" value="{{$val['id']}}" {{ (old('sex') == $val['id'] ? 'checked': ($student_data ? ($student_data -> sex_id == $val['id']) : '' )) ? 'checked': ''}}>
                        <label class="form-check-label" for="">{{$val['name']}}</label>
                    </div>
                @endforeach
                </div>
            </div>

            <!-- birthday -->
            <div class="mb-3">
                <x-label-block for="birthday" :value="__('birthday')" />
                <x-input-block id="birthday" class="block mt-1 w-full" type="date" name="birthday" :value="$student_data -> birthday ?? old('birthday')" />
            </div>

            <!-- address -->
            <div class="mb-3">
                <x-label-block for="address" :value="__('address')" />
                <x-input-block id="address" class="block mt-1 w-full" type="text" name="address" :value="$student_data -> address ?? old('address')" />
            </div>

            <!-- tel -->
            <div class="mb-3">
                <x-label-block for="tel" :value="__('tel')" />
                <x-input-block id="tel" class="block mt-1 w-full" type="text" name="tel" :value="$student_data -> tel ?? old('tel')" />
            </div>

            <!-- trainer -->
            <div class="mb-3">
                <x-label-block for="trainer" :value="__('担当トレーナー')" />
                <div class="">
                    <select class="form-select" name="trainer_id" aria-label="Default select example">
                        @foreach($trainer_data as $key => $val)
                            <option value="{{$val['id']}}" {{ (old('trainer_id') == $val['id'] ? 'checked': ($student_data ? ($student_data -> trainer_id == $val['id']) :'' ) ) ? 'selected': ''}}>{{$val['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- trainer -->
            <div class="mb-3">
                <x-label-block for="class" :value="__('クラス')" />
                <div class="d-flex flex-wrap justify-content-start">
                    @foreach($class_data as $key => $val)
                        <div class="m-2">
                            <input class="form-check-input d-none checkbox-tag" type="checkbox" name="class_id[]" value="{{ $val -> id }}" id="{{ 'flexCheck'.$val -> id }}"
                             {{ ((is_array(old('class_id')) && array_keys(old('class_id'), $val -> id)) ? 'checked': (($student_data && is_array($student_data -> class_id)) ? (in_array( $val -> id, $student_data -> class_id)) : '' )) ? 'checked': ''}}>
                            <label class="form-check-label border rounded-pill p-2" for="{{ 'flexCheck'.$val -> id }}">
                                {{ $val -> name}}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
    </x-slot>
        
        <x-slot name="right">
            <!-- email -->
            <div class="mb-3">
                <x-label-block for="email" :value="__('email')" />
                <x-input-block id="email" class="block mt-1 w-full" type="text" name="email" :value="$student_data -> email ?? old('email')" />
            </div>

            <!-- status -->
            <div class="mb-3">
                <x-label-block for="status_flg" :value="__('status')" />
                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_flg" value="1" {{ (old('status_flg') == '1' ? 'checked': ($student_data ? ($student_data -> status_flg == '1') : '' )) ? 'checked': ''}}>
                        <label class="form-check-label" for="">参加中</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_flg" value="2" {{ (old('status_flg') == '2' ? 'checked': ($student_data ? ($student_data -> status_flg == '2') : '' )) ? 'checked': ''}}>
                        <label class="form-check-label" for="">退会</label>
                    </div>
                </div>
            </div>

            <!-- 備考欄 -->
            <div class="mb-3">
                <x-label-block for="commetn" :value="__('備考欄')" />
                <div class="col-lg-12">
                    <textarea name="comment" id="comment" rows="5" class="form-control">{{ $student_data -> comment ?? old('comment') }}</textarea>
                </div>
            </div>

        </x-slot>
            
        </x-colum-2>
        <x-button class="ml-4">
            {{ __('Register') }}
        </x-button>
</form>
    </x-content>
</x-app-layout>
