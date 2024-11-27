<?php
require_once "dbconnect.php";
try{
    $sql = "select * from category";
    $connection->query($sql);
    $stmt = $connection->query($sql);
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $sql = "select * from publisher";
    $connection->query($sql);
    $stmt = $connection->query($sql);
    $publishers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $sql = "select * from author";
    $connection->query($sql);
    $stmt = $connection->query($sql);
    $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // print_r($categories);

}
catch(PDOException $e){
    echo $e->getMessage();
}
if(isset($_POST["insert"])){
  
  $title = $_POST['title'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $category = $_POST['category'];
  $publisher = $_POST['publisher'];
  $author = $_POST['author'];
  $year = $_POST['year'];
  $filename = $_FILES['bookcover']['name'];
  $uploadPath = "covers/".$filename;
  // store uploaded file to a specified folder
  move_uploaded_file($_FILES["bookcover"]["tmp_name"], $uploadPath);
  
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="/images/image.png" style ="width: 100px; height: auto;"></a>
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
            <li><hr class="dropdown-divider"></li>
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
            <div class="col-md-4 col-sm 12 border bg-light">
                Some links
            </div>
            <div class="col-md-6 col-sm 12 pt-5">
                <form method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name = "title">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" name = "price">
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" name = "quantity" min="1">
                    </div>                 
                    <br>

                    <select class="form-select mb-4" name="category">
                        <option selected>Select Category</option>
                        <?php if(isset($categories)){
                            foreach($categories as $category){
                                echo "<option value=$category[category_id]>$category[category_name]</option>";
                            }
                        }
                        ?>

                    </select>
                    
                    <select class="form-select mb-4" name="publisher">
                        <option selected>Select Publisher</option>
                        <?php if(isset($publishers)){
                            foreach($publishers as $publisher){
                                echo "<option value=$publisher[publisher_id]>$publisher[publisher_name]</option>";
                            }
                        }
                        ?>

                      </select>
                    <select class="form-select mb-4" name="author">
                        <option selected>Select Author</option>
                        <?php if(isset($authors)){
                            foreach($authors as $author){
                                echo "<option value=$author[author_id]>$author[author_name]</option>";
                            }
                        }
                        ?>
                    </select>
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="number" class="form-control" name = "year" min="1">
                    </div>

                    <div class="mb-3">
                        <label for="bookcover" class="form-label">Choose Book Cover</label>
                        <input type="file" class="form-control" name = "bookcover">
                    </div>
                
                    <button type="submit" class="btn btn-primary" name="insert">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>