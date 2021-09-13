<x-app-layout>

    <x-content>

        <x-slot name="subtitle">
        <h2 class="col-lg-8 mb-0">トレーナー詳細</h2>
        </x-slot>

       

        <x-colum-2>
           
        <x-slot name="left">
            <!-- name -->
            <div class="row g-0 mb-3 p-sm-3">
                <x-label-block for="email" :value="__('name')" />
                <x-input-data value="{{$student_data -> name ?? '' }}" />
            </div>

            <!-- sex -->
            <div class="row g-0 mb-3 p-sm-3">
                <x-label-block for="email" :value="__('sex')" />
                <x-input-data value="{{$student_data -> sex -> name ?? '' }}" />
            </div>

            <!-- birthday -->
            <div class="row g-0 mb-3 p-sm-3">
                <x-label-block for="email" :value="__('birthday')" />
                <x-input-data value="{{$student_data -> birthday ?? '' }}" />
            </div>

            <!-- address -->
            <div class="row g-0 mb-3 p-sm-3">
                <x-label-block for="email" :value="__('address')" />
                <x-input-data value="{{$student_data -> address ?? '' }}" />
            </div>

            <!-- tel -->
            <div class="row g-0 mb-3 p-sm-3">
                <x-label-block for="email" :value="__('tel')" />
                <x-input-data value="{{$student_data -> tel ?? '' }}" />
            </div>

            <!-- trainer -->
            <div class="row g-0 mb-3 p-sm-3">
                <x-label-block for="email" :value="__('trainer')" />
                <x-input-data value="{{$student_data -> trainer -> name ?? '' }}" />
            </div>


            <div class="row g-0 mb-3 p-sm-3">
                <x-label-block for="email" :value="__('クラス')" />
                <div class="d-flex flex-wrap justify-content-start">
                    @foreach($class_data as $key => $val)
                        @if( is_array($student_data -> class_id) && (in_array( $val -> id, $student_data -> class_id)))
                        <div class="m-2">
                            <label class="form-check-label border rounded-pill p-2 bg-info" for="{{ 'flexCheck'.$val -> id }}">
                                {{ $val -> name}}
                            </label>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </x-slot>
        
        <x-slot name="right">
            <!-- email -->
            <div class="row g-0 mb-3 p-sm-3">
                <x-label-block for="email" :value="__('email')" />
                <x-input-data value="{{$student_data -> email ?? '' }}" />
            </div>


            <!-- status -->
            <div class="row g-0 mb-3 p-sm-3">
                <x-label-block for="email" :value="__('status')" />
                <x-input-data value="{{$student_data -> status_flg == '1' ? '参加中': '退会' }}" />
            </div>

            <div class="row g-0 mb-3 p-sm-3">
                <x-label-block for="email" :value="__('備考欄')" />
                <p class="ps-3 mb-3">{{$student_data -> comment ?? '' }}</p>
            </div>

        </x-slot>
        </x-colum-2>
        <div class="row g-0 justify-content-center mb-3">
                            <a href="{{ route('student.edit' , ['id' => $student_data -> id]) }}" class="btn btn-primary col-lg-6 m-3">編集する</a>
                        </div>
    </x-content>
</x-app-layout>
