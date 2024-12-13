<?php
require_once "dbconnect.php";

if (!isset($_SESSION)) {
    session_start(); // to create session if not exist
}

if (isset($_POST["login"]) && $_SERVER['REQUEST_METHOD'] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];
    if (strlen($password) > 7) {

        try {
            $sql = "select password from customer2 where email=?";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$email]);
            $info = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($info) {
                $password_hash = $info['password'];
                if (password_verify($password, $password_hash)) {
                    $_SESSION['loginSuccess'] = "Login Success!";
                    header("Location: viewBook.php");
                } else {
                    $password_err = "Email or password does not exist!";
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        $password_err = "Email or password does not exist!";
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="/images/image.png" style="width: 100px; height: auto;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid pt-5 border">
        <div class="row">
            <div class="col-md-2 col-sm 12 border bg-light">
                <div class="navbar-nav ps-3">
                    <a class="nav-link" href="viewBook.php">View Book</a>
                    <a class="nav-link" href="viewAuthor.php">View Author</a>
                    <a class="nav-link" href="viewPublisher.php">View Publisher</a>
                    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Another</a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 offset-md-3">
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" class="center">
                        <?php if (isset($password_err)) {
                            echo "<p class='alert alert-danger'>.$password_err.</p>";
                        }

                        ?>
                        <div class="form-group">
                            <h1>Login</h1>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" name="email">
                        </div>
                        <div class="row">
                            <div class="col-lg-5 mb-3">
                                <p>
                                    <?php
                                    if (isset($password_err)) {
                                        echo "<span class='alert alert-danger'>$password_err</span>";
                                    }
                                    ?>
                                </p>
                            </div>

                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <button type="submit" class="btn btn-primary" name="login">Submit</button>
                    </form>
                    <p>If you are not a member, please
                        <a href="customerSignup.php">
                            Sign Up
                        </a> here!
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>