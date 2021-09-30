<x-app-layout>
    <x-breadcrumb>

    </x-breadcrumb>
    <x-content>

    <x-slot name="submenu">
    <div class="nav d-flex justify-content-between mb-3">
        <div id="CourseSerch"  class="dropdown col-lg-3"></div>
        <a href="{{route('course.edit') }}" type="button" class="btn btn-primary  col-lg-3">新規コースメニュー作成</a>
        <a href="{{ route('movie.edit') }}" type="button" class="btn btn-primary  col-lg-3">動画アップロード</a>
    </div>
    </x-slot>

    
        <x-slot name="subtitle">
        <h2 class="mb-0">体操コースメニュー一覧</h2>
                        
        </x-slot>

        <div id="CourseList"></div>
        
    </x-content>
</x-app-layout>