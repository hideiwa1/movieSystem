<x-app-layout>

    <x-content>

    <x-slot name="submenu">
    <div class="nav d-flex justify-content-between mb-3">
        <div class="dropdown col-lg-3 m-2 flex-grow-1">
            <button class="btn btn-primary w-100" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                コースメニュー検索
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">コースメニュー検索</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="mainform" action="" method="get">
                                <label for="" class="form-label">キーワード</label>
                                <input type="text" name="keyword" class="form-control w-100 mb-3">

                                <p class="form-label">公開状況</p>
                                <div class="form-check form-check-inline mb-3">
                                    <input class="form-check-input" type="checkbox" name="open_flg[]" value="1">
                                    <label class="form-check-label" for="">公開</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="open_flg[]" value="2">
                                    <label class="form-check-label" for="">非公開</label>
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
        <a href="menuEdit.html" type="button" class="btn btn-primary flex-grow-1 col-lg-3 m-2">新規コースメニュー作成</a>
        <a href="movieEdit.html" type="button" class="btn btn-primary flex-grow-1 col-lg-3 m-2">動画アップロード</a>
    </div>
    </x-slot>

    
        <x-slot name="subtitle">
        <h2 class="mb-0">体操コースメニュー一覧</h2>
                        
        </x-slot>

        <div id="StudentList"></div>
        
    </x-content>
</x-app-layout>