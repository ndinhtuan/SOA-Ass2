<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hệ thống đánh giá điểm rèn luyện</title>
    <style>
        /* The navigation bar */
.navbar {
    overflow: hidden;
    background-color: #333; 
    top: 0; /* Position the navbar at the top of the page */
    width: 100%; /* Full width */
}

/* Links inside the navbar */
.navbar a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

/* Change background on mouse-over */
.navbar a:hover {
    background: #ddd;
    color: black;
}

/* Main content */
.main {
    margin-top: 30px; /* Add a top margin to avoid content overlay */
}
    </style>
    @yield('css')
</head>
<body>
    <div class="navbar">
        <a href="#">Home</a>
        <a href="{{route('logout')}}">Log Out</a>
    </div>

</body>
</html>