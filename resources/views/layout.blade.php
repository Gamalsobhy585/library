<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('1903162.png') }}" type="image/x-icon">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="@yield('css-style')">
    @yield('page-styles')
    <style>
 /* General styles */
body {
    background-color: #f4f4f4;
    font-family: Arial, sans-serif;
}

/* Navigation bar styles */
.navbar {
    display: flex;
    justify-content: flex-end;
    padding: 10px 20px;
    background-color: #5E3B76;
    border-bottom: 2px solid #5E3B76;
    position: fixed;
    top: 0;
    width: 100%;
    
}

.nav-link {
    margin-left: 20px;
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    padding: 10px 15px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.nav-link:hover {
    background-color: #5E3B76;
}

.logout-form {
    display: inline;
    margin-left: 20px;
}

.logout-button {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 10px 15px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.logout-button:hover {
    background-color: #c82333;
}

/* Register and Login form styles */
.container {
    max-width: 500px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #5E3B76;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #5E3B76;
}

    </style>
</head>
<body>
    <nav class="navbar">
        @guest
            <a class="nav-link" href="{{url('register')}}">Register</a>
            <a class="nav-link" href="{{url('login')}}">Login</a>  
        @endguest
        @auth
            <a class="text-white  me-3" href="{{ url('/books') }}">Books</a>
            <a class="text-white" href="{{ url('/categories') }}">Categories</a>
            <form class="logout-form" action="{{ url('/logout') }}" method="POST">
                @csrf
                <input type="submit" value="Logout" class="logout-button">
            </form>
        @endauth
    </nav>
@yield('content')



    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
@yield('page-scripts')
</body>
</html>