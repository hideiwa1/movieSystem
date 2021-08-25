<header class="border-bottom bg-light">
    <nav class="navbar navbar-expand-lg navbar-light">
    
        
        <form method="POST" action="{{ route('logout') }}"  class="container">
                    @csrf
            <a class="navbar-brand" href="{{ route('index') }}">システム名</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0 col-lg-9  justify-content-around">
                    <li class="nav-item p-3 p-lg-0">
                        <a href="movieList.html" class="text-body">動画一覧</a>
                    </li>
                    <li class="nav-item p-3 p-lg-0">
                        <a href="trainerList.html" class="text-body">トレーナー一覧</a>
                    </li>
                    <li class="nav-item p-3 p-lg-0">
                        <a href="studentList.html" class="text-body">生徒一覧</a>
                    </li>
                    <li class="nav-item p-3 p-lg-0">
                        <a href="mail.html" class="text-body">メール配信</a>
                    </li>
                </ul>


                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="btn btn-primary col-lg-3">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
            </div>
        </form>
    </nav>
</header>
