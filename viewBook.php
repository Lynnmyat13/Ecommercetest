<?php
require_once "dbconnect.php";
$sql = "SELECT b.bookId, b.title, a.author_name as author, b.price, p.publisher_name as publisher, b.year, c.category_name as category,b.coverpath, b.quantity
FROM book b, category c, author a, publisher p
WHERE
b.category = c.category_id AND
b.author = a.author_id AND
b.publisher = p.publisher_id;";
try {
    $stmt = $connection->query($sql);
    $status = $stmt->execute();
    if ($status) {
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
                Some links
            </div>
            <div class="col-md-10 col-sm 12 pt-5">
              <a href="insertBook.php">Add new book</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Year</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Category</th>
                            <th>Category</th>
                            <th>Cover Path</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($books)) {
                            foreach ($books as $book) {
                                echo "<tr>
                                    <td>$book[bookId]</td>
                                    <td>$book[title]</td>
                                    <td>$book[price]</td>
                                    <td>$book[year]</td>
                                    <td>$book[author]</td>
                                    <td>$book[publisher]</td>
                                    <td>$book[category]</td>
                                    <td>$book[quantity]</td>
                                    <td>$book[coverpath]</td>
                                    <td><img src='$book[coverpath]' style='width:50px; height:70px;'></td>
                                    </tr>";
                            }
                        }
                        ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>