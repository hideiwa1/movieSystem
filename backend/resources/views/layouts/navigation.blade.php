<header class="border-bottom bg-light">
    <nav class="navbar navbar-expand-lg navbar-light">

        @if(Auth::guard('admins')->check())
            <form method="POST" action="{{ route('admin.logout') }}" class="container">
            @csrf
        @elseif(Auth::guard('trainers')->check())
            <form method="POST" action="{{ route('logout') }}" class="container">
            @csrf
        @else
            <form action="{{ route('login') }}" class="container">
        @endif
                    
                    <a class="navbar-brand" href="{{ route('index') }}">システム名</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        @if(Auth::guard('admins')->check())
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 col-lg-9  justify-content-around">
                            <li class="nav-item p-3 p-lg-0">
                                <a href="{{ route('movie.list') }}" class="text-body">動画一覧</a>
                            </li>
                            <li class="nav-item p-3 p-lg-0">
                                <a href="{{ route('trainer.list') }}" class="text-body">トレーナー一覧</a>
                            </li>
                            <li class="nav-item p-3 p-lg-0">
                                <a href="{{ route('student.list') }}" class="text-body">生徒一覧</a>
                            </li>

                            <li class="nav-item p-3 p-lg-0">
                                <a href="{{ route('mail.show') }}" class="text-body">メール配信</a>
                            </li>
                        </ul>
                        @else
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 col-lg-9  justify-content-around"></ul>
                        @endif

                        @if(Auth::guard('admins')->check())
                        <x-responsive-nav-link :href="route('admin.logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();" class="btn btn-primary col-lg-3">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                        @elseif(Auth::guard('trainers')->check())
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();" class="btn btn-primary col-lg-3">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                        @else
                        <x-responsive-nav-link :href="route('login')" onclick="event.preventDefault();
                                        this.closest('form').submit();" class="btn btn-primary col-lg-3">
                            {{ __('Log in') }}
                        </x-responsive-nav-link>
                        @endif
                    </div>
                </form>
    </nav>
</header>
