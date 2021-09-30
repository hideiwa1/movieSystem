<aside class="col-lg-3 bg-light border-end p-3 d-none d-lg-block">
    <div class="border p-2 mb-3">
        <img src="" alt="">
    </div>
    <p><a href="{{ route('index') }}" class="text-body">体操コースメニュー一覧</a></p>
    <p>動画一覧<br>
        <ul class="nav flex-column ml-2">
        <li class="nav-item">
                <a href="{{ route('movie.list') }}" class="text-body">全て</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('movie.list' , ['category_id' => 1]) }}" class="text-body">メニュー</a>
            </li>
            <li class="nav-item">
                <a href="movieList.html" class="text-body">メニュー</a>
            </li>
            <li class="nav-item">
                <a href="movieList.html" class="text-body">メニュー</a>
            </li>
            <li class="nav-item">
                <a href="movieList.html" class="text-body">メニュー</a>
            </li>
        </ul>
    </p>

    <p>
        <a href="{{ route('trainer.list') }}" class="text-body">トレーナー一覧</a>
    </p>

    <p>
        <a href="{{ route('student.list') }}" class="text-body">生徒一覧</a>
    </p>

    <p>
        <a href="{{ route('mail.show') }}" class="text-body">メール配信</a>
    </p>
    <p>
        <a href="{{ route('admin.list') }}" class="text-body">管理者アカウント管理</a>
    </p>
    <p>
        <a href="{{ route('admin.mail.list') }}" class="text-body">メール配信管理</a>
    </p>


</aside>
