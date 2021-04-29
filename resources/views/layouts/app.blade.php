<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/customApp.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand text-light" href="{{ url('/') }}">
                    {{ config('app.name', 'pingProject') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Users
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="/pingProject/addNewUser">Add New User</a>
                                  <a class="dropdown-item" href="/pingProject/showAllUsers">Show all Users</a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="/addNewUserRole">Add New Role</a>
                                </div>
                              </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Task
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/currentUserPendingTasks/{{ Auth::user()->user_id }}">My Pending Task</a>
                                    <a class="dropdown-item" href="/currentUserCompletedTasks/{{ Auth::user()->user_id }}">MY Completed Task</a>
                                    <hr class="dropdown-divider bg-light fw-bold">
                                    <a class="dropdown-item" href="/AllUsersPendingTasks">Users Pending Task</a>
                                    <a class="dropdown-item" href="AllUsersCompletedTasks">Users Completed Task</a>
                                    <a class="dropdown-item" href="/directAssignNewTask">Assign New Task</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/addNewTaskCategory">Add new Task Category</a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-light" href="/posts">Posts</a>
                            </li>
                            
                        </ul>
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="/pingProject/focusUser/{{ Auth::user()->user_id }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="/pingProject/focusUser/{{ Auth::user()->user_id }}" class="dropdown-item text-center">
                                        {{-- {{ __('My Profile') }} --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                          </svg>
                                    </a>
                                    <a class="dropdown-item text-center" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{-- {{ __('Logout') }} --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                                            <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
                                            <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                          </svg>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @section('content')
            <div class="container">
                <div class="card mb-3">
                    <img src="{{ URL('images/tp1.jpg') }}" class="d-block w-100" alt="Tupac Quotes">
                    <div class="card-body">
                      <h5 class="card-title">Tupac Quotes</h5>
                    </div>
                </div>
                <div class="card mb-3">
                    <img src="{{ URL('images/tp2.jpg') }}" class="d-block w-100" alt="Tupac Quotes">
                    <div class="card-body">
                      <h5 class="card-title">Tupac Quotes</h5>
                    </div>
                </div>
                <div class="card mb-3">
                    <img src="{{ URL('images/tp3.jpg') }}" class="d-block w-100" alt="Tupac Quotes">
                    <div class="card-body">
                      <h5 class="card-title">Tupac Quotes</h5>
                    </div>
                </div>
                <div class="card mb-3">
                    <img src="{{ URL('images/tp4.jpg') }}" class="d-block w-100" alt="Tupac Quotes">
                    <div class="card-body">
                      <h5 class="card-title">Tupac Quotes</h5>
                    </div>
                </div>
            </div>
        @endsection

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    @stack('script')
</body>
</html>
