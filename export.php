<?php include('includes\config.php'); ?>
<?php 
 
// Fetch records from database 
$query = $conn->query("SELECT * FROM newajax ORDER BY ID ASC"); 
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "members-data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('ID', 'lon_data', 'lat_data', 'temp_data', 'pressure_data', 'humidity_data', 'cloud_data', 'visibility_data','wind_speed_data','date'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        // $status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($row['ID'], $row['lon_data'], $row['lat_data'], $row['temp_data'], $row['pressure_data'], $row['humidity_data'], $row['cloud_data'], $row['visibility_data'], $row['wind_speed_data'], $row['date']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>


















<!-- <?php include('includes\config.php'); ?> -->
<!-- <?php  
      //export.php  
 if(isset($_POST["export"]))  
 {  
    //   $connect = mysqli_connect("localhost", "root", "", "testing");  
      header('Content-Type: csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID', 'lon_data', 'lat_data', 'temp_data', 'pressure_data', 'humidity_data', 'cloud_data', 'visibility_data', 'wind_speed_data', 'date'));  
      $query = "SELECT * from tbl_employee ORDER BY ID DESC";  
    //   $result = mysqli_query($connect, $query);  
      $result = $conn->query($query);
      echo $output;
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>   -->



