{{-- <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/">Groot</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle myFont" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            User
                        </a>
                        <ul class="dropdown-menu bg-secondary" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item myFont" href="#">Add New Member</a></li>
                            <li><a class="dropdown-item myFont" href="#">Show All Users</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle  myFont" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Task
                        </a>
                        <ul class="dropdown-menu bg-secondary" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item myFont" href="#">My Pending Task</a></li>
                            <li><a class="dropdown-item myFont" href="#">MY Completed Task</a></li>
                            <li>
                                <hr class="dropdown-divider bg-light fw-bold">
                            </li>
                            <li><a class="dropdown-item myFont" href="#">Users Pending Task</a></li>
                            <li><a class="dropdown-item myFont" href="#">Users Completed Task</a></li>
                            <li><a class="dropdown-item myFont" href="#">Assign New Task</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link" href="/posts">Posts</a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active myFont" aria-current="page" href="#">userName</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active myFont" aria-current="page" href="#">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div> --}}


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection