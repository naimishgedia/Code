<?
Yajra datatables
-composer require yajra/laravel-datatables-oracle:"~9.0"
-this will create few lines in composer.json

use Yajra\DataTables\DataTables; //include this in controller

//controller
public function index(Request $request){
	   if ($request->ajax()){
			  $data = DB::table('users')            
				 ->where('user_type', '=', 2)
				 ->get(); 
			   return Datatables::of($data)
					  ->addIndexColumn()
					  ->addColumn('first_name',function($row){
						return $row->first_name;
					  })
					  ->addColumn('last_name',function($row){
						return $row->last_name; 
					  })
					 ->rawColumns(['first_name','last_name'])
					  ->make(true);
        } 
		$page_title="Users";
		return view('admin.users.index',compact('page_title'));  
	}


//js
$(function () {
	var table = $('.data-table').DataTable({        
		processing: true,
		serverSide: true,
		ajax: "{{ route('users.index') }}",
		columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},
			{data: 'first_name', name: 'first_name'},
			{data: 'last_name', name: 'last_name'},
		]
	});
});