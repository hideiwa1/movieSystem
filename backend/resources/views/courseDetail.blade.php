<x-app-layout>
<x-breadcrumb>
        <li class="breadcrumb-item active" aria-current="page">体操コースメニュー　詳細</li>
    </x-breadcrumb>
    <x-content>

        <x-slot name="subtitle">
        <h2 class="col-lg-8  mb-0">{{$course_data -> name ?? ''}}</h2>
                    <a href="{{ route('course.edit' , ['id' => $course_data -> id]) }}" class="btn btn-secondary col-lg-3 m-2 flex-shrink-1 d-print-none">編集</a>
        </x-slot>
           
        <div class="mb-3 playIcon d-print-none">
            <video controls src="{{$course_items[0] -> movie -> filepath}}" class="border w-100" id="menuVideo">
            </video>
        </div>
        <p>説明</p>
        <p class="border" style="min-height: 100px;">
            {{$course_data -> comment ?? ''}}
        </p>
        <!-- <div style="page-break-after: always;"></div> -->
        <p class="border-bottom">プレイリスト</p>
        @foreach($course_items as $key => $val)
        <div class="mb-3 border-bottom playListCard {{$key==0 ? 'js-now-play' : '' }}">
            <div class="row g-0 align-items-stretch p-2" onClick="playThis({{$key}})">
                <div class="col-lg-2 d-flex align-items-center">
                    No.{{$key + 1}}
                </div>
                <div class="col-lg-3 border js-video-active">
                    <video src="{{$val -> movie -> filepath}}" alt="" class="playListVideo w-100"></video>
                </div>
                <div class="col-lg-7">
                    <div class="card-body">
                        <h5 class="card-title">{{$val -> movie -> name}}</h5>
                        <p class="card-text">
                            <a href="{{route('movie.detail', ['id' => $val -> movie -> id]) }}" class="text-muted">詳細</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </x-content>

    <script>
        let playListVideo = document.querySelectorAll('.playListVideo');
        let playList = [];

        playListVideo.forEach(function (target) {
            let src = target.getAttribute('src');
            playList.push(src);
        });

        console.log(playList);

        let video = document.getElementById('menuVideo');
        let playListCard = document.querySelectorAll('.playListCard');

        video.onended = function () {
            playNext(this.src);
        };

        function playThis(val) {
            video.pause();
            video.setAttribute('src', playList[val]);
            video.play();
            for (var i = 0; i < playList.length; i++) {

                playListCard[i].classList.remove('js-now-play');

                if (i == val) {
                    playListCard[i].classList.add('js-now-play');
                }
            }
        };

        console.log("src: " + decodeURI(video.src).replace("file:///Users/hidemi1/Desktop/movieHtml/", ""));

        function playNext(src) {
            let nextSrc = decodeURI(src).replace("file:///Users/hidemi1/Desktop/movieHtml/", "");

            for (var i = 0; i < playList.length; i++) {

                if (playList[i] == nextSrc) {
                    if(i == playList - 1){
                        playThis(1);
                    }else{
                        playThis(i + 1);
                    }
                    
                }
            }
        };
    </script>
</x-app-layout>
