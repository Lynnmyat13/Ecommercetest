<?php
require_once "dbconnect.php";
if (!isset($_SESSION)) {
    session_start();
}

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
    <title>View Book</title>
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
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a></li>
                    <?php if (isset($_SESSION['adminLoginSuccess'])) {
                    ?>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="adminLogin.php">Logout</a></li>
                    <?php } ?>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-2 col-sm-12 border bg-light">
                <div class="navbar-nav ps-3">
                    <?php if (isset($_SESSION['isLoggedIn'])) { ?>
                        <a class="nav-link" href="viewBook.php">View Book</a>
                        <a class="nav-link" href="viewAuthor.php">View Author</a>
                        <a class="nav-link" href="viewPublisher.php">View Publisher</a>
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Another</a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-10 col-sm-12 px-5">
                <div class="pb-5">
                    <a href="insertBook.php" class="btn btn-primary">Add New Book</a>
                </div>
                <p><?php if (isset($_SESSION['deleteSuccess']))
                        echo "<span class='alert alert-success'> $_SESSION[deleteSuccess]</span>";
                    unset($_SESSION['deleteSuccess']);

                    if (isset($_SESSION['insertSuccess']))
                        echo "<span class='alert alert-success'> $_SESSION[insertSuccess]</span>";
                    unset($_SESSION['insertSuccess']);

                    if (isset($_SESSION['updateBookSuccess']))
                        echo "<span class='alert alert-success'> $_SESSION[updateBookSuccess]</span>";
                    unset($_SESSION['updateBookSuccess']);

                    if (isset($_SESSION['adminLoginSuccess']))
                        echo "<span class='alert alert-success'> $_SESSION[adminLoginSuccess]</span>";
                    unset($_SESSION['adminLoginSuccess']);

                    ?></p>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Year</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Cover</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($books) && isset($_SESSION['isLoggedIn'])) {
                            foreach ($books as $book) {
                                echo "<tr>
                                <td>{$book['bookId']}</td>
                                <td>{$book['title']}</td>
                                <td>{$book['price']}</td>
                                <td>{$book['year']}</td>
                                <td>{$book['author']}</td>
                                <td>{$book['publisher']}</td>
                                <td>{$book['category']}</td>
                                <td>{$book['quantity']}</td>
                                <td><a href='{$book['coverpath']}' target='_blank'><img src='{$book['coverpath']}' style='width:50px; height:70px;'></a></td>
                                <td>
                                    <a href='editBook.php?id=$book[bookId]' class='btn btn-info btn-sm'>Edit</a>
                                    <a href='deleteBook.php?id=$book[bookId]' class='btn btn-danger btn-sm'>Delete</a>
                                </td>
                            </tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer class="bg-light text-center text-lg-start mt-5">
        <div class="text-center p-3">
            © 2024 Book Management System
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>