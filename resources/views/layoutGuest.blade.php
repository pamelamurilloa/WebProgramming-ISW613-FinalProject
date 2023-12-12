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
    </head>
    
    <body>
        <header id="header-container-index" class="sticky">
            <nav id="main-menu" role="navigation" class="navbar">
                <h1><a class="navbar-brand">My Cover</a></h1>
                <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}">Home</a></li>

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