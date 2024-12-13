<?php
require_once "dbconnect.php";

if (!isset($_SESSION)) {
  session_start(); // to create session if not exist
}

function ispasswordstrong($password)
{
  if (strlen($password) < 8) {
    return false;
  } elseif (isstrong($password)) {
    return true;
  } else
    return false;
}

function isstrong($password)
{
  $digitcount = 0;
  $capitalcount = 0;
  $speccount = 0;
  $lowercount = 0;
  foreach (str_split($password) as $char) {
    if (is_numeric($char)) {
      $digitcount++;
    } elseif (ctype_upper($char)) {
      $capitalcount++;
    } elseif (ctype_lower($char)) {
      $lowercount++;
    } elseif (ctype_punct($char)) {
      $speccount++;
    }
  }

  if ($digitcount >= 1 && $capitalcount >= 1 && $speccount >= 1) {
    return true;
  } else {
    return false;
  }
}
if (isset($_POST["signup"]) && $_SERVER['REQUEST_METHOD'] == "POST") {

  $username = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $filename = $_FILES['profile']['name'];
  $uploadPath = "profile/" . $filename;
  // store uploaded file to a specified folder


  if ($password == $cpassword) {
    if (ispasswordstrong($password)) {
      $password_hash = password_hash($password, PASSWORD_BCRYPT);
      move_uploaded_file($_FILES["profile"]["tmp_name"], $uploadPath);

      try {
        $sql = "insert into customer2 (username,email,password,profile) values(?,?,?,?)";
        $stmt = $connection->prepare($sql);
        $status = $stmt->execute([$username, $email, $password_hash, $uploadPath]);

        if ($status) {
          $_SESSION['signupSuccess'] = "Signup Success!";
          header("Location: viewBook.php");
        }
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    } else {
      $password_err = "Password must contain at least one digit, one uppercase letter, one lowercase letter and one special character.";
    }
  } else {
    $password_err = "Password must be at leastt 8 characters long.";
  }

  // try{
  //   $sql = "Insert into book (title, author, price, publisher, year, category, coverpath, quantity) values (?,?,?,?,?,?,?,?)";
  //   $stmt = $connection->prepare($sql);
  //   $status = $stmt->execute([$title,$author,$price,$publisher,$year,$category,$uploadPath,$quantity]);
  //   $book_id = $connection->lastInsertId();

  //   if($status){
  //     $_SESSION['insertSuccess']="Book with $book_id bookid has been inserted";
  //     header("Location:viewBook.php");
  //   }
  // }catch(PDOException $e){
  //   echo $e->getMessage();
  // }

}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign Up</title>
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
      <div class="col-md-8 col-sm 12 pt-5">
        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
          <div class="form-group">
            <h1>Sign Up</h1>
          </div>
          <div class="col-md-6 mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" class="form-control" name="name">
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
          <div class="col-md-6 mb-3">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="cpassword">
          </div>

          <div class="col-md-6 mb-3">
            <label for="profile" class="form-label">Choose Profile Picture</label>
            <input type="file" accept="image/*" class="form-control" name="profile">
          </div>
          <button type="submit" class="btn btn-primary" name="signup">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>