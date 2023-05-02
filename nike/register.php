<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register an account</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
    <style>
        .bg {
            background: #eceb7b;
        }
    </style>
</head>
<body>
<?php
    include "data.php";
    global $conn;
    session_start();
    $error = '';
    $name = '';
    $email = '';
    $user = '';
    $pass = '';
    $pass_confirm = '';
    if (isset($_POST['name']) && isset($_POST['email'])
    && isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['pass-confirm']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $pass_confirm = $_POST['pass-confirm'];

        if (empty($name)) {
            $error = 'Please enter your last name';
        }
        else if (empty($email)) {
            $error = 'Please enter your email';
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $error = 'This is not a valid email address';
        }
        else if (empty($user)) {
            $error = 'Please enter your username';
        }
        else if (empty($pass)) {
            $error = 'Please enter your password';
        }
        else if (strlen($pass) < 6) {
            $error = 'Password must have at least 6 characters';
        }
        else if ($pass != $pass_confirm) {
            $error = 'Password does not match';
        }
        else {
            // register a new account

            // if(isset($_POST['register'])){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $check = mysqli_query($conn, "SELECT * from tb_user where user ='$user'");
                if(mysqli_num_rows($check) > 0){
                    $error = "Synx";
                } else {
                    $result = mysqli_query($conn, "INSERT INTO tb_user (name, address, email, user, pass, role)
                     VALUES ('$name', 'hanoi', '$email', '$user', '$pass', 0);");
                    if($result == 1 ){
                        header('Location: login.php');
                    }
                }
                // if(mysqli_num_rows($result) == 1){
                //     $user = mysqli_fetch_assoc($result);
                //     $_SESSION['user'] = $user;
                //     $_SESSION['name'] = $user['name'];
                //     header('Location: index.php');
                //     exit();
                // } else {
                //     $error = "Invalid";
                // }
                // $_SESSION['error'] = $error;  
            } else {

            }
        }



    }
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 border my-5 p-4 rounded mx-3">
                <h3 class="text-center text-secondary mt-2 mb-3 mb-3">Create a new account</h3>
                <form method="post" action="register.php" novalidate>
                    <div class="form-group">
                        <input value="<?= $name?>" name="name" required class="form-control" type="text" placeholder="name" id="name">
                        <div class="invalid-tooltip">name is required</div>
                    </div>
                    <div class="form-group">
                        <input value="<?= $email?>" name="email" required class="form-control" type="email" placeholder="Email" id="email">
                    </div>
                    <div class="form-group">
                        <input value="<?= $user?>" name="user" required class="form-control" type="text" placeholder="User" id="user">
                        <div class="invalid-feedback">Please enter your user</div>
                    </div>
                    <div class="form-group">
                        <input  value="<?= $pass?>" name="pass" required class="form-control" type="password" placeholder="Password" id="pass">
                        <div class="invalid-feedback">Password is not valid.</div>
                    </div>
                    <div class="form-group">
                        <input value="<?= $pass_confirm?>" name="pass-confirm" required class="form-control" type="password" placeholder="Confirm Password" id="pass2">
                        <div class="invalid-feedback">Password is not valid.</div>
                    </div>

                    <div class="form-group">
                        <?php
                            if (!empty($error)) {
                                echo "<div class='alert alert-danger'>$error</div>";
                            }
                        ?>
                        <button type="submit" class="btn btn-success px-5 mt-3 mr-2">Register</button>
                        <button type="reset" class="btn btn-outline-success px-5 mt-3">Reset</button>
                    </div>
                    <div class="form-group">
                        <p>Already have an account? <a href="login.php">Login</a> now.</p>
                    </div>
                </form>

            </div>
        </div>

    </div>
</body>
</html>

