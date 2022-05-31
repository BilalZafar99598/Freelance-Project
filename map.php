<?php include('includes/header.php'); ?>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54">
    <!-- Menu Bar Starts From Here -->
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
        <div class="container"><a class="navbar-brand" href="#page-top">SOLAR</a><button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto text-uppercase"></ul>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto text-uppercase">
                        <li class="nav-item"><a class="nav-link" href="index.php">home&nbsp;</a></li>
                        <li class="nav-item"><a class="nav-link" href="aboutus.php">about us</a></li>
                        <li class="nav-item"><a class="nav-link" href="contactus.php">contact us</a></li>
                        <li class="nav-item"><a class="nav-link" href="calculator.php">Calculator</a></li>
                        <li class="nav-item"></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main Body starts from Here -->
    <div class="container maincontainer mb-5 bg-info">
        <div class="row HeadingSection text-center">
            <h1>Area Details</h1>
        </div>
        <div class="row PaddingContainer mb-4">
            <form id="areasubmit" action="result.php" method="post">
                <div class="row mb-3">
                    <label for="area" class="form-label">Area(m<sup>2</sup>)</label>
                    <input type="number" class="form-control City_Name" id="area" name="area" min="0" value="" required>
                </div>
                <div class="row mb-3">
                    <label for="region" class="form-label">Region</label>
                    <select id="region" name="region" class="form-select">
                        <option selected disabled>Select a Region</option>
                        <?php
                        $result = getregions();
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option class="pe-5" value="' . $row['Region'] . '">' . $row['Region'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="row mb-3">
                    <label for="city" class="form-label">City</label>
                    <select id="city" name="city" class="form-select">
                        <option selected disabled>Select a City</option>
                    </select>
                </div>
                <input type="text" name="array" id="array" class="next btn btn-secondary" value="" hidden>
                <div class="row pb-5 mt-5">
                    <div class="col-12 text-center">
                        <input type="submit" name="submit" class="next btn btn-secondary submit" value="Next" disabled>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php

    ?>

    <?php include('includes/footer.php'); ?>

    <script>
        // Ajax Call on Selecting the Region
        $(document).on('change', '#region', function(e) {

            // Select the focus select tag
            var selectElement = $(e.target);
            var SelectedCategory = selectElement.val();
            $.ajax({
                url: 'ajaxCall/GetCity.php?C=' + SelectedCategory + '',
                type: 'POST',
                success: function(response) {
                    $('#city').html('<option selected disabled>Select a City</option>' + response);
                    if ($('#city').val() != null) {
                        $('.submit').removeAttr('disabled');
                    } else {
                        $('.submit').attr('disabled', true);
                    }
                }
            })
        })

        // Ajax Call to Weather API on Selecting the City
        $(document).on('change', '#city', function(e) {
            // debugger
            // Select the focus select tag
            var selectElement = $(e.target);
            var City_name = selectElement.val();

            // Functionality Work

            // API's AND URL's
            API_KEY_1 = "57633490cce3cdb305fab93e630c6a4f"
            API_KEY_2 = "b60d5bcd7e160dc57de264fa00f95370";
            API_URL_1 = "http://api.openweathermap.org/data/2.5/weather?q=" + City_name + "&appid=" + API_KEY_1 + "";

            // Last 30 Days timestamps (UNIX)
            var thirty_Days_Arrays = [];
            const seconds_In_A_Day = 86400;

            //Current Date
            const current_unix_time = Date.now();
            const current_local_date = new Date(current_unix_time).getDate();
            const current_local_month = new Date(current_unix_time).getMonth();
            const current_local_year = new Date(current_unix_time).getFullYear();
            const current_unix_date = (new Date(current_local_year, current_local_month, current_local_date).getTime()) / 1000;
            thirty_Days_Arrays.push(current_unix_date);

            // Other Previous 29 Dates
            var new_Prev_Date = current_unix_date;
            for (let i = 0; i < 29; i++) {
                new_Prev_Date = new_Prev_Date - seconds_In_A_Day;
                thirty_Days_Arrays.push(new_Prev_Date);
            }

            // Promise for first Ajax Call for lat and lon
            const promise = new Promise((resolve, reject) => {
                
                // Ajax Call for API_URL_1
                $.ajax({
                    url: API_URL_1,
                    method: "GET",
                    success: function(data, success, xhr) {
                        coords = data.coord;
                        resolve(coords);
                    }
                });

            });

            promise.then((coords) => {

                // Declare and Initiliaze Some Empty Arrays that will be filled later
                var modal_Array = [];
                const myarrKeys = [];
                var myarrValues = [];

                // Array for Parameters that Needed later 

                var Lon_array = [];
                var Lat_array = [];
                var temp_array = [];
                var pressure_array = [];
                var humidity_array = [];
                var cloud_ceiling_array = [];
                var visibility_array = [];
                var wind_speed_array = [];

                thirty_Days_Arrays.forEach((element, index) => {

                    // API URl for Weather Data
                    API_URL_2 = "https://api.openweathermap.org/data/3.0/onecall/timemachine?lat=" + coords.lat + "&lon=" + coords.lon + "&dt=" + element + "&appid=" + API_KEY_2 + "";

                    // Ajax Call for API_URL_2
                    $.ajax({
                        async: false,
                        url: API_URL_2,
                        method: "GET",
                        success: function(data, success, xhr) {

                            // console.log(data);

                            // This is array conversion
                            const objectArray = Object.entries(data);

                            // converting the object into array and storing the value in myarr array
                            objectArray.forEach(([key, value]) => {
                                if(index == 0){
                                    myarrKeys.push(key);
                                }
                                myarrValues.push(value);
                            });

                            // console.log(myarrKeys);
                            // console.log(myarrValues);

                            modal_Array.push(myarrValues);
                            myarrValues = [];
                        },
                        error: function(xhr, status, error) {

                        }
                    });
                });

                for (let j = 0; j < modal_Array.length; j++) {

                    if(modal_Array[j][0] == undefined){
                        Lat_array.push(0);
                    }else{
                        Lat_array.push(modal_Array[j][0]);
                    }

                    if(modal_Array[j][1] == undefined){
                        Lon_array.push(0);
                    }else{
                        Lon_array.push(modal_Array[j][1]);
                    }

                    if(modal_Array[j][4][0].temp == undefined){
                        temp_array.push(0);
                    }else{
                        temp_array.push(modal_Array[j][4][0].temp);
                    }

                    if(modal_Array[j][4][0].pressure == undefined){
                        pressure_array.push(0);
                    }else{
                        pressure_array.push(modal_Array[j][4][0].pressure);
                    }

                    if(modal_Array[j][4][0].humidity == undefined){
                        humidity_array.push(0);
                    }else{
                        humidity_array.push(modal_Array[j][4][0].humidity);
                    }

                    if(modal_Array[j][4][0].clouds == undefined){
                        cloud_ceiling_array.push(0);
                    }else{
                        cloud_ceiling_array.push(modal_Array[j][4][0].clouds);
                    }

                    if(modal_Array[j][4][0].visibility == undefined){
                        visibility_array.push(0);
                    }else{
                        visibility_array.push(modal_Array[j][4][0].visibility);
                    }

                    if(modal_Array[j][4][0].wind_speed == undefined){
                        wind_speed_array.push(0);
                    }else{
                        wind_speed_array.push(modal_Array[j][4][0].wind_speed);
                    }

                }
                currentdate = new Date(); 
                // datetime = currentdate.getDate() + "-"
                // + (currentdate.getMonth()+1)  + "-" 
                // + currentdate.getFullYear() + " "  
                // + currentdate.getHours() + ":"  
                // + currentdate.getMinutes() + ":" 
                // + currentdate.getSeconds();
                datetime = currentdate.getDate() + "-"
                + currentdate.getFullYear() + "-"
                + (currentdate.getMonth()+1) + "-"
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();
                // console.log("Current Date is: "+datetime);

                $.ajax({
                    url: 'index1.php',
                    method: "POST",
                    data: {
                        lon_data: Lon_array,
                        lat_data: Lat_array,
                        temp_data: temp_array,
                        pressure_data: pressure_array,
                        humidity_data: humidity_array,
                        cloud_data: cloud_ceiling_array,
                        visibility_data: visibility_array,
                        wind_speed_data: wind_speed_array,
                        datetime:datetime
                    },
                    success: function(data, success, xhr) {
                        // debugger;
                        <?php
                            // $_POST[]

                        ?>
                //         currentdate = new Date(); 
                // datetime = "Last Sync: " + currentdate.getDate() + "-"
                // + (currentdate.getMonth()+1)  + "-" 
                // + currentdate.getFullYear() + " "  
                // + currentdate.getHours() + ":"  
                // + currentdate.getMinutes() + ":" 
                // + currentdate.getSeconds();
                // console.log("Current Date is: "+datetime);
                        console.log(Lat_array[0],Lat_array[1],Lat_array[2],Lat_array[3],Lat_array[4],Lat_array[5]);
                        
                        // sendtophp(Lat_array);


                        // console.log(Lon_array,Lat_array,temp_array)
                        // alert("Success");
                        // console.log(data);
                        <?php
                            // $cars = array("Volvo", "BMW", "Toyota");
                            // for($i = 0; $i <=2; ++$i)
                            //     { 
                            //         echo shell_exec("python echo.py $cars[$i]");
                            //     }
                        ?>


                        // console.log(Lat_array);
                        // console.log('Success');
                    },
                    error: function(error){
                        console.log('Error');
                    } 
                });

                // Submit Button Disabled
                if ($('#city').val() != null) {
                    $('.submit').removeAttr('disabled');
                } else {
                    $('.submit').attr('disabled', true);
                }
                
            });

        })

        // function sendtophp(data){
        //     debugger;
        //     var test="test";
        //     $.ajax({
        //             url: 'index1.php/test',
        //             method: "POST",
        //             data: data,
        //             success: function(data) {
        //                 debugger;
        //                 console.log(data);
                        
                        


                    

        //                 // console.log(Lat_array);
        //                 // console.log('Success');
        //             },
        //             error: function(error){
        //                 debugger;
        //                 console.log('Error');
        //             } 
        //         });

               
        // }
    </script>