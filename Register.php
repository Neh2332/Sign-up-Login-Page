<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Register</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel='stylesheet' type='text/css' media='screen' href='Register.css'>
</head>
<body>
    <section>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div id="box2" class="card-body p-5 text-center">

                            <div id="box" class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Sign up</h2>
                                <p class="text-white-50 mb-5">Please enter a email and password</p>

                                <form method="post" action="">
                                    <div class="form-outline form-white mb-4">
                                        <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email" />
                                        <label class="form-label" for="form3Example3cg">Email Address</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" />
                                        <label class="form-label" for="form3Example4cg">Password</label>
                                    </div>
                                    <button type="submit" class="btn btn-outline-light btn-lg px-5">Submit</button>

                                </form>
                                <?php
                                #create a connection to the database
                                $dbhost = 'localhost';
                                $dbuser = 'root';
                                $dbpass = '1234';
                                $dbname = "assignment2";
                                $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                                if (mysqli_connect_errno()) {
                                    die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
                                }
                                if (isset($_POST['email'])) {
                                    $email = $_POST['email'];
                                } else {
                                    $email = "";
                                }

                                if (isset($_POST['password'])) {
                                    $password = $_POST['password'];
                                } else {
                                    $password = "";
                                }

                                $sql = "SELECT * FROM users WHERE EmailAddress = '$email' AND Password = '$password'";

                                $resultSet = mysqli_query($connection, $sql);
                                if (mysqli_num_rows($resultSet) > 0 && isset($_POST['email']) && isset($_POST['password'])) {
                                    echo "You already have an account. Please Login";
                                } elseif (isset($_POST['email']) && isset($_POST['password'])) {
                                    $sql = "INSERT INTO users (EmailAddress, Password) VALUES ('$email', '$password')";
                                    echo "Successfully registered! Please wait, you will be redirected to the login page soon";
                                    //Redirected to login page after 3 seconds
                                    header("refresh:3; url=Checkuser.php");
                                }

                                ?>
                            </div>
                            <div>
                                <p class="mb-0">Already have an account? <a href="Checkuser.php" class="text-white-50 fw-bold">Login</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
</body>

</html>