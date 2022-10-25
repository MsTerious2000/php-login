<?php
session_start();
require 'connection.php';
if (isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_num_rows($result);
    if ($row == 1) {
        $_SESSION['signin'] = true;
        $_SESSION['user'] = $username;

        echo '
        <script type="text/javascript">
            alert("LOGIN SUCCESSFUL! ' . $_SESSION['user'] . '");
            window.location.href = "home.php";
        </script>
        ';
    } else {
        echo '
        <script type="text/javascript">
            alert("LOGIN FAILED! USER NOT FOUND!");
            window.location.href = "index.php";
        </script>
        ';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAMPOL</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row mt-5 pt-5">
            <div class="col"></div>
            <div class="col">
                <div class="card bg-dark text-light">
                    <div class="card-body text-center">
                        <h1 class="card-title">LOGIN</h1>
                        <form method="POST">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" class="form-control text-center" name="username">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control text-center" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary mb-3" name="signin">SIGN-IN</button>
                        </form>
                        <a href="register.php" class="text-light">No account yet?</a>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>

</html>