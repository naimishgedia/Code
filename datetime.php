<?php 
- date("Y-m-d"); // to get current date and time
- date('H:i:s'); //get current time in 15:00:00 formet

- $time_in_12_hour_format  = date("g:i a", strtotime("13:30")); //24-hour time to 12-hour time 
- $time_in_24_hour_format  = date("H:i", strtotime("1:30 PM")); // 12-hour time to 24-hour time 
 
=======================Get difference between two time in munutes======================================
// Define the two time strings
$time1 = "10:00:00";
$time2 = "14:30:00";

// Create DateTime objects with today's date and the specified times
$datetime1 = new DateTime(date("Y-m-d") . " " . $time1);
$datetime2 = new DateTime(date("Y-m-d") . " " . $time2);

// Calculate the time difference in minutes
$interval = $datetime1->diff($datetime2);
$minutes = $interval->h * 60 + $interval->i;

// Output the difference in minutes
echo "Time difference in minutes: $minutes minutes";

====================Check wether time is grater then current time or not =========================================
// Define the two time strings
$time1 = "10:00:00";
$time2 = "13:00:00";

// Create DateTime objects for each time  
$datetime1 = new DateTime($time1);
$datetime2 = new DateTime($time2);

// Compare the DateTime objects
if ($datetime2 > $datetime1) {
    echo "13:00:00 is greater than 10:00:00.";
} else {
    echo "13:00:00 is not greater than 10:00:00.";
}
---------------------------------
//Check current timestamp ia grater the database timestamp or not
$form_close_date = DB::table('admin_setting')->where('name', '=', "FORM_CLOSE_DATE")->first();  
$indianTimezone = new DateTimeZone("Asia/Kolkata");
$currentDateTime = new DateTime("now", $indianTimezone);
$formattedDateTime = $currentDateTime->format("Y-m-d H:i:s"); //You will get current timestamp in database formet
$current_datetime = $formattedDateTime; 
$close_date_time = $form_close_date->created_at;

if ($current_datetime > $close_date_time) 
	echo "current time is grater the database time"




