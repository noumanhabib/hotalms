<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="<?php echo $hrefname ?>">
            Hotel Star
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ml-2 <?php if ($route === 'index') {
                                                echo 'active';
                                            } ?>">
                    <a href="<?php echo $hrefname ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item ml-4 <?php if ($route === 'booking') {
                                                echo 'active';
                                            } ?>">
                    <a href="<?php echo $hrefname ?>/booking.php" class="nav-link">Book Now</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
if (isset($_GET['error']) && $_GET['error'] != "") {
    echo "
            <div class='alert alert-danger text-center'> " . $_GET['error'] . " </div>
        ";
}
if (isset($_GET['success']) && $_GET['success'] != "") {
    echo "
            <div class='alert alert-success text-center'> " . $_GET['success'] . " </div>
        ";
}
?>