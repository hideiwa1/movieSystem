<x-app-layout>
    <x-breadcrumb>
        <li class="breadcrumb-item active" aria-current="page">管理者アカウント一覧</li>
    </x-breadcrumb>
    <x-content>
        <x-slot name="subtitle">
            <h2 class="col-lg-8 mb-0">管理者アカウント一覧</h2>
                        
            <a href="{{ route('admin.register') }}" type="button"
                class="btn btn-secondary col-lg-3 m-2 flex-shrink-1">新規アカウント作成</a>
        </x-slot>
        
        @foreach($admin_data as $key => $val)
        <div class="mb-3 border-bottom">
            <div class="row g-0 align-items-center p-2">
                <div class="col-lg-3">
                    <span>{{$val -> name}}</span>
                </div>
                <div class="col-lg-4">
                    <span>{{$val -> email}}</span>
                </div>
                <div class="col-lg-5 d-flex align-items-center">
                    <div class="row g-0 flex-grow-1 text-center justify-content-between">
                        <a href="{{ route('admin.edit', ['id' => $val -> id]) }}" class="btn btn-secondary col-sm-5 m-2" type="button">
                            詳細
                        </a>
                        <button class="btn btn-secondary  col-sm-5 m-2" type="button" data-bs-toggle="modal"
                            data-bs-target="{{'#deleteModal'.$val -> id}}">
                            削除
                        </button>

                        <div class="modal fade" id="{{'deleteModal'.$val -> id}}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="{{'deleteform'.$val -> id}}" action="{{route('admin.delete', ['id' => $val -> id]) }}" method="post">
                                        @csrf

                                            <p>このアカウントを削除します。<br />
                                            よろしいですか？</p>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal"
                                            data-bs-target="{{'#deleteModal'.$val -> id}}">閉じる</button>
                                        <button type="submit" form="{{'deleteform'.$val -> id}}"
                                            class="btn btn-primary col-lg-4">削除する</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </x-content>
</x-app-layout>