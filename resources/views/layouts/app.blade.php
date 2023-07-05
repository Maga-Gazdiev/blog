<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posts</title>
</head>

<style>
    .text {
        font-family: Verdana, Helvetica, Arial, sans-serif;
        color: black;
        text-decoration: none;
    }
</style>

<body class="container-lg">
    <header class="flex-shrink-0">
        <div>
            <div id="app">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="navbar navbar-expand-md px-5">
                        <a class="navbar-brand flex items-center" href="{{ route('posts') }}">
                            <a class="text fs-2">Главная</a>
                        </a>

                        <div style="width: 265px;"></div>
                        <nav>
                            <div class="dropdown">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                        </nav>
                        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1">
                            <ul class="flex flex-col font-medium lg:flex-row lg:space-x-8 lg:mt-0 navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link"></a>
                                </li>
                                <li class="nav-item active">
                                    <a class="text block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0 nav-link">
                                        Новости</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="text block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0 nav-link">
                                        Расписание</a>
                                </li>
                                <li class="nav-item active" >
                                    <a class="text block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0 nav-link">
                                        Преподаватели </a>
                                </li>
                            </ul>
                        </div>
                        <div style="width: 265px;"></div>
                        @guest()
                        <div class="flex items-center lg:order-2">
                            <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 rounded">
                                <button type="button" class="btn btn-outline-dark">Вход</button>
                            </a>
                            <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 rounded ml-2">
                                <button type="button" class="btn btn-outline-dark">Регистрация</button>
                            </a>
                        </div>
                        @endguest
                        @auth()
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-outline-dark">Выйти</button>
                        </form>
                        @endauth
                    </div>

                </nav>
            </div>

        </div>
    </header>
    @yield('content')
</body>