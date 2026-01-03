<?
===============PHD HNGU=================================================================================================================================
========================================================================================================================================================
// exam_name,total_student,attended,not_attend,exam_completed,attandance_percentage
SELECT 
e.id,
e.name as exam_name,
count(es.id) as total_student,
sum(if(es.is_attend=1,1,0)) as attended,
sum(if(es.is_attend=0,1,0)) as not_attend,
sum(if(es.is_attend=2,1,0)) as exam_completed,
CONCAT(ROUND((sum(if(es.is_attend=2,1,0))/count(es.id)*100),0),'%') as attandance_percentage
FROM 
exams e,
exam_student es 
WHERE e.id=es.exam_id
GROUP BY e.name  

//exam_student_id,question,option_a,option_b,option_c,option_d,question_correct_answer,student_answer,wrong_or_right
SELECT 
es.id AS exam_student_id,
q.question,
q.option_a,
q.option_b,
q.option_c,
q.option_d, 
q.answer AS question_correct_answer,
esqa.answer AS student_answer,
CASE
	WHEN q.answer=esqa.answer THEN "right answer"
	WHEN q.answer!=esqa.answer THEN "wrong answer"
	ELSE "Unknown verdict"
END AS wrong_or_right
FROM 
exam_student es,
exams e,
exam_question eq,
questions q,
exam_student_question_answer esqa
WHERE es.id=1575 
AND es.exam_id=e.id
AND eq.exam_id=es.exam_id
AND q.id=eq.question_id
AND esqa.exam_student_id=es.id
AND esqa.question_id=eq.question_id

//question_id,question_correct_answer,student_answer,student_answer_status
SELECT eq.question_id,q.answer AS question_correct_answer,
(SELECT esqa.answer  FROM exam_student_question_answer esqa WHERE exam_student_id=1768 AND q.id=esqa.question_id) AS student_answer,
(SELECT 
IF(esqa.answer=q.answer,"Correct","Incorrect") AS student_answer_status
FROM exam_student_question_answer esqa WHERE exam_student_id=1768 AND q.id=esqa.question_id) AS student_answer_status
FROM 
exam_question eq,
questions q
WHERE eq.exam_id=38
AND q.id=eq.question_id

//student correct answer 
SELECT 
SUM(IF(temp.student_answer_status=1,0,1)) AS student_correct_answer
FROM (SELECT eq.exam_id,eq.question_id,q.answer AS question_correct_answer,
(SELECT esqa.answer  FROM exam_student_question_answer esqa WHERE exam_student_id=1768 AND q.id=esqa.question_id) AS student_answer,
(SELECT 
IF(esqa.answer=q.answer,0,1) AS student_answer_status
FROM exam_student_question_answer esqa WHERE esqa.exam_student_id=1768 AND q.id=esqa.question_id) AS student_answer_status
FROM 
exam_question eq,
questions q
WHERE eq.exam_id=38
AND q.id=eq.question_id) AS temp GROUP BY temp.exam_id

//user_id,student_name,node_number,exam_status,exam_student_id,total_exam_questions,total_correct_answer
SELECT u.id AS user_id,CONCAT(u.first_name,' ',u.middle_name,' ',u.last_name) AS student_name,es.node_number,
				CASE
					WHEN es.is_attend=0 THEN "Exam Not attended"
					WHEN es.is_attend=1 THEN "Exam attended"
					WHEN es.is_attend=2 THEN "Exam completed"
				END AS exam_status,es.id as exam_student_id,
				(SELECT COUNT(*) FROM exam_question WHERE exam_id=15) AS total_exam_questions,
				(SELECT COUNT(*) FROM questions q,exam_student_question_answer esqa,exam_question eq WHERE 
				esqa.question_id=eq.question_id
				AND q.answer=esqa.answer 
				AND es.id=esqa.exam_student_id 
				AND eq.exam_id=15 AND 
				q.id=esqa.question_id
				) AS total_correct_answer
FROM 
users u,
exam_student es
WHERE es.exam_id=15 
AND es.user_id=u.id 
AND es.is_attend=2  


