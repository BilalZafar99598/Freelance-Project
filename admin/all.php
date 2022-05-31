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
                        <li class="nav-item"><a class="nav-link active" href="all.php">All Appliances</a></li>
                        <li class="nav-item"><a class="nav-link" href="add.php">Add Appliance</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <h4>Appliances</h4>
            </div>
        </div>
        <div class="row mt-4 px-5">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr class="table-dark">
                        <th scope="col" class="fs-5 text-center">#</th>
                        <th scope="col" class="fs-5 text-center">Appliance Name</th>
                        <th scope="col" class="fs-5 text-center">Watts</th>
                        <th scope="col" class="fs-5 text-center">Edit</th>
                        <th scope="col" class="fs-5 text-center">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = getAppliances();
                    $number = 1;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>
                            <td class="bg-dark text-light text-center">' . $number . '</td>
                            <td class="px-3">' . $row['Name'] . '</td>
                            <td class="text-center">' . $row['Watts'] . '</td>
                            <td class="text-center"><a href="edit.php?Id=' . $row['Id'] . '"><button class="btn btn-secondary"><i class="bi bi-pencil-square text-light"></i></button></a></td>
                            <td class="text-center"><a class="DeleteButton" href="delete.php?Id=' . $row['Id'] . '"><button class="btn btn-danger"><i class="bi bi-trash text-light"></i></button></a></td>
                            </tr>';
                            $number++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        const urltag = document.getElementsByClassName('DeleteButton');
        for (let i = 0; i < urltag.length; i++) {
            urltag[i].addEventListener('click',askdelete);
        }
        function askdelete(e){
            if(confirm('Are you Sure?')){
                return true;        
            }
            else{
                e.preventDefault();
            }
        }
    </script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>