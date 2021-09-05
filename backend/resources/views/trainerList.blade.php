<x-app-layout>

    <x-content>

    <x-slot name="submenu">
    <div class="nav d-flex justify-content-between mb-3">
        <div id="TrainerSerch"  class="dropdown col-lg-3 m-2 flex-grow-1"></div>
        <div class="dropdown col-lg-3 m-2 flex-grow-1">
            <button class="btn btn-primary dropdown-toggle w-100" type="button" id="dropdownMenuButton"
                data-bs-toggle="dropdown" aria-expanded="false">
                所属
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="{{ route('trainer.list') }}">全て</a></li>
                @foreach($club_data as $key => $val)
                <li><a class="dropdown-item" href="{{ route('trainer.list', ['id' => $val['id']]) }}">{{$val['name']}}</a></li>
                @endforeach
            </ul>
        </div>
        <a href="{{ route('register') }}" type="button" class="btn btn-primary col-lg-3　 m-2 flex-grow-1">新規トレーナー作成</a>

    </div>
    </x-slot>

    
        <x-slot name="subtitle">
            トレーナー一覧
        </x-slot>
        <div id="TrainerList"></div>
        
    </x-content>
</x-app-layout>
