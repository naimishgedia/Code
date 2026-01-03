<?php 
===================================STRING  FUNCTIONS============================================
CONCAT(u.first_name," ",u.middle_name," ", u.last_name) as student_name //CONCAT
CONCAT_WS("-", "one", "two", "three", "four") AS string_name;// Output:one-two-three-four 
GROUP_CONCAT(temp2.exam_name SEPARATOR '/') //  jyare be rows ne merge karvi hoy tyare aano use krvo ,aana mate query ni last ma GROUP BY marvu jaruri che  

//Make Json Object
GROUP_CONCAT(
    JSON_OBJECT(
        'Subject', aqd.subject,
        'Institute Name', aqd.institute_name,
        'Date of completion', aqd.date_of_completion,
        'Duration of course', aqd.duration_of_course
    ) 
) AS qualification_details

//Make comma saperated list
GROUP_CONCAT(
	CONCAT_WS(
		',',
		CONCAT("Post:",aep.post_held),
		CONCAT("From Date:",aep.from_date),
		CONCAT("To Date:",aep.to_date)
	) SEPARATOR '|'	
) AS job_experience

Last ma GROUP BY marvu
==============================CONDITIONAL STATEMENTS==================================================
if(tq.is_confirm=1,'Confirm','Not Confirm') as set_status

CASE 
	WHEN temp.is_attend=0 THEN "Exam not attended"
	WHEN temp.is_attend=1 THEN "Exam attended"
	WHEN temp.is_attend=2 THEN "Exam Complated"  
	ELSE "Unknown Status"
END  AS exam_status	


====================================================================================================== 
 
ROUND(100.00000, 2)	// it consider upto 2 digites 
COUNT(*) as total_count  // for display total count 
SUM(IF(es.is_attend=2,1,0)) AS exam_completed // sum of all record
CHAR_LENGTH("Naimish") AS length; //it will return length
SUBSTRING('demotest',2)  //it will remove first two char and -2 will remove last two char 
SUBSTRING_INDEX("demo-test-one-two-69849", "-", -1); // it will return only 69849. and 1 will return only demo 


======================================DATETIME=========================================================
SELECT DATEDIFF('2024-07-08','2024-07-1') AS date_diff // be date vacche no difference find karva mate 
SELECT CURDATE() AS today_date; // current date find karva mate
SELECT now() AS current_date_time  // current datetime

