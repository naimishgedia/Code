<?php
namespace App\Http\Controllers\Admin; 
use Session;
use Illuminate\Http\Request;
use DB; 
use App\Http\Requests; 
use App\Http\Controllers\Admin\AdminController;
use Hash;
use App\User;
use App\ScrutinyAllocation;
use Yajra\DataTables\DataTables;
use App\SubjectMaster;
use App\FacultyMaster;
use App\UserPermission;
use App\Permission;



class UserController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
		$this->subject = new SubjectMaster;
		$this->userlist = new User;
		$this->scrutinyallocation = new ScrutinyAllocation;
		$this->faculty = new FacultyMaster;
		$this->userPermission = new UserPermission; 
		$this->permission = new Permission;
	}
	
	public function index(Request $request){
	   if ($request->ajax()){
			  $data = DB::table('users')            
				 ->where('user_type', '!=', 1)
				 ->get(); 
			   return Datatables::of($data)
					  ->addIndexColumn()
					  ->addColumn('name',function($row){
						return ''.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'';
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
					   ->addColumn('permission',function($row){
						return '<div class="btn-list flex-nowrap">
                              <a href="'.route('admin.user.permission.home',[$row->id]).'" class="btn">
                                Manage Permission
                              </a>
                            </div>';   
					  })
					 ->rawColumns(['name','email','edit','delete','permission'])
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
		
		if($input['user_type']==2){
		  $select_single=array(1,2); 
	    }else if($input['user_type']==3){
		  $select_single=array(3,4);
	    }else if($input['user_type']==4){
		  $select_single=array(5,6);
	    }else{
		  $select_single=array();
		}
		
		$request->validate([ 
			'first_name'=>'required',
			'middle_name'=>'required',
			'last_name'=>'required',
			'email'=>'required',
			'password'=>'required',
			'contact_no'=>'required', 
		]);
        $input = $request->except(['_token','_method']); 
		$password=$input['password'];
		$input['password']=Hash::make($password);
		$input['visible_password']=$password;
        $data=User::create($input);
		 
		//For Creating default permission
		$permission=array('user_id'=>$data->id,'select-single'=>$select_single);
		$this->userPermission->removePermissionWithUserId($permission['user_id']);
		if(!empty($permission['select-single']) && count($permission['select-single']) > 0){
			foreach ($permission['select-single'] as $key => $value) {
				$piinput = []; 
				$piinput['user_id'] = $permission['user_id'];
				$piinput['permission_id'] = $value;
				$this->userPermission->addUserPermission($piinput);
			}
		} 
			
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
		$request->validate([ 
			'first_name'=>'required',
			'middle_name'=>'required',
			'last_name'=>'required',
			'email'=>'required',
			'password'=>'required', 
			'contact_no'=>'required',
		]);
        $input = $request->except(['_token','_method']);
		$password=$input['password']; 
		$input['password']=Hash::make($password);
		$input['visible_password']=$password;
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
	 
	  
	   
	//Scrutiny Allocation Function starts  
	public function scrutinyallowcationFunction(Request $request){  
		if ($request->ajax()){
			   $data = DB::select('select sa.id as scrutiny_allocation_id,u.id as scrutiny_id,CONCAT(u.first_name,u.middle_name,u.last_name) as scrutiny_name,sm.name as subject_name,sm.id as subject_id,fm.name as faculty_name,fm.id as faculty_id from scrutiny_allocation sa,users u,subject_master sm,faculty_master fm where u.id=sa.scrutiny_id and sm.id=sa.subject_id and fm.id=sa.faculty_id and sa.deleted_at is NULL');  
			   return Datatables::of($data)
					  ->addIndexColumn()
					  ->addColumn('scrutiny_name',function($row){
						return $row->scrutiny_name;
					  })
					   ->addColumn('subject_name',function($row){
						return $row->subject_name;
					  })
					  ->addColumn('faculty_name',function($row){
						return $row->faculty_name; 
					  })
					 ->addColumn('edit',function($row){
						return '<a href="'.route('users.scrutinyedit',[$row->scrutiny_allocation_id]).'"><i class="fa fa-edit" style="font-size:25px;color:green"></i></a>'; 
					  }) 
					   ->addColumn('delete',function($row){
						return '<a href="'.route('users.scrutindestroy',[$row->scrutiny_allocation_id]).'"><i class="fa fa-trash-o" style="font-size:25px;color:red"></i></a>';   
					  })
					 ->rawColumns(['scrutiny_name','subject_name','faculty_name','edit','delete'])
					  ->make(true);
        } 
		$page_title="Scrutiny Allowcation";
		return view('admin.scrutinyallocation.index',compact('page_title'));  
	}
	 
	public function scrutinycreateFunction(Request $request)
    {
	 	$subjectList = $this->subject->subjectlist(); 
		$page_title="Scrutiny Allowcation";
		$facultylist = $this->faculty->datalist();	
		$scrutinylist = DB::Table('users')
				->select('id','first_name','last_name','middle_name')
				->where('user_type',2)
				->get(); 
		return view('admin.scrutinyallocation.create',compact('page_title','subjectList','facultylist','scrutinylist'));
    }
	
	public function scrutinystoreFunction(Request $request){
		$input = $request->all();
		$request->validate([ 
			'subject_id'=>'required',
			'faculty_id'=>'required',
			'scrutiny_id'=>'required',
		]);
        $input = $request->except(['_token','_method']); 
		ScrutinyAllocation::create($input);     
        Session::flash('successmsg', 'Scrutiny Allocated successfully');
        return redirect()->route('users.scrutinyallowcation'); 
	}
	
	public function scrutinyeditFunction($id)
    {
	    $ScrutinyAllocation = DB::table('scrutiny_allocation')->where('id', '=', $id)->first(); 
		$subjectList = $this->subject->subjectlist(); 
		$page_title="Scrutiny Allowcation";
		$facultylist = $this->faculty->datalist();	
		$scrutinylist = DB::Table('users')
				->select('id','first_name','last_name','middle_name')
				->where('user_type',2)
				->get(); 
        return view('admin.scrutinyallocation.edit', compact('page_title','ScrutinyAllocation','subjectList','facultylist','scrutinylist'));
    }
	
	public function scrutinyupdateFunction(Request $request){
		$input = $request->all();
		$scrutiny_allocation_id=$input['scrutiny_allocation_id'];
		$request->validate([ 
			'subject_id'=>'required',
			'faculty_id'=>'required',
			'scrutiny_id'=>'required',
		]);
        $input = $request->except(['_token','_method','scrutiny_allocation_id']);
		ScrutinyAllocation::where('id',$scrutiny_allocation_id)->update($input); 
		Session::flash('successmsg', 'Data updated successfully');
		return redirect()->route('users.scrutinyallowcation');
	} 
	 
	public function scrutindestroyFunction($id){
		ScrutinyAllocation::find($id)->delete();
		Session::flash('successmsg', 'Data deleted successfully');
	 	return redirect()->route('users.scrutinyallowcation');
	}

	public function managePermission($id,Request $request)
    {
		$page_title ="Permissions";
		$permission = $this->permission->getPermissionList();
		$userPermission = $this->userPermission->getUserPerUsingUserId($id);
		return view('admin.users.managePermission.index',compact('page_title','permission','id','userPermission'));
    }
	 
	public function managePermissionStore(Request $request)
    {
        $input = $request->all();
		$this->userPermission->removePermissionWithUserId($input['user_id']);
        if(!empty($input['select-single']) && count($input['select-single']) > 0){
            foreach ($input['select-single'] as $key => $value) {
                $piinput = [];
                $piinput['user_id'] = $input['user_id'];
                $piinput['permission_id'] = $value;
				$this->userPermission->addUserPermission($piinput);
            }
        }
		Session::flash('successmsg', 'Permission created successfully');
		return redirect()->back();        
    }
 	 
	
	  
}
