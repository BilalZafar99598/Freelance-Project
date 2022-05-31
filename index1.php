<?php include('includes\config.php'); ?>
<?php 

    global $conn;
    // $lon_data = json_encode($_POST['lon_data']);
    // $lat_data = urlencode(json_encode($_POST['lat_data']));
    // $temp_data = json_encode($_POST['temp_data']);
    // $pressure_data = json_encode($_POST['pressure_data']);
    // $humidity_data = json_encode($_POST['humidity_data']);
    // $cloud_data = json_encode($_POST['cloud_data']);
    // $visibility_data = json_encode($_POST['visibility_data']);
    // $wind_speed_data = json_encode($_POST['wind_speed_data']);

    $lon_data = $_POST['lon_data'];
    $lat_data = $_POST['lat_data'];
    $temp_data = $_POST['temp_data'];
    $pressure_data = $_POST['pressure_data'];
    $humidity_data = $_POST['humidity_data'];
    $cloud_data = $_POST['cloud_data'];
    $visibility_data = $_POST['visibility_data'];
    $wind_speed_data = $_POST['wind_speed_data'];
    $datetime = $_POST['datetime'];
    echo "Today Date is: ".$datetime."<br>";
    $date = date("Y/m/d");
    for($j=0;$j<=29;++$j)
    {
        echo $lat_data[$j];
        // $sql = "INSERT INTO test(lat_data) VALUES('".$lat_data[$i]."')";

        $dailydate = date('Y/m/d',strtotime($j.'days',strtotime(str_replace('=', '-', $date)))) . PHP_EOL;
        $query = 'INSERT INTO newajax (lon_data,lat_data,temp_data,pressure_data,humidity_data,cloud_data,visibility_data,wind_speed_data,date) VALUES ("' . $lon_data[$j] . '","' . $lat_data[$j] . '","' . $temp_data[$j] . '","' . $pressure_data[$j] . '","' . $humidity_data[$j] . '","' . $cloud_data[$j] . '","' . $visibility_data[$j] . '","' . $wind_speed_data[$j] . '","' . $dailydate . '")';
        // $query="INSERT INTO newajax (lon_data, lat_data, temp_data, pressure_data, humidity_data,cloud_data,visibility_data,wind_speed_data,date)
        // VALUES ('$lon_data[$j]', '$lat_data[$j]', '$temp_data[$j]', '$pressure_data[$j]','$humidity_data[$j]','$cloud_data[$j]','$visibility_data[$j]','$wind_speed_data[$j]','$dailydate[$j]'";




        // $query = 'INSERT INTO newajax (lon_data,lat_data,temp_data,pressure_data,
        // humidity_data,cloud_data,visibility_data,wind_speed_data,date)
        //  VALUES ("' . $lon_data[$j] . '",
        // "' . $lat_data[$j] . '","' . $temp_data[$j] . '","' . $pressure_data[$j] . '",
        // "' . $humidity_data[$j] . '","' . $cloud_data[$j] . '","' . $visibility_data[$j] . '",
        // "' . $wind_speed_data[$j] . '","' . $datetime . '")';

        $result = $conn->query($query);
        if ($result === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $query . "<br>" . $conn->error;
          }
        // if ($result) {
        //     echo 'Successfully Insert';
        // } else {
        //     echo 'NOt Inserted';
        // }
    }

    // print_r($lat_data);
    // echo $lon_data;

    // foreach($lat_data as $x => $x_value) {
    //     echo "Key=" . $x . ", Value=" . $x_value;
    //     // echo "<br>";
    //   }
    //   print_r($lat_data);
    // $lat_str = serialize($lat_data);
    // for
    // $sql = "INSERT INTO test(lat_data) VALUES('".$lat_str."')";
    // $result = $conn->query($sql);
    // if ($result) {
    //     echo 'Successfully Insert';
    // } else {
    //     echo 'NOt Inserted';
    // }
    // mysqli_query($con,$sql);    
    // echo var_dump(isAssoc($lat_data)); // false
    // for($a = 0; $a <=29; ++$a)
    // {
    //     echo $lat_data[$a];
        // $query = 'INSERT INTO test(`lat_data`) VALUES ("' . $lat_data . '")';
        // // echo $query;
        // $result = $conn->query($query);
        // echo $result;
        // echo $result;
        // echo gettype($lat_data);
        // echo "<br>";
        // if ($result === TRUE) {
        //     echo "New record created successfully";
        //   } else {
        //     echo "Error: " . $query . "<br>" . $conn->error;
        //   }
    // }
    
    // $objLat = json_decode($lat_data);
    
    // print_r(array_keys($lat_data));
    // echo "====================================================";
    // print_r($lat_data);
    // echo "====================================================";
    // print_r(array_values($lat_data));
    // print_r(array_values($lat_data));
    // for($j = 0; $j <=29; ++$j)
    // { 
        // echo $objLat[$j];
        // $query = 'INSERT INTO data (`arrData`) VALUES ("' . $lat_data[$j] . '")';
        // $query = 'INSERT INTO ajaxdata (lon_data,lat_data,temp_data,pressure_data,humidity_data,cloud_data,visibility_data,wind_speed_data) VALUES ("' . $lon_data[$j] . '","' . $lat_data[$j] . '","' . $temp_data[$j] . '","' . $pressure_data[$j] . '","' . $humidity_data[$j] . '","' . $cloud_data[$j] . '","' . $visibility_data[$j] . '","' . $wind_speed_data[$j] . '")';
        // $query = 'INSERT INTO ajaxdata (lon_data,lat_data,temp_data,pressure_data,humidity_data,cloud_data,visibility_data,wind_speed_data) VALUES ("' . array_values($lon_data) . '","' . array_values($lat_data) . '","' . array_values($temp_data) . '","' . array_values($pressure_data) . '","' . array_values($humidity_data) . '","' . array_values($cloud_data) . '","' . array_values($visibility_data) . '","' . array_values($wind_speed_data) . '")';
        // $result = $conn->query($query);
        // echo $result;
        // echo gettype($lat_data);

    // if ($result) {
    //     echo 'Successfully Insert';
    // } else {
    //     echo 'NOt Inserted';
    // }
    // }  
    // $query = 'INSERT INTO data (`arrData`) VALUES ("' . $lat_data . '")';
    // $result = $conn->query($query);

    // if ($result) {
    //     echo 'Successfully Insert';
    // } else {
    //     echo 'NOt Inserted';
    // }




    // ob_start(); 
    // include "includes/config.php";

    // include_once('db.php');
    // $lon_data = $_POST["lat_data"];
    // if(mysql_query("INSERT INTO data VALUES('$lon_data')"))
        // echo "Successfully Inserted";
    // else
        // echo "Insertion Failed";


