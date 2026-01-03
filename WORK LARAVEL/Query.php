<?php
=========================================================================================================================
//SELECT
$data = UserModel::all(); 
$data = UserModel::find($id);
$CheckFriend = FriendsModel::where('from_id', auth()->user()->id)->where('to_id', $input['search_user'])->get(); //Selelct Data

//INSERT
BlogModel::create($input);

//DELETE
UserModel::find($id)->delete(); //delete 
$DeleteData=FriendsModel::where('from_id', auth()->user()->id)->where('to_id', $request->input('to_id'))->delete();

//UPDATE
UserModel::where('id',$id)->update($input);//update
$AcceptFriend_Req=FriendsModel::where('from_id',$request->input('from_id'))->where('to_id', auth()->user()->id)->update($input);

 //blade file ma Model use krva mate
@php
use App\Models\SliderModel; 
$SliderData = SliderModel::all(); 
@endphp
 
=========================================INSERT===============================================================================
$query= DB::table('register')->insert($data);  
DB::insert('insert into chat_message (to_user_id, from_user_id, chat_message, status, is_type) values (?, ?, ?, ? ,?)', ['0', $input['adminid'], $input['admin_chat_message'], '1','2']);  
  

========================================SELECT=================================================================================
'strict' => false, in database.php to use this query

$qry = DB::select("select * from register"); 
$qry = DB::table('signup')            
		  ->where('email', '=', $email)
		  ->where('password', '=', $password)
		  ->get();  
		  ->first();  
		  ->limit(10) or ->take(10)  // to get limited records
		  ->skip(10) // skip 10 records
		  ->groupBy('groupe_key') 
		  ->WhereNull('deleted_at') 
		  ->select('first_name','middle_name') //Select Perticular column
		  ->orderBy('created_at', 'desc/asc')

$FcmUsers = DB::table('users')
				->skip(1000)  // Skip the first 1000 records
				->take(1000)  // Take the next 1000 records
				->get();  
   
$TotalAmountPaid = DB::table('payment_detail')->where('status', '=', 2)->sum('amount'); //to get sum of perticular column
 
$count = $qry->count();	//get count
$result = $qry1->toArray(); //to get array
$id = DB::getPdo()->lastInsertId();//get last inserted id

//wherein and wherenotin
--> whereNotIn(Coulumn_name, $array); // perticular id sivai na record fetch krva mate 	
	$array=array();
	$array['id1']=$id;
	$array['id2']=$id2;
	$data = Menu::whereNotIn('parent_id',[2,17,104])->latest()->get(); //Jetla parent id ma 2,17,104 na hoy a badha fetch thase
	$data = Menu::whereIn('parent_id',$per)->latest()->get();  // need to pass array here $per

concat(u.first_name," ",u.middle_name," ", u.last_name) as student_name //CONCAT


======================================DELETE=================================================================================
$qry=DB::delete("delete from category where id = ?",[$id]); //single where
  
$query= DB::table('likes')								// multiple where
		->where('csrf_token', '=', $csrf_token)     
		->where('question_id', '=', $question_id)   
	    ->delete(); 
 

========================================UPDATE=================================================================================
$qry=DB::update("update category set category_name = ?,category_two=? where id = ?",[$category_name,$category_two,$id]);
		 
//with where conditions 
$qry=DB::table('cart')
	->where("_token", '=',  $request->session()->get('_token'))
	->where("product_id", '=',  $p_id)  
	->update(['que_on_option_a'=> $que_on_option_a,'que_on_option_b'=> $que_on_option_b,'que_on_option_c'=>$que_on_option_c,'que_on_option_d'=>$que_on_option_d]);  
  


========================================OTHER==================================================================================
//query inside query 
DB::select('select u.first_name,(select count(*) from exam_student es where es.user_id = u.id) as total_students from users u');

//query ni andar query as result
$MCQ = DB::select('select q.answer,q.per_question_marks,esqa.question_id,esqa.answer as student_answer, if(q.answer=esqa.answer,1,0) as result from exam_student_question_answer esqa,questions q where exam_student_id='.$exam_student_id.' and q.id=esqa.question_id and q.question_type=1');

//Multiple count from one query
$attended = DB::select('select sum(if(is_attend>0,1,0)) as total_attend,sum(if(is_attend=0,1,0)) as not_attend, count(*) as total_students from exam_student where company_id='.Session::get('company_id').'');  






?>