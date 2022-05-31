<?php include('config.php'); ?>
<?php

function getAppliances()
{
    global $conn;
    $query = 'SELECT * FROM appliances';
    $result = $conn->query($query);
    return $result;
}

function authorize()
{
    global $conn;
    $query = 'SELECT * FROM login';
    $result = $conn->query($query);
    return $result;
}

function addappliance()
{
    global $conn;
    $name = $_POST['appliancename'];
    $watts = $_POST['appliancewatts'];
    $query = 'INSERT INTO appliances (`Name`,Watts) VALUES ("' . $name . '","' . $watts . '")';
    $result = $conn->query($query);
    if (!$result) {
        echo '<script>alert("Error - ' . mysqli_error($conn) . '");</script>';
    } else {
        header('location: all.php');
    }
}

function getappliancesbyId()
{
    global $conn;
    $getid = $_GET['Id'];
    $query = 'SELECT * FROM appliances WHERE Id=' . $getid;
    $result = $conn->query($query);
    return $result;
}

function editappliance()
{
    global $conn;
    $id = $_GET['Id'];
    $name = $_POST['appliancename'];
    $watts = $_POST['appliancewatts'];
    $query = 'UPDATE appliances SET Name="' . $name . '", Watts="' . $watts . '" WHERE Id=' . $id;
    $result = $conn->query($query);
    if (!$result) {
        echo '<script>alert("Error - ' . mysqli_error($conn) . '");</script>';
    } else {
        header('location: all.php');
    }
}

function deleteappliance()
{
    global $conn;
    $id = $_GET['Id'];
    $query = 'DELETE FROM appliances WHERE Id=' . $id;
    $result = $conn->query($query);
    if (!$result) {
        echo '<script>alert("Error - ' . mysqli_error($conn) . '");</script>';
    } else {
        header('location: all.php');
    }
}

function getcategory(){
    global $conn;
    $query = 'SELECT * FROM categories';
    $result = $conn->query($query);
    return $result;
}

function getappliancesbyValue($v){
    global $conn;
    $query = 'SELECT * FROM appliances where Category = "'.$v.'"';
    $result = $conn->query($query);
    return $result;
}

// Contact Us Page Functions

function getData()
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $message = $_POST['message'];
    $message = wordwrap($message, 70);
    $message = str_replace("\n.", "\n..", $message);

    // Email Details
    $to = 'muneebshoukat80@gmail.com';
    $subject = 'Contact Form Message';
    $fullmessage = '' . $email . '\n ' . $tel . '\n ' . $message . '';
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: muneebshoukat60@gmail.com\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Return-Path: muneebshoukat60@gmail.com\r\n";

    if(mail($to,$subject,$fullmessage,$headers)){
        echo '<script>alert("The Email has been Sent");</script>';
    }else{
        echo '<script>alert("Email has Failed");</script>';
    }
}

// Area Details to Database
function getregions(){
    global $conn;
    $query = 'SELECT DISTINCT Region FROM regions';
    $result = $conn->query($query);
    return $result;
}

function getCitybyValue($v){
    global $conn;
    $query = 'SELECT * FROM regions where Region = "'.$v.'"';
    $result = $conn->query($query);
    return $result;
}
?>