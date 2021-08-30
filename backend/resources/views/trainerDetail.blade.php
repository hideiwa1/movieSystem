<x-app-layout>

    <x-content>

        <x-slot name="subtitle">
            トレーナー詳細
        </x-slot>

       

        <x-colum-2>
           
        <x-slot name="left">
            <!-- name -->
            <div class="row g-0 mb-3 p-sm-3">
                <x-label-block for="email" :value="__('name')" />
                <x-input-data value="{{$trainer_data -> name ?? '' }}" />
            </div>

            <!-- sex -->
            <div class="row g-0 mb-3 p-sm-3">
                <x-label-block for="email" :value="__('sex')" />
                <x-input-data value="{{$trainer_data -> sex ?? '' }}" />
            </div>

            <!-- birthday -->
            <div class="row g-0 mb-3 p-sm-3">
                <x-label-block for="email" :value="__('birthday')" />
                <x-input-data value="{{$trainer_data -> birthday ?? '' }}" />
            </div>

            <!-- club -->
            <div class="row g-0 mb-3 p-sm-3">
                <x-label-block for="email" :value="__('club')" />
                <x-input-data value="{{$trainer_data -> club -> name ?? '' }}" />
            </div>

            <!-- category -->
            <div class="row g-0 mb-3 p-sm-3">
                <x-label-block for="email" :value="__('category')" />
                <x-input-data value="{{$trainer_data -> category -> name ?? '' }}" />
            </div>

            <!-- address -->
            <div class="row g-0 mb-3 p-sm-3">
                <x-label-block for="email" :value="__('address')" />
                <x-input-data value="{{$trainer_data -> address ?? '' }}" />
            </div>

            <!-- tel -->
            <div class="row g-0 mb-3 p-sm-3">
                <x-label-block for="email" :value="__('tel')" />
                <x-input-data value="{{$trainer_data -> tel ?? '' }}" />
            </div>
        </x-slot>
        
        <x-slot name="right">
            <!-- email -->
            <div class="row g-0 mb-3 p-sm-3">
                <x-label-block for="email" :value="__('email')" />
                <x-input-data value="{{$trainer_data -> email ?? '' }}" />
            </div>

            <!-- 体操コースメニュー作成権限 -->
            <div class="row g-0 mb-3 p-sm-3">
                <x-label-block for="email" :value="__('体操コースメニュー作成権限')" />
                <x-input-data value="{{$trainer_data -> create_flg ?? '' }}" />
            </div>

            <!-- status -->
            <div class="row g-0 mb-3 p-sm-3">
                <x-label-block for="email" :value="__('status')" />
                <x-input-data value="{{$trainer_data -> status ?? '' }}" />
            </div>

            <a href="studentList.html" class="btn btn-secondary w-100" type="button">
                                    担当生徒一覧
                                </a>
        </x-slot>
        </x-colum-2>
        <div class="row g-0 justify-content-center mb-3">
                            <a href="trainerEdit.html" class="btn btn-primary col-lg-6 m-3">編集する</a>
                        </div>
    </x-content>
</x-app-layout>
