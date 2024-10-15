<!-- welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My Blog</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&family=Roboto:wght@400&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #f6f9fc, #e9eff3);
            font-family: 'Inter', sans-serif;
            text-align: center;
            position: relative; /* For footer positioning */
        }

        h1 {
            font-size: 52px; /* Increased font size */
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
            letter-spacing: 1px; /* Added letter spacing */
        }

        .welcome-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 20px; /* More rounded corners */
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2); /* Deeper shadow */
            width: 90%;
            max-width: 500px;
            transition: transform 0.3s ease; /* Animation on hover */
        }

        .welcome-container:hover {
            transform: translateY(-5px); /* Lift effect on hover */
        }

        .welcome-btn {
            display: inline-block;
            background-color: #4a90e2;
            color: white;
            padding: 15px 30px; /* Slightly increased padding */
            border: none;
            border-radius: 25px; /* More rounded button */
            font-size: 20px; /* Increased font size */
            text-decoration: none;
            margin: 10px;
            transition: background-color 0.3s ease, transform 0.3s ease; /* Added transform transition */
        }

        .welcome-btn:hover {
            background-color: #357abd;
            transform: scale(1.05); /* Scale effect on hover */
        }

        footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            font-family: 'Roboto', sans-serif;
            color: #777;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="welcome-container">
        <h1>Welcome to Blog</h1>
        <a href="{{ route('login') }}" class="welcome-btn">Login</a>
        <a href="{{ route('register') }}" class="welcome-btn">Register</a>
    </div>

    <footer>
    </footer>

</body>
</html>
