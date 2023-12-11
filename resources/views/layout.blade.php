<!DOCTYPE html>
<html>
    <head>
        <title>My news cover</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    
    <body>
        <header id="header-container-index" class="sticky">
            <nav id="main-menu"  role="navigation" class="navbar">
                <h1><a class="navbar-brand" href="myCover.php">My Cover</a></h1>
                <ul class="links">
                    <li class="nav-item"><a class="nav-link" href="{{ route('my-cover.index') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('news-sources.index') }}">News Sources</a></li>
                    <li class="nav-item"><form action="login" method="put" @csrf ><button class="nav-link">Logout</button></form></li>
                </ul>
            </nav>
        </header>
        <div class="container">
            @yield('content')
        </div>

        <footer class="footer-content">
            <h3>Pamela Murillo Anchia</h3>
            <h4>Universidad Tecnica Nacional</h4>
        </footer>
    </body>
</html>