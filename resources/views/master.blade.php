<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>

        <title>
            @yield('title')
        </title>

        {{-- book style --}}
        @yield('styleBook')
    </head>


    <body>

        <header>
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container">
                    <a class="navbar-brand" href="/books">Home</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        @can('isAdmin')
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/add">Add new Book</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/trash">Trash</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/authorForm">Add Author</a>
                            </li>
                        </ul>
                        @endcan
                        <ul class="navbar-nav ms-auto ">
                            <li class="me-5">
                                <form class="d-flex ms-auto" role="search" action="/searchResults" method="POST">
                                    @csrf
                                    <input class="form-control me-2" type="search" placeholder="Search"
                                        aria-label="Search" name="name">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </li>
                            @auth
                            <li class="nav-item">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        {{auth()->user()->name}}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/profile">View prfile</a></li>
                                        <li><a class="dropdown-item" href="/logout">Loguot</a></li>
                                    </ul>
                                </div>
                            </li>
                            @endauth
                            @guest
                            <ul class="navbar-nav d-flex gap-3">
                                <li><a class="dropdown-item" href="/loginForm">Login</a></li>
                                <li><a class="dropdown-item" href="/register">Register</a></li>
                            </ul>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>


        {{-- add page sections --}}
        @yield('addForm')
        {{-- main page sections --}}
        @yield('links')
        @yield('updateMsg')
        @yield('books')
        {{-- update page sections --}}
        @yield('updateForm')

        {{-- trash page sections --}}
        @yield('trashed')

        {{-- author info page sections --}}
        @yield('authorInfo')

        {{-- author form page sections --}}
        @yield('Add_author')

        {{-- search results page sections --}}
        @yield('search_results')

        {{-- register page sections --}}
        @yield('register')


    </body>
