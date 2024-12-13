<?php
require_once "dbconnect.php";
if(!isset($_SESSION)){
  session_start();
}
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

  if(isset($_GET["id"])){
    $bookId = $_GET['id'];
    $book = getBookInfo($bookId);
    
  }

function getBookInfo($bid){ 
    global $connection;
    $sql = "SELECT b.bookId, b.title, a.author_name as author, b.price, p.publisher_name as publisher, b.year, c.category_name as category,b.coverpath, b.quantity
    FROM book b, category c, author a, publisher p
    WHERE
    b.category = c.category_id AND
    b.author = a.author_id AND
    b.publisher = p.publisher_id AND
    b.bookid = ?;";
    $stmt =$connection->prepare($sql);
    // $stmt->bindParam('', $bookid);
    $stmt->execute([$bid]);
    $book = $stmt->fetch(PDO::FETCH_ASSOC);
    return $book;
}

    if(isset($_POST['update'])){
      $book_id = $_POST['bookId'];
      echo $book_id;
      //create sql statement
      // $sql = "update book set title=?, price=?, year=?, publisher=?, category=?, author=?, quantity=?, coverpath=? where bookId=?";
      $title = $_POST['title'];
      $price = $_POST['price'];
      $quantity = $_POST['quantity'];
      $category = $_POST['category'];
      $publisher = $_POST['publisher'];
      $author = $_POST['author'];
      $year = $_POST['year'];
      $filename = $_FILES['bookcover']['name'];
      $uploadPath = "covers/".$filename;
      echo "$title,$price,$year,$publisher,$category,$author,$quantity,$uploadPath,$book_id";
      // store uploaded file to a specified folder
      move_uploaded_file($_FILES["bookcover"]["tmp_name"], $uploadPath);
      try{
        $sql = "update book set title=?, price=?, year=?,  category=?,publisher=?, author=?, quantity=?, coverpath=? where bookId=?";
        $stmt = $connection->prepare($sql);
        $status = $stmt->execute([$title,$price,$year,$publisher,$category,$author,$quantity,$uploadPath,$book_id]);
        if($status){
          $_SESSION['updateBookSuccess'] = "Book with id no $book_id has been updated.";
          header("Location:viewBook.php");
        }
  
      }catch(PDOException $e){
        echo $e->getMessage();
      }
      
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Book</title>
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
            <div class="col-md-2 col-sm 12 border bg-light">
              <div class="navbar-nav ps-3">
                <a class="nav-link"  href="viewBook.php">View Book</a>
                <a class="nav-link" href="viewAuthor.php">View Author</a>
                <a class="nav-link" href="viewPublisher.php">View Publisher</a>
                <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Another</a>
              </div>
            </div>
            <div class="col-md-8 col-sm 12 pt-5">
                <form method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
                  <input type="hidden" name ="bookId"  value='<?php if(isset($book['bookId'])) echo $book['bookId']; ?>'>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" id="title" class="form-control" name="title" value="<?php if(isset($book['title'])) echo $book['title']; ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" id="price" class="form-control" name="price" value="<?php if(isset($book['price'])) echo $book['price']; ?>">
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" name = "quantity" min="1" value="<?php if(isset($book['quantity'])) echo $book['quantity']; ?>">
                    </div> 
                                    
                    
                    <div class="col-md-6 mb-3 mt-4">
                    <?php if(isset($book['category'])) echo "You previously selected",$book['category']; ?>
                        <select class="form-select mb-4" name="category">
                            <option selected>Select Category</option>
                            <?php if(isset($categories)){
                                foreach($categories as $category){
                                    echo "<option value=$category[category_id]>$category[category_name]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                  <div class="row">  
                  <div class="col-md-6 mb-3">
                  <?php if(isset($book['publisher'])) echo "You previously selected",$book['publisher']; ?>
                    <select class="form-select mb-4" name="publisher">
                        <option selected>Select Publisher</option>
                        <?php if(isset($publishers)){
                            foreach($publishers as $publisher){
                                echo "<option value=$publisher[publisher_id]>$publisher[publisher_name]</option>";
                            }
                        }
                        ?>

                      </select>
                      </div>
                      <div class="col-md-6 mb-3">
                      <?php if(isset($book['author'])) echo "You previously selected",$book['author']; ?>
                    <select class="form-select mb-4" name="author">
                        <option selected>Select Author</option>
                        <?php if(isset($authors)){
                            foreach($authors as $author){
                                echo "<option value=$author[author_id]>$author[author_name]</option>";
                            }
                        }

                        ?>
                    </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="number" class="form-control" name = "year" min="1" value="<?php if(isset($book['year'])) echo $book['year']; ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        Previous image
                        <img src="<?php if(isset($book['coverpath'])) echo $book['coverpath']; ?>">
                        <label for="bookcover" class="form-label">Choose Book Cover</label>
                        <input type="file" class="form-control" name = "bookcover">
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>