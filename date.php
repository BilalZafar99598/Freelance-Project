<?php
// $date = new DateTime('2022-05-31'); // Y-m-d
// $date->add(new DateInterval('P30D'));
// for($i=0;$i<=31;++$i)
// {
//     $date->add(new DateInterval('P30D'));
//     echo $date->format('Y-m-d') . "<br>";
// }
?>
<!-- <?php
// $duration = new \DateInterval('P1Y');
// $intervalInSeconds = (new DateTime())->setTimeStamp(0)->add($duration)->getTimeStamp();
// $intervalInDays = $intervalInSeconds/86400; 
// echo $intervalInDays;
// echo " Done";
?> -->

<?php

// // One month from today
// $date = date('Y-m-d', strtotime('+1 month'));

// // One month from a specific date
// $date = date('Y-m-d', strtotime('+1 month', strtotime('2022-05-31')));
// echo $date;
?>

<?php
// for($i=0;$i<=31;++$i)
// {
    // $NewDate=Date('y:m:d', strtotime('+31 days'));
    // echo $NewDate."<br>";
    // echo date("Y/m/d") . "<br>";
    $date = date("Y/m/d");
    // echo gettype($date);
    for($i=1;$i<=31;++$i)
    {
        $dailydate = date('Y/m/d',strtotime($i.'days',strtotime(str_replace('=', '-', $date)))) . PHP_EOL ."<br>";
        echo $dailydate;
        // echo date('Y/m/d',strtotime($i.'days',strtotime(str_replace('/', '-', $date)))) . PHP_EOL ."<br>";
    }
    // echo date('Y/m/d',strtotime('+30 days',strtotime(str_replace('/', '-', $date)))) . PHP_EOL;

// }
?>