<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }
        .container {
            text-align: center;
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        h1 {
            font-size: 72px;
            margin: 0;
        }
        h2 {
            font-size: 24px;
            margin: 20px 0;
        }
        p {
            font-size: 16px;
            margin: 20px 0;
            color: #666;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
        }
        a:hover {
            background-color: #0056b3;
        }
        .error-image {
            max-width: 100%;
            height: auto;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <h2>Page Not Found</h2>
        <p>We're sorry, but the page you were looking for doesn't exist.</p>
        <a href="{{ url('/') }}">Go to Homepage</a>
    </div>
</body>
</html>
