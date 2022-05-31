<?php ob_start(); ?>
<?php 
    session_start();
    if(isset($_SESSION['username'])){
        header('location: dashboard.php');
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

<body class="bg-dark">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row w-50">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="mb-3">
                    <label for="adminname" class="form-label text-light">Username</label>
                    <input type="text" class="form-control" name="adminname" id="adminname" value="<?php if(isset($_POST['submit'])){ echo $_POST['adminname']; } ?>" required>
                </div>
                <div class="mb-3">
                    <label for="adminpassword" class="form-label text-light">Password</label>
                    <input type="password" class="form-control" name="adminpassword" id="adminpassword" required>
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>
    </div>
    <?php 
        if(isset($_POST['submit'])){
            $username = $_POST['adminname'];
            $password = $_POST['adminpassword'];
            $result = authorize();
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    if($username == $row['Username'] && $password == $row['Password']){
                        session_start();
                        $_SESSION['username'] = $username;
                        header('location: dashboard.php');
                    }
                    else{
                        echo '<script>alert("Enter the Correct Credentials");</script>';
                    }
                }
            }
        }
    ?>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>