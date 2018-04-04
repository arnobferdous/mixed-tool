<?php 
    
    require 'vendor/autoload.php';
    use Carbon\Carbon;
    
    $dbd = "02/04/2018";
    $dbt = "9:30";
    $duration = 1;

    $dbd = explode('/',$dbd);
    $dbt = explode(':', $dbt);

    //$dbd = (int)$dbd[2].(int)$dbd[1].(int)$dbd[0].(int)$dbt[0].(int)$dbt[1];
    $dbd = (int)$dbd[2].(int)$dbd[1].(int)$dbd[0].(((int)$dbt[0])+$duration).(int)$dbt[1];
        
    $now = Carbon::now();
    $now->timezone = new DateTimeZone('Asia/Dhaka');
    $now = explode('-', $now->format('Y-m-d-h-i'));
    $now = (int)$now[0].(int)$now[1].(int)$now[2].(int)$now[3].(int)$now[4];
    $now > $dbd ? $msg='Expired!' : $msg = 'Active!';
    echo $msg;

    //Make it a function which will return boolean (True/False);
    //function date_time_checker( $db_date, $db_time, $duration, $current_time );

?>