?>
<?php
    // session_start();
    // if (!isset($_SESSION['username'])) {
        // header('location: index.php');
    // }
?>
<?php
// $cars = array("Volvo", "BMW", "Toyota");
// $cars1 = array("Volvo1", "BMW1", "Toyota1");
// echo json_encode($cars);
// echo json_encode($cars1);
// echo shell_exec("python echo.py json_encode($cars)");

// This is Also Working for Static Array
// $cars = array("Volvo", "BMW", "Toyota");
// for($i = 0; $i <=2; ++$i)
//  { 
//     echo shell_exec("python echo.py $cars[$i]");
// }



// $cars = array("Volvo", "BMW", "Toyota");
// function test($cars){
//     // debugger;
//     echo shell_exec("python echo.py $cars");
// print_r($cars);
// return $cars;
// }

// This is also working
// $dataArr=array();
// $a = $_POST["lat_data"];
// print_r($a);
// for($i = 0; $i <=25; ++$i)
// { 
//     array_push($dataArr,$a[$i]);
    // echo $a[$i];
// }
// print_r($dataArr)
// echo $dataArr;
// print_r($dataArr);
// for($j = 0; $j <=25; ++$j)
// { 
//     echo $dataArr[$j];
// }  

    // insert into asldkfjaslkdfj l
    // sqli_mysqli($conn, )
    // echo shell_exec("python echo.py $a[$i]");
// while(mysqli_fetch_assoc()
?>