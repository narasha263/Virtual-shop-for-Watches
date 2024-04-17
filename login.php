<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Virtual Shop for Watches</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: burlywood;
            background-image: url('images/bg.jpg');
            background-position: center; /* Center the background image */
            color: white;
            text-align: center;
            /* Additional properties to improve rendering */
            background-attachment: fixed; /* Fix the background image position */
            background-size: cover;
            height: 100vh; 
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
        }

        .list-group-item {
            background-color:#ffef; /* Semi-transparent black background */
            color: #000;
            border: none;
        }

        .card {
            color: #000;
        }

        .footer {
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
            color: #fff;
        }          
         .container {
            margin-top: 50px;
        }

        /* Form style */
        form,h2,p{
            background-color: #f8f9fe;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        form h2 {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 0;
        }

        .btn-primary {
            border-radius: 0;
        }
    </style>    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Login</h2>
                < <form action="login_process.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
        </form><br>
                <!-- Link to registration page -->
                <p>Don't have an account? <a href="register.php">Register here</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
