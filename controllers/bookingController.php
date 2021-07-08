<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    require_once("../utils/connection.php");

    $error = "";
    if (!isset($_POST['f-name']) || $_POST['f-name'] === "") {
        $error = "First name must be given";
        header("Location: ../booking.php?error=$error");
        exit(0);
    }
    $name = $_POST['f-name'];
    if (isset($_POST['l-name']) && $_POST['l-name'] != "") {
        $name .= " " . $_POST['l-name'];
    }

    if (!isset($_POST['email']) || $_POST['email'] === "") {
        $error = "Email must be given";
        header("Location: ../booking.php?error=$error");
        exit(0);
    }

    $email = $_POST['email'];

    if (!isset($_POST['guest']) || $_POST['guest'] === "" || (int)$_POST['guest'] === 0) {
        $error = "Guest must be added";
        header("Location: ../booking.php?error=$error");
        exit(0);
    }
    $guest = (int)$_POST['guest'];

    $roomType = "";
    if (isset($_POST['room-type']) && $_POST['room-type'] != "") {
        $roomType = $_POST['room-type'];
    }

    $arrivalDate = $_POST['arrival-date'];
    $arrivalTime = $_POST['arrival-time'];
    $departureDate = $_POST['departure-date'];
    $freePickup = $_POST['free-pickup'] === "1" ? true : false;
    $flightNumber = $_POST['flight-number'];
    $specialRequest = $_POST['special-request'];

    $stmt = $mysqli->prepare("INSERT INTO bookings(name, email, guests, room_type, arrival_date, arrival_time, departure_date, free_pickup, flight_number, special_request) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssissssiss", $name, $email, $guest, $roomType, $arrivalDate, $arrivalTime, $departureDate, $freePickup, $flightNumber, $specialRequest);

    if ($stmt->execute()) {
        $mysqli->close();
        header("Location: ../index.php?success=Your room booking order is places successfuly");
    } else {
        $mysqli->close();
        header("Location: ../index.php?error=Some error occured! Try again. " . 'Connection error: ' . $mysqli->connect_error);
    }
}