<x-app-layout>
    <x-breadcrumb>
        <li class="breadcrumb-item active" aria-current="page">生徒一覧</li>
    </x-breadcrumb>

    <x-content>

    <x-slot name="submenu">
    <div class="nav d-flex justify-content-between mb-3">
        <div id="StudentSerch"  class="dropdown col-lg-3 m-2 flex-grow-1"></div>
        <button class="btn btn-primary col-lg-3 m-2 flex-grow-1" type="button" data-bs-toggle="modal"
            data-bs-target="#importModal">
            ファイル取り込み
        </button>
        <div class="modal fade" id="importModal" tabindex="-1"
            aria-labelledby="importModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>ファイル取り込みによる生徒追加</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="importform" action="{{route('student.import')}}" method="POST" class="text-center" enctype="multipart/form-data">
                        @csrf
                        <label for="csvFile">
                            <span id="filename" class="btn btn-primary">クリックしてファイルを選択してください</span>
                            <input type="file" id="csvFile" name="csvFile" style="display:none;">
                        </label>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal"
                            data-bs-target="#importModal">閉じる</button>
                        <button type="submit" form="importform"
                            class="btn btn-primary col-lg-4">削除する</button>
                    </div>

                </div>
            </div>
        </div>
        <a href="{{ route('student.edit') }}" type="button" class="btn btn-primary col-lg-3 m-2 flex-grow-1">新規生徒作成</a>

    </div>
    </x-slot>

    
        <x-slot name="subtitle">
        <h2 class="col-lg-8 mb-0">生徒一覧</h2>
                        
        <div id="StudentCSV" class="btn btn-secondary col-lg-3 m-2 flex-shrink-1"></div>
        </x-slot>
        <form action="{{ route('mail.select') }}" method="post">
        @csrf

        <div id="StudentList"></div>

</form>
        
    </x-content>
</x-app-layout>