======================================EFH=========================================================================================================
==================================================================================================================================================
//id,company_name,total_exam_conducted,exam_names(comma saperated),exam_ids(comma saperated)
SELECT 
cm.id,
cm.company_name,                                               
COUNT(e.id) as total_exam_conducted,
GROUP_CONCAT(e.name SEPARATOR ',') AS exam_names,
GROUP_CONCAT(e.id SEPARATOR ',') AS exam_ids
FROM
company_master cm,
exams e
WHERE e.company_id=cm.id
GROUP BY cm.id	

//company_name,exam_name,total_student,exam_not_attended,exam_attended,exam_completed
SELECT 
temp.company_name,
temp.exam_name,
COUNT(es.id) AS total_student,
SUM(IF(es.is_attend=0,1,0)) as "exam_not_attended",
SUM(IF(es.is_attend=1,1,0)) as "exam_attended",
SUM(IF(es.is_attend=2,1,0)) as "exam_completed"
FROM 
(SELECT cm.company_name,e.name as exam_name,e.id as exam_id FROM 
company_master cm,
exams e
WHERE cm.id=16
AND e.company_id=cm.id) as temp,
exam_student es
WHERE es.exam_id=temp.exam_id
GROUP BY es.exam_id

===================================================SUKSRPD======================================================================
================================================================================================================================
// teacher_name,chairman_name,exam_group_name	
SELECT temp.teacher_name,
CONCAT(u2.first_name,' ',u2.middle_name,' ',u2.last_name) AS chairman_name,
g.name as exam_group_name
FROM (SELECT u.id as teacher_id,CONCAT(u.first_name,' ',u.middle_name,' ',u.last_name) AS teacher_name,
etg.chairman_id,etg.exam_group_id
FROM
users u,
exam_teacher_group etg 
WHERE u.type=5
AND etg.teacher_id=u.id) as temp,
users u2,
groups g 
WHERE u2.id=temp.chairman_id
AND temp.exam_group_id=g.id

//teacher_id,teacher_name,group_name,group_id,set_no,set_status
SELECT * FROM (SELECT 
temp.teacher_id,temp.teacher_name,temp.group_name,temp.group_id,tq.set_no,
CASE
	WHEN tq.is_confirm=1 THEN "Confirmed"
	WHEN tq.is_confirm=0 THEN "Not Confirmed"
	ELSE "Unknown Status"
END AS set_status 
FROM (SELECT 
u.id as teacher_id,
CONCAT(u.first_name,' ',u.middle_name,' ',u.last_name) AS teacher_name,
g.name as group_name,
g.id as group_id FROM  
users u,
exam_teacher_group etg,  
groups g 
WHERE u.type=5    
AND etg.teacher_id=u.id
AND g.id=etg.exam_group_id) as temp,
teacher_questions tq
WHERE tq.group_id=temp.group_id
AND tq.added_by=temp.teacher_id
GROUP BY tq.set_no,tq.added_by
) AS temp2 ORDER BY temp2.teacher_id

//teacher_id,teacher_name,chairman_name,group_name,chairman_id,exam_group_id,set_no,teacher_confirmed_status,chairman_confirmed_status
SELECT * FROM (SELECT temp2.teacher_id,temp2.teacher_name,temp2.chairman_name,temp2.group_name,temp2.chairman_id,temp2.exam_group_id,tq.set_no,
IF(tq.is_confirm=1,"Confirm","Not Confirm") AS teacher_confirmed_status,
IF(tq.is_chairman_confirm=1,"Confirm","Not Confirm") AS chairman_confirmed_status
FROM (SELECT temp.teacher_id,temp.teacher_name,CONCAT(u2.first_name,' ',u2.middle_name,' ',u2.last_name) AS chairman_name,g.name AS group_name,temp.chairman_id,temp.exam_group_id 
FROM (SELECT 
u.id as teacher_id,
CONCAT(u.first_name,' ',u.middle_name,' ',u.last_name) AS teacher_name,
etg.chairman_id,etg.exam_group_id
FROM 
users u,
exam_teacher_group etg
WHERE
u.type=5
AND etg.teacher_id=u.id
ORDER BY u.id) as temp,
users u2,groups g
WHERE u2.id=temp.chairman_id AND g.id=temp.exam_group_id) as temp2,
teacher_questions tq 
WHERE tq.added_by=temp2.teacher_id AND temp2.exam_group_id=tq.group_id ORDER BY tq.added_by) as temp3
GROUP BY temp3.group_name,temp3.set_no ORDER BY temp3.teacher_id


