<?php

use App\AdminSetting;
use App\ExamStudent;
use App\Group;
use App\Exam;
use App\ExamStudentPaper;
use App\ExamStudentQuestionAnswer;
use App\ExamStudentAssesmentAnswer;
use App\StudentGroup;
use App\Sms;
use App\User;
use App\LogActivity;


	function notificationMsg($type, $message){
		\Session::put($type, $message);
	}

	function addToLog($subject)
    {
    	$log = [];
        $log['subject'] = $subject;
        $log['ip'] = Request::ip();
        $log['agent'] = Request::header('user-agent');
        //$log['user_id'] = auth()->check() ? auth()->user()->id : $user_id;
		$log['user_id'] = auth()->user()->id;
        $input = Request::all();
        $data = array_except($input,['password','confirm_password']);
        //$log['input'] = empty($array) ? json_encode($data) : json_encode($array);
        $log['input'] = json_encode($data);
        LogActivity::create($log);
        
    }
	function regSMS($to,$message)
	{
		
		$url = env('SMS_URL').'&message='.$message.'&to='.$to.'&sender=SRTPHD';
		//echo"<pre>";print_r($url);exit;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $output=curl_exec($ch);
		//print_r($output);exit;
        curl_close($ch);
	}
	
	function sendOTP($userid,$nodenumber)
	{
	    $key = rand(100000,999999);
		$user = User::find($userid);
		$user->otp = $key;
		$user->otptime = date('Y-m-d H:i:s');
		$user->save();
		//$smsdetails = Sms::first();
		//$newmessage = str_replace('[node_number]', $nodenumber, $smsdetails->otp_body);
		//$message = urlencode(str_replace('[otp]', $key, $newmessage));
		$newmessage = str_replace('[node_number]', $nodenumber, env('OTP_BODY'));
		$message = urlencode(str_replace('[otp]', $key, $newmessage));
        $to = $user->mobile_number;
        //$url = $smsdetails->url.'&dest_mobileno='.$to."&message=".$message."&Response=N";
        $url = env('SMS_URL').'&message='.$message.'&to='.$to.'&sender=Online&Response=N';
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $output=curl_exec($ch);
        curl_close($ch);
	}

	function sendOldOTP($userid,$nodenumber)
	{
		$user = User::find($userid);
		$key = $user->otp;
		//$smsdetails = Sms::first();
		//$newmessage = str_replace('[node_number]', $nodenumber, $smsdetails->otp_body);
		//$message = urlencode(str_replace('[otp]', $key, $newmessage));
		//$to = $user->mobile_number;
        $newmessage = str_replace('[node_number]', $nodenumber, env('OTP_BODY'));
		$message = urlencode(str_replace('[otp]', $key, $newmessage));
        $to = $user->mobile_number;
        //$url = $smsdetails->url.'&dest_mobileno='.$to."&message=".$message."&Response=N";
        $url = env('SMS_URL').'&message='.$message.'&to='.$to.'&sender=Online&Response=N';
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $output=curl_exec($ch);
        curl_close($ch);
	}
	
	function sendStudentCredential($users)
	{
		$smsdetails = Sms::first();
		foreach($users as $key=>$val){
			$user = User::find($val->user_id);
			$exam = Exam::find($val->exam_id);
			$newmessage = str_replace('[node_number]', $val->node_number, $smsdetails->exam_student_body);
			$examname = str_replace('[exam_name]', $exam->name, $newmessage);
			$message = urlencode(str_replace('[password]', $user->visible_password, $examname));
			$url = $smsdetails->url.'&dest_mobileno='.$user->mobile_number."&message=".$message."&Response=N";
	        $ch = curl_init();
	        curl_setopt($ch,CURLOPT_URL,$url);
	        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	        $output=curl_exec($ch);
	        curl_close($ch);
		}

	}

	function copy_directory($src,$dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while(false !== ( $file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    copy_directory($src . '/' . $file,$dst . '/' . $file);
                }
                else {
                    copy($src . '/' . $file,$dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

	function getstudentgroupname($group_id){
		return StudentGroup::where('id',$group_id)->first();
	}
	
	function getgroupname($group_id)
	{
		return Group::find($group_id);
	}

	function getexamstudentnnode($user_id){
		return ExamStudent::where('user_id',$user_id)->first();
	}
	
	function setAdminUserImage($image)
	{	
		if (!empty($image)) {
			if(\File::exists(env('HTTP_QUE_IMG').'/upload/user/'.$image)){
				return env('HTTP_QUE_IMG').'/upload/user/'.$image;

			}else{
				return env('HTTP_QUE_IMG').'/adminTheme/image/user-defualt-image.jpg';
			}
		}else{
			return env('HTTP_QUE_IMG').'/adminTheme/image/user-defualt-image.jpg';
		}
	}

	function setFrontSettingLogo($slug)
	{	
		$adminSetting = AdminSetting::where('slug',$slug)->first();

		if (!is_null($adminSetting)) {
			if ($slug == 'front-logo' || $slug == 'admin-logo') {
				if (!empty($adminSetting->value)) {
					if(\File::exists(env('HTTP_QUE_IMG').'/upload/setting/'.$adminSetting->value)){
						return env('HTTP_QUE_IMG').'/upload/setting/'.$adminSetting->value;
					}else{
						return env('HTTP_QUE_IMG')."/adminTheme/image/logo.gif";
					}
				}else{
					return env('HTTP_QUE_IMG')."/adminTheme/image/logo.gif";
				}
			}else{
				return $adminSetting->value;
			}
		}
	}

	function userType()
	{
		return ['0' => 'Student' , '1' => 'Admin', '2' => 'Teacher', '3' => 'Head of Proctor', '4' => 'Proctor'];
	}

	function generateResult($exam_student_id)
	{
    	$examplStudent = ExamStudent::find($exam_student_id);
    	$result['totalQuestions'] = $examplStudent->exam->total_question;
    	$result['totalMarks'] = $examplStudent->exam->total_marks;

		$result['studentMarks'] = 0;
		$result['studentCorrent'] = 0;
		$result['studentWrong'] = 0;
		$result['studentAttend'] = 0;
        
        if (!empty($examplStudent->answers)) {
			foreach ($examplStudent->answers as $key => $answer) {
                
                if ($answer->answer != '0') {
                    
                    $result['studentAttend'] = $result['studentAttend'] + 1;
					
					if (strtolower($answer->answer) == strtolower($answer->question->answer)) {
						$result['studentMarks'] = $result['studentMarks'] + $answer->question->per_question_marks;
						$result['studentCorrent'] = $result['studentCorrent'] + 1;
					}else{
						$result['studentWrong'] = $result['studentWrong'] + 1;

						if ($examplStudent->exam->is_minus_system && $examplStudent->exam->negative_marks) {
							$result['studentMarks'] = $result['studentMarks'] - $examplStudent->exam->negative_marks;
						}
					}
				}
			}
		}
		if(!empty($examplStudent->assesmentanswers)){
		    foreach ($examplStudent->assesmentanswers as $key => $answer) {
                if ($answer->answer != '0') {
					$result['studentAttend'] = $result['studentAttend'] + 1;
					$result['studentMarks'] = $result['studentMarks'] + $answer->question_mark;
					if ($examplStudent->exam->is_minus_system && $examplStudent->exam->negative_marks) {
						$result['studentMarks'] = $result['studentMarks'] - $examplStudent->exam->negative_marks;
					}
					
				}
			}
		}
		return $result;
	}
    
    function generateResult1($exam_student_id)
	{
	    
        //echo $exam_student_id; exit;
        
        $mcq_ans = DB::select(DB::raw("select sum(q.per_question_marks) as total_mcq_marks from exam_student_question_answer esqa, questions q
                    where esqa.exam_student_id='".$exam_student_id."' and esqa.question_id=q.id and lower(esqa.answer) = lower(q.answer)"))[0];
        
        $sel_section = DB::select(DB::raw("select q.section_id, count(*) as total_que from exam_student_paper esp, questions q
                                where esp.exam_student_id='".$exam_student_id."' and esp.question_id=q.id and q.question_type>1
                                group by q.section_id"));
        $descriptive_marks=0;
        foreach($sel_section as $val_section)
        {
            $get_esa = DB::select("select esaa.question_mark from exam_student_assesment_answer esaa, questions q
                        where esaa.question_id=q.id and q.section_id='".$val_section->section_id."' and esaa.exam_student_id='".$exam_student_id."'
                        order by esaa.question_mark desc");
            //echo "<pre>"; print_r($get_esa); exit;
            if(count($get_esa)<=($val_section->total_que-2))
            {
                $q_length=count($get_esa);
            }
            else
            {
                $q_length=$val_section->total_que-2;
            }                 
            for($i=0;$i<=($q_length-1);$i++)
            {
                $descriptive_marks+=$get_esa[$i]->question_mark;
            }
        }
        
        return ceil($descriptive_marks+$mcq_ans->total_mcq_marks);
        
	}
	
	function canAccess($slug)
	{
		$user = auth()->user();
		
		if ($user->user_type == 1 ) {
			return true;
		}
		$find = $user->permissions()->where('slug',$slug)->first();
		
		if (!is_null($find)) {
			return true;
		}

		return false;
	}

	function generateExam($exam, $sections)
	{
		$collection = $exam->questions;
		$students = $exam->students;
	    // $grouped = $collection->groupBy('section_id');
	     
	    foreach ($students as $k => $v) {
        	ExamStudentPaper::where('exam_student_id', $v->pivot->id)
        					->delete();

        	foreach ($sections as $section => $how) {
        		if (!empty($how)) {
        			$questions = $exam->questions()->where('section_id', $section)->inRandomOrder()->take($how)->get();

        			foreach ($questions as $key => $value) {
        				ExamStudentPaper::create([
			        		'exam_student_id' => $v->pivot->id,
			        		'question_id' => $value->id,
			        		'question_option_type' => rand(1,4)
			        	]);
        			}
        		}
        	}
		    // foreach ($grouped as $key => $value) {
		    //     $random = $value->shuffle()->all();
		    //     foreach ($random as $ke => $val) {

			   //      	ExamStudentPaper::create([
			   //      		'exam_student_id' => $v->pivot->id,
			   //      		'question_id' => $val->id,
			   //      		'question_option_type' => rand(1,4)
			   //      	]);
		        	
		    //     }
		    // }
	    }
	}
	
	function generateStudentExam($exam,$examstudentid)
	{
		$collection = $exam->questions;
		$students = $exam->students;
		$sections = $exam->section_questions;
	    ExamStudentPaper::where('exam_student_id', $examstudentid)
        					->delete();
        foreach (json_decode($sections, true) as $section => $how) {
    		if (!empty($how)) {
    			$questions = $exam->questions()->where('section_id', $section)->inRandomOrder()->take($how)->get();

    			foreach ($questions as $key => $value) {
    				ExamStudentPaper::create([
		        		'exam_student_id' => $examstudentid,
		        		'question_id' => $value->id,
		        		'question_option_type' => rand(1,4)
		        	]);
    			}
    		}
    	}
	}

	function getSettingValue($slug)
	{
		return AdminSetting::where('slug',$slug)->value('value');
	}

	// function displayQuestions($a, $b, $c, $d, $type)
	// {

			

	// 	switch ($type) {
	// 		case '1':
	// 			$options = [
	// 				'a' => $a,
	// 				'b' => $b,
	// 				'c' => $c,
	// 				'd' => $d,
					
	// 			];
	// 			break;

	// 		case '2':
	// 			$options = [
	// 				'a' => $a,
	// 				'b' => $b,
	// 				'c' => $c,
	// 				'd' => $d,

	// 			];
	// 			break;

	// 		case '3':
	// 			$options = [
	// 				'a' => $a,
	// 				'b' => $b,
	// 				'c' => $c,
	// 				'd' => $d,
	// 			];
	// 			break;

	// 		case '4':
	// 			$options = [
	// 				'a' => $a,
	// 				'b' => $b,
	// 				'c' => $c,
	// 				'd' => $d,
	// 			];
	// 			break;
			
	// 		default:
	// 			# code...
	// 			break;

	// 	}
	// 	 return $options;
		
	// }

	function displayQuestions($a, $b, $c, $d, $type)
	{
		
		switch ($type) {
			case '1':
				$options = [
					'a' => $a,
					'b' => $b,
					'c' => $c,
					'd' => $d
				];
				break;

			case '2':
				$options = [
					'b' => $b,
					'c' => $c,
					'd' => $d,
					'a' => $a,
				];
				break;

			case '3':
				$options = [
					'c' => $c,
					'd' => $d,
					'a' => $a,
					'b' => $b,
				];
				break;

			case '4':
				$options = [
					'd' => $d,
					'a' => $a,
					'b' => $b,
					'c' => $c,
				];

				break;
			
				
				break;

			default:
				# code...
				break;

		}
		return $options;
	}

	function displayStudentbyanswer($exam_student_id, $question_id)
	{
		return  ExamStudentQuestionAnswer::where('exam_student_id', $exam_student_id)
        					->where('question_id', $question_id)
        					->whereNull('deleted_at')
        					->first();

	}
    
    function displayAssesmentAnswer($exam_student_id, $question_id)
	{
		return 	ExamStudentAssesmentAnswer::where('exam_student_id', $exam_student_id)
        					->where('question_id', $question_id)
        					->whereNull('deleted_at')
        					->first();
	}
    
    function does_url_exists($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
        if ($code == 200) {
            $status = true;
        } else {
            $status = false;
        }
        curl_close($ch);
        return $status;
    }
    
	if (! function_exists('date_diffrent')) {
            function date_diffrent($earlierDate, $laterDate) {
                //returns an array of numeric values representing days, hours, minutes & seconds respectively
                $ret=array('days'=>0,'hours'=>0,'minutes'=>0,'seconds'=>0);
                $totalsec = strtotime($laterDate) - strtotime($earlierDate);
                if ($totalsec >= 86400) {
                    $ret['days'] = floor($totalsec/86400);
                    $totalsec = $totalsec % 86400;
                }
                if ($totalsec >= 3600) {
                    $ret['hours'] = floor($totalsec/3600);
                    $totalsec = $totalsec % 3600;
                }
                if ($totalsec >= 60) {
                    $ret['minutes'] = floor($totalsec/60);
                }
                $ret['seconds'] = $totalsec % 60;
                return $ret;
        }
    }
    
    function get_user_name($user_id)
    {
        $query = "SELECT first_name FROM users WHERE id = '$user_id'";
        $result = DB::select(DB::raw($query));
        foreach($result as $row)
        {
            return $row['first_name'];
        }
    }
    
    function mysql_escape($inp)
    { 
        if(is_array($inp)) return array_map(__METHOD__, $inp);

        if(!empty($inp) && is_string($inp)) { 
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp); 
        } 

        return $inp; 
    }
	
	function sendEmail($to, $name, $content,$subject)
    {
		$email = new \SendGrid\Mail\Mail(); 
		$email->setFrom("exam-alert@infinityinfoway.com", "Swami Ramanand Teerth Marathwada University, Nanded");
        $email->setSubject($subject);
        $email->addTo($to, $name);
        $email->addContent("text/html", $content);
        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
		
        $response = $sendgrid->send($email);
      
    }
    
    function emailValidation($email) 
    {
        $regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/";
        $email = strtolower($email);
    
        return preg_match ($regex, $email);
    }
	
	function array_only($array, $keys)
    {
        return Arr::only($array, $keys);
    }
	
	
	  // $abc =  DB::table('exam_student_question_answer')->where('exam_student_id', $exam_student_id)
   //      					->where('question_id', $question_id)
   //      					->first();
