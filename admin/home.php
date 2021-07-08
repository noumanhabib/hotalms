<?php
require_once "../utils/global.php";
require_once "../utils/connection.php";
$route = "admin-home";
$query = "SELECT * FROM bookings;";
$result = $mysqli->query($query);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$i = 1;
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

    <style>
    .search-btn {
        padding: 5px 20px;
        margin-left: 20px;
    }

    .serahc-input {
        width: 250px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-3 mb-3">Welcome to Admin Panel</h1>

        <form action="../controllers/search.php" class="d-flex" method="post">
            <input placeholder="Search by name here" type="text" name="search" class="serahc-input" required>
            <button type="submit" name="submit" class="btn btn-secondary search-btn">Search</button>
        </form>

        <table class="table table-striped mt-5 mb-5">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Guests</th>
                    <th>Room Type</th>
                    <th>Arrival Date</th>
                    <th>Arrival Time</th>
                    <th>Departure Date</th>
                    <th>Free Pickup</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rows as $row) {
                    echo "<tr> <td> $i </td><td> " . $row["name"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["guests"] . "</td>
                        <td>" . $row["room_type"] . "</td>
                        <td>" . $row["arrival_date"] . "</td>
                        <td>" . $row["arrival_time"] . "</td>
                        <td>" . $row["departure_date"] . "</td>
                        <td>" . $row["free_pickup"] . "</td>";
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="<?php echo $hrefname; ?>/assets/js/bootsrap.js"></script>
</body>

</html>

<?php
$mysqli->close();
?>