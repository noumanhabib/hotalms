<?php
require_once "../utils/global.php";
require_once "../utils/connection.php";

$route = "search";
$query = isset($_GET['query']) ? $_GET['query'] : "";
if ($query === "") {
    header("Location: ../admin/home.php?error=Enter a query value");
    exit(0);
}

$result = $mysqli->query("SELECT * FROM bookings where name like('%" . $query . "%');");
$rows = $result->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="This website is for booking hotal rooms" />
    <link rel="stylesheet" href="<?php echo $hrefname; ?>/assets/css/bootstrap.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="container">
        <h2 class="mb-4 mt-4">Query is :<?php echo $query ?></h2>
        <?php
        if (sizeof($rows) === 0) {
            echo "<h4>No data matches with your query</h4>";
        } else {
            echo "<h3 class='mb-3'>Total results " . sizeof($rows) . " </h3>";
            foreach ($rows as $row) {
                echo "<h4> <strong>Customer Name :</strong> " . $row['name'] . "</h4>";
                echo "<h4> <strong>Customer Email :</strong> " . $row['email'] . "</h4>";
                echo "<hr />";
            }
        }
        ?>
    </div>

    <script src="<?php echo $hrefname; ?>/assets/js/bootsrap.js"></script>
</body>

</html>


<?php
$mysqli->close();
?>