//user_id,teacher_name,group_name,chairman_name,chairman_id,set_no,teacher_confirm_status,chairman_confirm_status
SELECT temp.*,tq.set_no,
IF(tq.is_confirm=1,"Confirm","Not Confirm") AS teacher_confirm_status,
IF(tq.is_chairman_confirm=1,"Confirm","Not Confirm") AS chairman_confirm_status
FROM (SELECT temp.* FROM (SELECT 
u.id AS user_id,
CONCAT(u.first_name,' ',u.middle_name,' ',u.last_name) AS teacher_name,
g.id AS group_id,
g.name AS group_name,
(SELECT CONCAT(u2.first_name,' ',u2.middle_name,' ',u2.last_name)  FROM  users u2 WHERE u2.id=etg.chairman_id) AS chairman_name,
etg.chairman_id
FROM
users u,
exam_teacher_group etg,
groups g
WHERE u.type=5 AND
g.id=etg.exam_group_id AND 
etg.teacher_id=u.id
) AS temp,
teacher_questions tq
WHERE tq.added_by=temp.user_id
GROUP BY temp.group_id) AS temp,
teacher_questions tq WHERE
tq.added_by=temp.user_id AND 
temp.group_id=tq.group_id
GROUP BY tq.group_id,tq.set_no
  



===================Atmiya=====================
SELECT temp.*,GROUP_CONCAT(temp.experience SEPARATOR '/')AS experience FROM (SELECT c.*,
CONCAT_WS(',',
    CONCAT('Organization Name: ', ce.organization),
    CONCAT('Start Date: ', ce.start_date),
    CONCAT('Relieving Date: ', ce.relieving_date),
    CONCAT('Designation: ', ce.designation),
    CONCAT('Exp Type: ', ce.exp_type),
    CONCAT('Total Exp: ', ce.total_exp)
   ) AS experience
FROM 
carrer_new c,
carrer_experience ce
WHERE c.id=ce.carrer_id) AS temp GROUP BY temp.id;



===================AIIMS=================================
//application_id,applicant_full_name,registration_no,job_title,job_post,Physical_status,category_name,religion,marital_status,gender,country_name,state_name,job_experience,qualification_details
SELECT 
		temp2.*,
		GROUP_CONCAT(
		    JSON_OBJECT(
		        'Subject', aqd.subject,
		        'Institute Name', aqd.institute_name,
		        'Date of completion', aqd.date_of_completion,
		        'Duration of course', aqd.duration_of_course
		    ) 
		) AS qualification_details
FROM
		(SELECT 
			temp.*,
			GROUP_CONCAT(
			    JSON_OBJECT(
			        'Post', aep.post_held,
			        'From Date', aep.from_date,
			        'To Date', aep.to_date
			    ) 
			) AS job_experience
		FROM 
				(SELECT
					am.id AS application_id,
					am.applicant_full_name,
					am.registration_no,
					jl.title AS job_title,
					jpm.name AS job_post,
					CASE
						WHEN am.is_pwbd=0 THEN "Not Disabled"
						WHEN am.is_pwbd=1 THEN "Disabled"
					END AS "Physical_status",
					cm.name AS category_name,
					am.religion,
					CASE
						WHEN am.marital_status=2 THEN "Unmarried" 
						WHEN am.marital_status=1 THEN "Married"
						ELSE "Unknown Status"
					END AS marital_status,
					CASE
						WHEN am.gender=2 THEN "Male"
						WHEN am.gender=1 THEN "Female"
						ELSE "Other"
					END AS gender,
					c.name AS country_name,
					s.name AS state_name
				FROM 
					application_master am,
					job_listings jl,
					job_post_master jpm,
					category_master cm,
					countries c,
					states s
				WHERE 
					am.job_list_id=jl.id AND
					jpm.id=am.job_post_id AND
					cm.id=am.category_id AND
					c.id=am.nationality_id AND
					s.id=am.state_id
				) AS temp,
				app_experience_details aep
		WHERE
			  aep.app_id=temp.application_id
			  GROUP BY temp.application_id
		) AS temp2,
		app_qualification_details aqd
WHERE
		temp2.application_id=aqd.app_id
		GROUP BY temp2.application_id
			  

===================================================


