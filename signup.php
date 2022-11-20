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
    <title>Create Account</title>
</head>
<body>
    <a onclick="window.history.back();" class="btn bi bi-arrow-left"></a>
    <?php
    // error_reporting(0);
    require_once("config/db.php");
    extract($_POST);
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $check_username = mysqli_query($way,"SELECT * FROM `stylin_user` WHERE `username`='$name'");
        $check = mysqli_num_rows($check_username);
        echo $check;
        if($check==0){
                if($key==$rkey){
                    $rkey = password_hash($rkey, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `stylin_user`(`username`, `email`, `password`) VALUES ('$name','$email','$rkey')";
                if(mysqli_query($way,$sql)){
                    session_start();
                    $_SESSION['user']=$name;
                    $_SESSION['logged']=true;
                    header("location:user/index.php");
                }else{
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Cannot process your request at this time. Please try later.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }else{
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Your repeated password does not match the original password.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
        else{
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Username not available. Choose another username.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }
    ?>
    <section class="login container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form method="post">
                    <h2 class="mb-5 text-center">CREATE ACCOUNT</h2>
                    <div class="mb-4">
                        <input type="email" id="email" class="form-control" name="email"
                            placeholder="Email Address" required/>
                    </div>
                    <div class="mb-4">
                        <input type="text" id="name" class="form-control" name="name"
                            placeholder="Username" required/>
                    </div>

                    <div class="mb-4">
                        <input type="password" id="key" class="form-control" name="key"
                            placeholder="Password" required/>
                    </div>
                    <div class="mb-4">
                        <input type="password" id="rkey" onkeypress="checkkey(this.id)" class="form-control" name="rkey"
                            placeholder="Repeat Password" required/>
                    </div>
                    <div class="form-check d-flex justify-content-start mb-4">
                        <input class="form-check-input" type="checkbox" value="" id="form1Example3"/>&nbsp;
                        <label class="form-check-label" for="form1Example3"> I agree to terms & conditions</label>
                    </div>
                    <button class="btn btn-primary form-control" type="submit" name="signup">Continue</button>
                    <div class="mb-4 mt-4 text-center">
                        <div class="ls">Already have an account? <a href="login.php">Login</a></div>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </section>
</body>
</html>