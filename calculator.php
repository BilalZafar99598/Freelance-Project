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
                        <li class="nav-item"><a class="nav-link active" href="calculator.php">Calculator</a></li>
                        <li class="nav-item"></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main Body starts from Here -->
    <div class="container-fluid maincontainer mb-5 bg-info">
        <div class="row HeadingSection text-center">
            <h1>Electricity Calculator</h1>
        </div>
        <div class="row PaddingContainer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Category</th>
                        <th scope="col" class="text-center">Appliances</th>
                        <th scope="col" class="text-center">Quantity</th>
                        <th scope="col" class="text-center">Watts</th>
                        <th scope="col" class="text-center">Hours Per Day</th>
                        <th scope="col" class="text-center">Watt Hours Per Day</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody class="mt-3">
                    <tr>
                        <td>
                            <select name="Categories" class="Categories w-100">
                                <option selected disabled>Select Category</option>
                                <?php
                                $result = getcategory();
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option class="pe-5" value="' . $row['Category_Name'] . '">' . $row['Category_Name'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </td>
                        <td scope="row">
                            <select name="Appliances" class="Appliances w-100">

                            </select>
                        </td>
                        <td>
                            <input type="number" name="Quantity" value="0" min="0" class="Quantity w-100">
                        </td>
                        <td>
                            <input type="number" name="Watts" value="0" class="Watts w-100" disabled>
                        </td>
                        <td>
                            <input type="number" name="Hours" value="0.0" min="0.0" max="24" step="0.1" class="Hours w-100">
                        </td>
                        <td>
                            <input type="text" name="Watts_Day" class="Watts_Day w-100" min="0" value="0" disabled>
                        </td>
                        <td>
                            <button type="button" class="cancel border-0 bg-transparent fs-3 p-0">
                                <i class="bi bi-x-circle-fill"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row PaddingContainer mb-5">
            <div class="col">
                <button type="button" class="add border-0 bg-transparent fs-6 p-0">
                    <span class="fs-6 me-2">Add Appliance</span>
                    <i class="bi bi-plus-circle-fill"></i>
                </button>
            </div>
            <div class="col text-end">
                <button type="button" class="clear border-0 bg-transparent fs-6 p-0">
                    <span class="fs-6 me-2">Clear all Fields</span>
                </button>
            </div>
        </div>
        <div class="row PaddingContainer mb-5">
            <div class="col-12 text-center fs-5">
                Total Energy Consumption
            </div>
        </div>
        <div class="row PaddingContainer mb-5">
            <div class="col-6 p-0 text-center">
                <span class="me-3"><input type="number" name="TotalWattsPerDay" id="TotalWattsPerDay" class="text-center" value="" disabled></span>
                <span class="fs-6 HeadingDescription">Wh/d</span>
            </div>
            <div class="col-6 p-0 text-center">
                <span class="me-3"><input type="number" name="TotalKWattsPerMonth" id="TotalKWattsPerMonth" class="text-center" disabled></span>
                <span class="fs-6 HeadingDescription">kWh/mo</span>
            </div>
        </div>
        <div class="row PaddingContainer pb-4">
            <div class="col-12 text-center">
                <a href="map.php" class="toMapPage">
                    <button type="button" class="next btn btn-secondary fs-6">
                        <span class="fs-6 me-2">Next</span>
                        <i class="bi bi-arrow-right-circle-fill"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>


    <?php include('includes/footer.php'); ?>
    <script>
        $(document).ready(function() {

            // For Activing the Menu according to the page that is rendering
            var page = location.href;
            var LastofUrl = page.split('/')[4];
            switch (LastofUrl) {
                case 'aboutus.php':
                    $('a[href="aboutus.php"]').addClass('active');
                    break;
                case 'contactus.php':
                    $('a[href="contactus.php"]').addClass('active');
                    break;
                case 'calculator.php':
                    $('a[href="calculator.php"]').addClass('active');//Check it activeness
                    break;
                default:
                    $('a[href="index.php"]').addClass('active');
                    break;
            }

            const tablebody = $('tbody');
            const tablebodyrow = `<tr>
<td>
    <select name="Categories" class="Categories w-100">
        <option selected disabled>Select Category</option>
        <?php
        $result = getcategory();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<option class="pe-5" value="' . $row['Category_Name'] . '">' . $row['Category_Name'] . '</option>';
            }
        }
        ?>
    </select>
</td>
<td scope="row">
    <select name="Appliances" class="Appliances w-100">
    </select>
</td>
<td>
    <input type="number" name="Quantity" value="0" min="0" class="Quantity w-100">
</td>
<td>
    <input type="number" name="Watts" value="0" min="" max="" class="Watts w-100" disabled>
</td>
<td>
    <input type="number" name="Hours" value="0.0" min="0.0" max="24" step="0.1" class="Hours w-100">
</td>
<td>
<input type="text" name="Watts_Day" class="Watts_Day w-100" min="0" value="0" disabled>
</td>
<td>
    <button type="button" class="cancel border-0 bg-transparent fs-3 p-0">
        <i class="bi bi-x-circle-fill"></i>
    </button>
</td>
</tr>`;

            // Ajax Call on Selecting the Category
            $(document).on('change', '.Categories', function(e) {
                // Select the focus select tag
                var selectElement = $(e.target);

                var SelectedCategory = selectElement.val();
                $.ajax({
                    url: 'ajaxCall/GetAppliances.php?C=' + SelectedCategory + '',
                    type: 'POST',
                    success: function(response) {
                        selectElement.parent().next().children().html('<option selected disabled>Select an Appliance</option>' + response);
                    }
                })
            })

            // Event Binding on Appliance Select Tag
            $(document).on('change', '.Appliances', function(e) {
                // Select the focus select tag
                var selectElement = $(e.target);

                // Get the Watt Value of the Selected Appliance
                var ApplianceWatts = selectElement.find(':selected').attr('data-value');

                // Set the Asscociative Quantity
                selectElement.parent().next().children().prop('value', 1);

                // Set the Associative Watts Field
                selectElement.parent().next().next().next().children().prop('value', 0);

                // Set the Associative Watt Value
                selectElement.parent().next().next().children().prop('value', ApplianceWatts);

                // if (selectElement.find(':selected').attr('data-max')) {
                //     var ApplianceWattsMax = selectElement.find(':selected').attr('data-max');
                //     selectElement.parent().next().next().children().prop('max', ApplianceWattsMax);
                // }

                // Calculation
                wattsPerday();

                // Event Binding on each Input field
                selectElement.parent().next().children().on('change keyup', wattsPerday);
                selectElement.parent().next().next().children().on('change keyup', wattsPerday);
                selectElement.parent().next().next().next().children().on('change keyup', wattsPerday);

                // Function the Watts Per Day
                function wattsPerday() {
                    var Quantity = selectElement.parent().next().children().val();
                    var Watts = selectElement.parent().next().next().children().val();
                    var Hours = selectElement.parent().next().next().next().children().val();
                    var TotalWatts = (Quantity * Watts * Hours).toFixed(2);
                    selectElement.parent().next().next().next().next().children().val(TotalWatts);
                    TotalApplianceWatts();
                }

            })


            // Event Binding on Cancel Button
            $(document).on('click', '.cancel', function() {
                $(this).parent().parent().empty();
                TotalApplianceWatts();
            })

            // Add more Button
            $('.add').on('click', function() {
                tablebody.append(tablebodyrow);
            })

            // Function For Final Sum
            function TotalApplianceWatts() {
                var totalsum = 0;
                for (let i = 0; i < $('.Watts_Day').length; i++) {
                    totalsum += parseFloat($('.Watts_Day').eq(i).val());
                }
                $('#TotalWattsPerDay').val(totalsum);

                // For Kilo Watts Per Month
                totalkiloWatts = (totalsum * 30) / 1000;
                $('#TotalKWattsPerMonth').val(totalkiloWatts);
                
                // Anchor button working depend on final value
                if($('#TotalKWattsPerMonth').val() != 0 && $('#TotalKWattsPerMonth').val() != ''){
                    $('.toMapPage').css("pointer-events","visible");
                }else{
                    $('.toMapPage').css("pointer-events","none");
                }
            }

            // Clear Button
            $('.clear').on('click', function() {
                $('.Categories').val($('select option:first').val());
                $('.Appliances').empty();
                $('.Quantity').val(0);
                $('.Watts').val(0);
                $('.Hours').val(0.0);
                $('.Watts_Day').val(0);
                $('#TotalWattsPerDay').val(0);
                $('#TotalKWattsPerMonth').val(0);
            })

        })
    </script>