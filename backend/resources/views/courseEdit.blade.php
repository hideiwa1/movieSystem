<x-app-layout>
    <x-breadcrumb>
        <li class="breadcrumb-item active" aria-current="page">体操コースメニュー　編集</li>
    </x-breadcrumb>
    <x-content>

        <x-slot name="subtitle">
        <h2 class="mb-0">コースメニュー　編集画面</h2>
        </x-slot>
        <style>
</style>
@if($course_data)
<form id="deleteForm" method="POST" action="{{ route('course.delete', ['id' => $course_data -> id]) }}" hidden>
            @csrf
</form>
@endif
<div id="CourseEdit"></div>


    </x-content>
</x-app-layout>
