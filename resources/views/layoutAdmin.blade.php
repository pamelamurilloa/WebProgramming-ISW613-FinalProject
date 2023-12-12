<!DOCTYPE html>
<html>
    <head>
        <title>My news cover</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('../resources/css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('../resources/css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('../resources/css/footer.css') }}">
        <link rel="stylesheet" href="{{ asset('../resources/css/body.css') }}">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    </head>
    
    <body>
        <header id="header-container-admin" class="sticky">
            <nav role="navigation" class="navbar main-menu">
                <h1><a class="navbar-brand" href="{{ url('categories.index') }}">My Cover</a></h1>
                <ul class="links">
                    <li class="nav-item"><form action="logout" method="put">
                        @csrf
                    <button class="nav-link">Logout</button></form></li>
                </ul>
            </nav>
        </header>
        <div class="main-content">
            @yield('content')
        </div>

        <footer class="footer-content">
            <h3>Pamela Murillo Anchia</h3>
            <h4>Universidad Tecnica Nacional</h4>
        </footer>
    </body>
</html>