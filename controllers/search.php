<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $query = $_POST['search'];
    if ($query === "") {
        header("Location: ../admin/home.php?error=Enter a query value");
        exit(0);
    }
    header("Location: ../admin/search.php?query=$query");
}