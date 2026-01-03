<?php
namespace App\Http\Controllers\Admin; 
use Session;
use Illuminate\Http\Request;
use DB; 
use App\Http\Requests; 
use App\Http\Controllers\Admin\AdminController;
use Hash;
use App\User;
use Yajra\DataTables\DataTables;


class UserController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
		$this->userlist = new User;
	}
	
	public function index(Request $request){
	   if ($request->ajax()){
			  $data = DB::table('users')            
				 ->where('user_type', '!=', 1)
				 ->get(); 
			   return Datatables::of($data)
					  ->addIndexColumn()
					  ->addColumn('first_name',function($row){
						return $row->first_name;
					  })
					   ->addColumn('middle_name',function($row){
						return $row->middle_name;
					  })
					  ->addColumn('last_name',function($row){
						return $row->last_name; 
					  })
					  ->addColumn('email',function($row){
						return $row->email; 
					  })
					   ->addColumn('edit',function($row){
						return '<a href="'.route('users.edit',[$row->id]).'"><i class="fa fa-edit" style="font-size:25px;color:green"></i></a>'; 
					  })
					   ->addColumn('delete',function($row){
						return '<a class="remove-crud" data-id="'.$row->id.'" data-action="'.route('users.destroy',[$row->id]).'"><i class="fa fa-trash-o" style="font-size:25px;color:red"></i></a>';   
					  })
					 ->rawColumns(['first_name','middle_name','last_name','email','edit','delete'])
					  ->make(true);
        } 
		$page_title="Users";
		return view('admin.users.index',compact('page_title'));  
	}
	
	public function create()
    {
		$page_title="Users";
        return view('admin.users.create',compact('page_title'));
    }
	
	public function store(Request $request)
    {
        $input = $request->all();
		$password=$input['password'];
		$input['password']=Hash::make($password);
		$input['visible_password']=$password; 
		
		$request->validate([ 
			'first_name'=>'required',
			'middle_name'=>'required',
			'last_name'=>'required',
			'email'=>'required',
			'password'=>'required',
			'contact_no'=>'required',
		]);
        $input = $request->except(['_token','_method']); 
        User::create($input);     
        Session::flash('successmsg', 'User added successfully');
        return redirect()->route('users.index');  
    }
	
	public function edit(User $user)
    {
		$page_title="Degree";
        return view('admin.users.edit', compact('page_title','user'));
    }
	
	public function update(Request $request, $id)
    {
        $input = $request->all();
		$password=$input['password'];
		$input['password']=Hash::make($password);
		$input['visible_password']=$password; 
		
		$request->validate([ 
			'first_name'=>'required',
			'middle_name'=>'required',
			'last_name'=>'required',
			'email'=>'required',
			'password'=>'required',
			'contact_no'=>'required',
		]);
        $input = $request->except(['_token','_method']);
        User::where('id',$id)->update($input);
		Session::flash('successmsg', 'User updated successfully');
		return redirect()->route('users.index');
    }
	
	public function destroy($id)
    { 
		User::find($id)->delete();
		Session::flash('successmsg', 'Users deleted successfully');
		return redirect()->route('users.index');
    }
	 
	
	
}
