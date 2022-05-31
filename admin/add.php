<?php ob_start(); ?>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: index.php');
}
?>
<?php include('../includes/functions.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ADMIN - SOLAR</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/styles.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg sticky-top bg-dark" id="mainNav">
        <div class="container"><a class="navbar-brand" href="dashboard.php">Admin Dashboard</a><button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto text-uppercase"></ul>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto text-uppercase">
                        <li class="nav-item"><a class="nav-link" href="all.php">All Appliances</a></li>
                        <li class="nav-item"><a class="nav-link active" href="add.php">Add Appliance</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <h4>Add Appliance</h4>
            </div>
        </div>
        <div class="row w-100 justify-content-center mt-5">
            <form class="w-50" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="mb-3">
                    <label for="appliancename" class="form-label">Appliance Name</label>
                    <input type="text" class="form-control" name="appliancename" id="appliancename" value="<?php if (isset($_POST['submit'])) {
                                                                                                            echo $_POST['appliancename'];
                                                                                                        } ?>" required>
                </div>
                <div class="mb-3">
                    <label for="appliancewatts" class="form-label">Watts</label>
                    <input type="number" class="form-control" name="appliancewatts" id="appliancewatts" value="<?php if (isset($_POST['submit'])) {
                                                                                                            echo $_POST['appliancewatts'];
                                                                                                        } ?>" required>
                </div>
                <input type="submit" name="submit" class="btn btn-secondary" value="Submit">
            </form>
        </div>
    </div>
    <?php 
        if(isset($_POST['submit'])){
            addappliance();
        }
    ?>

    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>