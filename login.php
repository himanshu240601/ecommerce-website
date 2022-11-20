<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Log In</title>
</head>
<body>
    <a onclick="window.history.back();" class="btn bi bi-arrow-left"></a>
    <?php
    require_once("config/db.php");
    extract($_POST);
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $data = mysqli_query($way,"SELECT * FROM `stylin_user` WHERE `email`='$user' or `username`='$user'");
        $num_of_rows = mysqli_num_rows($data);
        if($num_of_rows==1){
            $row = mysqli_fetch_array($data, MYSQLI_ASSOC);
            $username = $row['username'];
            $password = $row['password'];
            $type = $row['type'];
            if(password_verify($key, $password)){
                session_start();
                if($type=='user'){
                    $_SESSION['user']=$username;
                    $_SESSION['logged']=true;
                    header("location:user/index.php");
                }else{
                    $_SESSION['user']=$username;
                    $_SESSION['logged']=true;
                    header("location:admin/index.php");
                }
            }else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Wrong Password.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            }
        }
    }
    ?>
    <section class="login container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form method="post">
                    <h2 class="mb-5 text-center">LOGIN</h2>
                    <div class="mb-4">
                        <input type="text" id="email" class="form-control" name="user" placeholder="Email or Username" required/>
                    </div>
                    <div class="mb-4">
                        <input type="password" id="key" class="form-control" name="key" placeholder="Password" required/>
                    </div>
                    <div class="form-check d-flex justify-content-start mb-4">
                        <input class="form-check-input" type="checkbox" value="" id="form1Example3"/>&nbsp;
                        <label class="form-check-label" for="form1Example3"> Remember password </label>
                    </div>
                    <button class="btn btn-primary form-control" type="submit" name="login">Login</button>
                    <div class="mb-4 mt-4 text-center">
                        <div class="ls">Don't have an account? <a href="signup.php">Create Account</a></div>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </section>
</body>
</html>