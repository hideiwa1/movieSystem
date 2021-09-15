<x-app-layout>

    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="#">Library</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
    </x-breadcrumb>
    <x-content>

    <x-slot name="submenu">
    <div class="nav d-flex justify-content-between mb-3">
        <div id="StudentSerch"  class="dropdown col-lg-3"></div>
        
        <a href="{{ route('student.edit') }}" type="button" class="btn btn-primary col-lg-3">新規生徒作成</a>

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