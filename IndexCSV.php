<?php include('includes\config.php'); ?>
<?php  
 $query ="SELECT * FROM newajax ORDER BY ID desc";  
 $result = $conn->query($query);
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Export Mysql Table Data to CSV file in PHP</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
<!-- Export link -->
<div class="col-md-12 head">
    <div class="float-right">
        <a href="export.php" class="btn btn-success"><i class="dwn"></i> Export</a>
    </div>
</div>

<!-- Data list table --> 
<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>lon_data</th>
            <th>lat_date</th>
            <th>temp_data</th>
            <th>pressure_data</th>
            <th>humidity_data</th>
            <th>cloud_data</th>
            <th>visibility_data</th>
            <th>wind_speed_data</th>
            <th>date</th>
        </tr>
        </tr>
    </thead>
    <tbody>
   <?php 
    // Fetch records from database 
    $result = $conn->query("SELECT * FROM newajax ORDER BY id ASC"); 
    if($result->num_rows > 0){ 
        while($row = $result->fetch_assoc()){ 
    ?>
        <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['lon_data']; ?></td>
            <td><?php echo $row['lat_data']; ?></td>
            <td><?php echo $row['temp_data']; ?></td>
            <td><?php echo $row['pressure_data']; ?></td>
            <td><?php echo $row['humidity_data']; ?></td>
            <td><?php echo $row['cloud_data']; ?></td>
            <td><?php echo $row['visibility_data']; ?></td>
            <td><?php echo $row['wind_speed_data']; ?></td>
            <td><?php echo $row['date']; ?></td>
        </tr>
    <?php } }else{ ?>
        <tr><td colspan="7">No member(s) found...</td></tr>
    <?php } ?>
    </tbody>
</table>
      </body>  
 </html>  