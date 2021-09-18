<x-app-layout>

    <x-content>

        <x-slot name="subtitle">
        <h2 class="mb-0">コースメニュー　編集画面</h2>
        </x-slot>
        <style>
</style>
@if($course_data)
<form id="deleteForm" method="POST" action="{{ route('course.delete', ['id' => $movie_data -> id]) }}" hidden>
            @csrf
</form>
@endif
<div id="CourseEdit"></div>

        

            
<script>
    let dropArea =  document.querySelector('.area-drop');
    let fileInput = document.querySelector('.input-file');
    let videoName =  document.querySelector('.video-name');
    dropArea.addEventListener('dragover', function (e) {
        e.stopPropagation();
        e.preventDefault();
    });

    dropArea.addEventListener('dragleave', function (e) {
        e.stopPropagation();
        e.preventDefault();
    });

    fileInput.addEventListener('change', function (e) {
        var file = this.files[0], // 2. files配列にファイルが入っています
            name = file.name,
            video = document.querySelector('.prev-img'), // 3. jQueryのsiblingsメソッドで兄弟のimgを取得
            fileReader = new FileReader(); // 4. ファイルを読み込むFileReaderオブジェクト

console.log(name);
        // 5. 読み込みが完了した際のイベントハンドラ。imgのsrcにデータをセット
        fileReader.onload = function (event) {
            // 読み込んだデータをimgに設定
            video.src = fileReader.result;
            videoName.textContent = name;
        };

        // 6. 画像読み込み
        fileReader.readAsDataURL(file);

    });

</script>
    </x-content>
</x-app-layout>
