<?php
namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use DB; 
use App\Http\Requests; 
use App\Http\Controllers\Controller;
use App\Dashboard_model; 
 
class DashboardController extends Controller
{
	public function dashboardFunction(Request $request){ 
		$data=array();
		$data['page_title']="Dashboard";
		$questions= DB::select('select * from question');   
		$data['questions']=$questions;
		return view('dashboard/dashboard',$data);  
	} 
	
	public function insertlikesFunction(Request $request){ 
		$question_id=$request->input('question_id');
		$csrf_token = $request->session()->get('csrf_token');  
		$user_id = $request->session()->get('user_id');  
	
		$users = DB::table('Likes')            
		 ->where('csrf_token', '=', $csrf_token)
		 ->where('question_id', '=', $question_id)
		 ->get();
		 $count = $users->count();
		 
		 if($count==1){ 
			 $query= DB::table('likes')
				->where('csrf_token', '=', $csrf_token)
				->where('question_id', '=', $question_id)
			  ->delete();
			  
			  $qry1 = DB::table('likes')            
				 ->where('question_id', '=', $question_id)
				 ->get();
				 $likecount = $qry1->count();
				 
				 $jsonData=array();
				 $jsonData['likecount']=$likecount;
				 $jsonData['status']=0;
				 echo json_encode($jsonData);
			  
		}else{  
				$data=array();
				$data['csrf_token']=$csrf_token; 
				$data['question_id']=$question_id;
				$data['user_id']=$user_id;   
				$query= DB::table('likes')->insert($data);
				
				$qry1 = DB::table('likes')            
				 ->where('question_id', '=', $question_id)
				 ->get();  
				 $likecount = $qry1->count();
				 
				 $jsonData=array();
				 $jsonData['likecount']=$likecount;
				 $jsonData['status']=1;
				 echo json_encode($jsonData);
						
		}
	}  
	
	
	
	public function insertcommentFunction(Request $request){
		$comment=$request->input('comment');
		$question_id=$request->input('question_id');
		$csrf_token = $request->session()->get('csrf_token');
		$user_id = $request->session()->get('user_id');
		
		$data=array();
		$data['comment']=$comment; 
		$data['question_id']=$question_id;
		$data['csrf_token']=$csrf_token; 
		$data['user_id']=$user_id;
		
		
		$users = DB::select('select * from question_answers where question_id="'.$question_id.'" order by created_date desc');
		$jsonData=array();
		if (empty($users)) {
			$query= DB::table('question_answers')->insert($data);
			$id = DB::getPdo()->lastInsertId();
			$query2 = DB::table('question_answers')            
			 ->where('id', '=', $id)
			->first(); 
			
			$qry4 = DB::table('register')            
			 ->where('csrf_token', '=', $query2->csrf_token)
			->first();
			
			
			$qry5 = DB::table('question_answers')            
			 ->where('question_id', '=', $question_id)
			 ->get();  
			$commentcount = $qry5->count();    
			
			$data='<div id="commentbox'.$query2->id.'"><div class="direct-chat-msg"><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-left" style="margin-left: 51px;">'.$qry4->name.'</span><span class="direct-chat-timestamp float-right">'.$query2->created_date.'</span></div><div class="direct-chat-text">'.$query2->comment.'</div></div></div>';
			$jsonData['last_commentid']=0;
			$jsonData['status']=404;
			$jsonData['data']=$data;
			$jsonData['commentcount']=$commentcount;
			 echo json_encode($jsonData); 
		}else{
			$query= DB::table('question_answers')->insert($data);
			$id = DB::getPdo()->lastInsertId();
			$query2 = DB::table('question_answers')            
			 ->where('id', '=', $id)
			->first(); 
			
			$qry4 = DB::table('register')            
			 ->where('csrf_token', '=', $query2->csrf_token)
			->first();
			$qry5 = DB::table('question_answers')            
			 ->where('question_id', '=', $question_id)
			 ->get(); 
			$commentcount = $qry5->count();
			
			$data='<div id="commentbox'.$query2->id.'"><div class="direct-chat-msg"><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-left" style="margin-left: 51px;">'.$qry4->name.'</span><span class="direct-chat-timestamp float-right">'.$query2->created_date.'</span></div><div class="direct-chat-text">'.$query2->comment.'</div></div></div>';
			$jsonData['last_commentid']=$users[0]->id;
			$jsonData['status']=202;
			$jsonData['data']=$data;
			$jsonData['commentcount']=$commentcount;
			echo json_encode($jsonData); 
		}
		 
	}
	
	
	
	
	
	
	
	  
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}





