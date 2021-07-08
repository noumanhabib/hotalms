<?php
require_once "./utils/global.php";
$route = "booking";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="This website is for booking hotal rooms" />
    <link rel="stylesheet" href="<?php echo $hrefname; ?>/assets/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo $hrefname; ?>/assets/css/style.css" />
    <title>Hotal Star Booking</title>
</head>

<body>
    <?php include "./components/nav.php" ?>

    <div class="booking container">
        <h2 class="title mt-3 mb-3">Hotel Booking</h2>
        <span class="line"></span>

        <form action="./controllers/bookingController.php" method="post" class="mt-4">
            <div class="name d-flex flex-column align-items-start">
                <label for="name" class="require">Name</label>
                <div class="name-input d-flex">
                    <div class="f-name labeled-input d-flex flex-column">
                        <input type="text" name="f-name" required />
                        <span class="input-label">First name</span>
                    </div>
                    <div class="l-name labeled-input d-flex flex-column ml-5">
                        <input type="text" name="l-name" />
                        <span class="input-label">Last name</span>
                    </div>
                </div>
            </div>
            <div class="name d-flex flex-column align-items-start mt-4">
                <label for="email" class="require">E-mail</label>
                <div class="email-input d-flex">
                    <div class="e-mail labeled-input d-flex flex-column">
                        <input type="email" name="email" placeholder="example@example.com" required />
                        <span class="input-label">example@example.com</span>
                    </div>
                </div>
            </div>
            <div class="guest d-flex flex-column align-items-start mt-4">
                <label for="guest" class="require">Number of Guests</label>
                <div class="guest-input d-flex">
                    <div class="guest labeled-input d-flex flex-column">
                        <span class="plus" id="guest-plus">+</span>
                        <input type="number" name="guest" id="guest" required />
                        <span class="minus" id="guest-minus">-</span>
                    </div>
                </div>
            </div>
            <div class="name d-flex flex-column align-items-start mt-4">
                <label for="room-type">Room Type</label>
                <div class="room-type-input d-flex">
                    <div class="room-type labeled-input d-flex flex-column">
                        <select name="room-type" id="room-type">
                            <option value="">Please Select</option>
                            <option value="single-room">Single Room</option>
                            <option value="double-room">Double Room</option>
                            <option value="king-double-room">King Double Room</option>
                            <option value="queen-double-room">Queen Double Room</option>
                            <option value="deluxe-room">Deluxe Room</option>
                            <option value="double-double">Double-Double</option>
                            <option value="twin-room">Twin Room</option>
                            <option value="duplex-room">Duplex Room</option>
                            <option value="cabana">Cabana</option>
                            <option value="lanai">Lanai</option>
                            <option value="suite">Suite</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="d-flex mt-5 align-items-center mb-3">
                <label for="arrival-date-time" class="require mr-5 pb-3">Arrival Date & Time</label>
                <div class="arrival-date ml-5 labeled-input d-flex flex-column">
                    <input type="date" name="arrival-date" required />
                    <span class="input-label">Date</span>
                </div>
                <div class="arrival-time ml-3 labeled-input d-flex flex-column">
                    <input type="time" name="arrival-time" required />
                    <span class="input-label">Hour:Min</span>
                </div>
            </div>

            <div class="name d-flex align-items-start mt-4">
                <label for="departure-date" class="require mr-5">Departure Date</label>
                <div class="departure-date-input d-flex ml-5">
                    <div class="departure-date labeled-input d-flex flex-column">
                        <input type="date" name="departure-date" required />
                        <span class="input-label">Day / Month / Year</span>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column align-items-start mt-4">
                <label for="free-pickup" class="require mr-5">Free Pickup?</label>
                <div class="d-flex align-items-center">
                    <input class="mr-3" type="radio" name="free-pickup" value="1" required />
                    Yes Please! Pick me up on arrival
                </div>
                <div class="d-flex align-items-center">
                    <input class="mr-3" type="radio" name="free-pickup" value="0" required />
                    No Thanks! I will make my own way there
                </div>
            </div>

            <div class="name d-flex flex-column align-items-start mt-4">
                <label for="flight-number">Flight Number</label>
                <div class="flight-number-input d-flex">
                    <div class="flight-number d-flex flex-column">
                        <input type="text" name="flight-number" />
                    </div>
                </div>
            </div>

            <div class="name d-flex flex-column align-items-start mt-4">
                <label for="special-request">Special Request</label>
                <div class="special-request-input d-flex">
                    <div class="special-request d-flex flex-column">
                        <textarea name="special-request" id="special-request" cols="60" rows="6"></textarea>
                    </div>
                </div>
            </div>

            <div class="mt-5 d-flex justify-content-center">
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>
        </form>

        <div class="mt-5 mb-5"></div>
    </div>

    <script src="<?php echo $hrefname; ?>/assets/js/bootsrap.js"></script>

    <script>
    const guestInput = document.getElementById("guest");
    document.getElementById("guest-plus").addEventListener("click", (e) => {
        guestInput.value++;
    });
    document.getElementById("guest-minus").addEventListener("click", (e) => {
        if (guestInput.value > 0) {
            guestInput.value--;
        }
    });
    const roomSelect = document.getElementById("room-type");
    roomSelect.addEventListener("change", (e) => {
        if (e.target.value != "") {
            roomSelect.classList.add("black");
        } else {
            roomSelect.classList.remove("black");
        }
        console.log(e.target.value);
    });
    </script>
</body>

</html>