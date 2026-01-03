<?php
namespace App;
use DB;
use Session;
use Illuminate\Database\Eloquent\Model;

class Dashboard_model extends Model     
{
    public  static function insertannouncementModel($request){ 
		$announcement=$request->input('announcement'); 
		$data=array();
		$data['announcement']=$announcement;
		$query= DB::table('announcement')->insert($data);
		$id = DB::getPdo()->lastInsertId();
		return $id;
	}
	
	public static function fetchannuncementModel($request){
		$qry = DB::select('select * from announcement order by created_date desc');
		return $qry;
	}
	
	
	
	
	
}

