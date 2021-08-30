<x-app-layout>

    <x-content>

    <x-slot name="submenu">
    <div class="nav d-flex justify-content-between mb-3">
        <div class="dropdown col-lg-3 m-2 flex-grow-1">
            <button class="btn btn-primary w-100" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                トレーナー検索
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">トレーナー検索</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="mainform" action="" method="get">
                                <label for="" class="form-label">キーワード</label>
                                <input type="text" name="keyword" class="form-control w-100 mb-3">

                                <label for="" class="form-label">所属</label>
                                <select class="form-select mb-3" aria-label="Default select example">
                                    <option value='' selected>全て</option>
                                    @foreach($club_data as $key => $val)
                                    <option value="{{$val['id']}}">{{$val['name']}}</option>
                                    @endforeach
                                </select>

                                <p class="form-label">参加状況</p>
                                <div class="form-check form-check-inline mb-3">
                                    <input class="form-check-input" type="checkbox" name="status_flg[]"
                                        value="1">
                                    <label class="form-check-label" for="">参加中</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="status_flg[]"
                                        value="2">
                                    <label class="form-check-label" for="">退会</label>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                data-bs-target="#exampleModal">閉じる</button>
                            <button type="submit" form="mainform"
                                class="btn btn-primary col-lg-4">検索する</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
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

        <div id="example"></div>
        @foreach($trainer_data as $key => $val)
        <div class="mb-3 border-bottom">
                        <div class="row g-0 align-items-stretch p-2">
                            <div class="col-lg-3">
                                <span>{{$val['name']}}</span>
                            </div>
                            <div class="col-lg-2">
                                <span>{{ $val -> club -> name ?? ''}}</span>
                            </div>
                            <div class="col-lg-7 d-flex align-items-center">
                                <div class="row g-0 flex-grow-1 text-center justify-content-around">
                                    <a href="{{ route('trainer.detail', ['id' => $val['id']]) }}" class="col-sm-3 btn btn-secondary m-2">詳細</a>

                                    <a href="studentList.html" class="col-sm-3 btn btn-secondary m-2">担当生徒一覧</a>

                                    
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach

        
    </x-content>
</x-app-layout>
