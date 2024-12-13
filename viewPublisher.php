<?php
require_once "dbconnect.php";
$sql = "SELECT p.publisher_id, p.publisher_name, p.address, p.phone
FROM publisher p;";

try {
    $stmt = $connection->query($sql);
    $status = $stmt->execute();
    if ($status) {
        $publishers = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>View Publisher</title>
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
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a></li>
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
                <a class="nav-link" href="viewBook.php">View Book</a>
                <a class="nav-link" href="viewAuthor.php">View Author</a>
                <a class="nav-link" href="viewPublisher.php">View Publisher</a>
                <a class="nav-link" href="#" tabindex="-1" aria-disabled ="true">Another</a>
            </div>
        </div>
        <div class="col-md-10 col-sm-12 px-5">
            <div class="pb-5">
                <a href="insertBook.php" class="btn btn-primary">Add New Book</a>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Publisher Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($publishers)) {
                        foreach ($publishers as $publisher) {
                            echo "<tr>
                                <td>{$publisher['publisher_id']}</td>
                                <td>{$publisher['publisher_name']}</td>
                                <td>{$publisher['address']}</td>
                                <td>{$publisher['phone']}</td>
                                <td>
                                    <a href='' class='btn btn-info btn-sm'>Edit</a>
                                    <a href='' class='btn btn-danger btn-sm'>Delete</a>
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