<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('../resources/css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('../resources/css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('../resources/css/footer.css') }}">
        <link rel="stylesheet" href="{{ asset('../resources/css/body.css') }}">

        <title>Register</title>
    </head>

    <body>
    <header id="header-container-index" class="sticky">
        <nav id="main-menu"  role="navigation" class="navbar">
            <h1>My Cover</h1>
    </header>

    <div class="main-content">
        <h2>User Registration</h2>

        <form method="post" action="{{ url('user') }}" class="form-inline" role="form">
            @csrf
        
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input id="firstname" class="form-control" type="text" name="firstname">
            </div>

            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input id="lastname" class="form-control" type="text" name="lastname" required>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" class="form-control" type="text" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="form-control" type="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" class="form-control" type="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="cellphone">Cellphone Number</label>
                <input id="cellphone" class="form-control" type="tel" pattern="[0-9]{8}" name="cellphone" placeholder="8 digit phone number" required >
            </div>

            <div class="register-options">
                <button type="submit" class="btn btn-primary">Register</button>
                <a class="btn" href="{{ route('login') }}">Return to Login</a>
            </div>

        </form>
    </div>

    <footer class="footer-content">
            <h3>Pamela Murillo Anchia</h3>
            <h4>Universidad Tecnica Nacional</h4>
        </footer>
    </body>
</html>