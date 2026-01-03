<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\Slider;
use App\Exports\EnquiryExport;
use App\File;
use App\TypeMaster;
use Hash;
use File as Fileorg;
use DB;

class AdminHomeController extends AdminController
{
	public function __construct()
    {
        parent::__construct();
        $this->user = new User;
        $this->slider = new Slider;
        $this->file = new File;
        $this->typeMaster = new TypeMaster;
        //$this->circular = new Circular;
        //$this->menu = new Menu;
        //$this->college = new College;
        //$this->cms = new Cms;
        //$this->research = new Research;
        //$this->collegeMasterMenu = new CollegeMasterMenu;
        //$this->collegeMasterCms = new CollegeMasterCms;
        //$this->extensionEducation = new ExtensionEducation;
    }

    public function testing()
    {
        $anandCampus = Menu::where('parent_id',351)->get();
        foreach($anandCampus as $key => $value) {        
            $checkExistOrNotExtEdu = $this->extensionEducation->findExtensionEducationUsingName($value->name);
            if (is_null($checkExistOrNotExtEdu)) {
                $input = [];
                $input['user_id'] = 1;
                $input['name'] = $value->name;
                $input['extension_education_campus_id'] = 1;
                $input['about'] = $value->description;
                $extEdu = $this->extensionEducation->addExtensionEducation($input);

                $uinput = [];
                $uinput['extension_education_id'] = $extEdu->id;
                $uinput['name'] = $extEdu->name;
                $uinput['password'] = Hash::make(123456);
                $uinput['type'] = 4;
                $this->user->addUser($uinput);
            }
        }

        $offCampus = Menu::where('parent_id',352)->get();
        foreach($offCampus as $key => $value) {
            $checkExistOrNotExtEdu = $this->extensionEducation->findExtensionEducationUsingName($value->name);

            if (is_null($checkExistOrNotExtEdu)) {
                $input = [];
                $input['user_id'] = 1;
                $input['name'] = $value->name;
                $input['extension_education_campus_id'] = 2;
                $input['about'] = $value->description;
                $extEdu = $this->extensionEducation->addExtensionEducation($input);

                $uinput = [];
                $uinput['extension_education_id'] = $extEdu->id;
                $uinput['name'] = $extEdu->name;
                $uinput['password'] = Hash::make(123456);
                $uinput['type'] = 4;
                $this->user->addUser($uinput);
            }
        }
        // dd('done');
        // $education = $this->menu->getMenuWithSlug('education');

        // foreach ($education->childData() as $key => $value) {
        //     foreach ($value->childData() as $skey => $svalue) {
        //         $this->cms->deleteCmsUsingMenuId($svalue->id);
        //     }
        //     $this->cms->deleteCmsUsingMenuId($value->id);
        // }

        // foreach ($education->childData() as $key => $value) {
        //     foreach ($value->childData() as $skey => $svalue) {
        //         $this->menu->deleteMenu($svalue->id);
        //     }
        //     $this->menu->deleteMenu($value->id);
        // }

        // $research = $this->menu->getMenuWithSlug('research');
        
        // foreach ($research->childData() as $key => $value) {
        //     foreach ($value->childData() as $skey => $svalue) {
        //         $this->cms->deleteCmsUsingMenuId($svalue->id);
        //     }
        //     $this->cms->deleteCmsUsingMenuId($value->id);
        // }

        // foreach ($research->childData() as $key => $value) {
        //     foreach ($value->childData() as $skey => $svalue) {
        //         $this->menu->deleteMenu($svalue->id);
        //     }
        //     $this->menu->deleteMenu($value->id);
        // }

        // $college = $this->college->getCollegeFront();

        // foreach ($college as $key => $value) {
        //     $checkMenuExistOrNot = $this->collegeMasterMenu->getMenuUsingNameAndCollegeId('Photo Gallery',$value->id);
        //     if (is_null($checkMenuExistOrNot)) {
        //         $minput = [];
        //         $minput['college_id'] = $value->id;
        //         $minput['name'] = 'Photo Gallery';
        //         $minput['slug'] = 'photo-gallery';
        //         $minput['page_type'] = 0;
        //         $minput['status'] = 0;

        //         $collegeMasterMenu = $this->collegeMasterMenu->addMenu($minput);

        //         $checkCmsExistOrNot = $this->collegeMasterCms->getCmsUsingTypeAndCldId(2,$value->college_id);

        //         if (is_null($checkCmsExistOrNot)) {
        //             $cinput = [];
        //             $cinput['menu_id'] = $collegeMasterMenu->id;
        //             $this->collegeMasterCms->updateCollegeMasterCmsUsingClgId($value->id, $cinput);
        //         }
        //     }
        // }
        // $anandCampus = Menu::where('parent_id',33)->get();
        // foreach($anandCampus as $key => $value) {
        //     $checkExistOrNotResearch = $this->research->findResearchUsingName($value->name);
        //     if (is_null($checkExistOrNotResearch)) {
        //         $input = [];
        //         $input['user_id'] = 1;
        //         $input['name'] = $value->name;
        //         $input['campus_id'] = 1;
        //         $input['about'] = $value->description;
        //         $research = $this->research->addResearch($input);

        //         $uinput = [];
        //         $uinput['research_id'] = $research->id;
        //         $uinput['name'] = $research->name;
        //         $uinput['password'] = Hash::make(123456);
        //         $uinput['type'] = 3;
        //         $this->user->addUser($uinput);
        //     }
        // }

        // $offCampus = Menu::where('parent_id',34)->get();
        // foreach($offCampus as $key => $value) {
        //     $checkExistOrNotResearch = $this->research->findResearchUsingName($value->name);

        //     if (is_null($checkExistOrNotResearch)) {
        //         $input = [];
        //         $input['user_id'] = 1;
        //         $input['name'] = $value->name;
        //         $input['campus_id'] = 2;
        //         $input['about'] = $value->description;
        //         $research = $this->research->addResearch($input);

        //         $uinput = [];
        //         $uinput['research_id'] = $research->id;
        //         $uinput['name'] = $research->name;
        //         $uinput['password'] = Hash::make(123456);
        //         $uinput['type'] = 3;
        //         $this->user->addUser($uinput);
        //     }
        // }
    }

    public function home()
    {
		$totalUser = $this->user->getTotalUserCount();
    	$totalFile = $this->file->getTotalFileCount();
		$totalSlider = $this->slider->getTotalSliderCount();
    	$totalTypeMaster = $this->typeMaster->getTotalTypeMasterCount();
		$enquiry = DB::select('select * from ask_questions'); 
		return view('admin.home',compact('totalUser','totalSlider','totalFile','totalTypeMaster','enquiry'));
    }

    public function pageNotFound()
    { 
	  
        return view('admin.pageNotFound');
    }
   
   
    public function ckFile(Request $request)
    {
        \Log::info($request->all());
        $upload_dir = array(
            'img'=> '/upload/ckfiles/',
        );

        $imgset = array(
            // 'maxsize' => 2000,    
            // 'maxwidth' => 900,    
            // 'maxheight' => 800,    
            'minwidth' => 10,       
            'minheight' => 10,
            'type' => array('bmp', 'gif', 'jpg', 'jpeg', 'png'),
        );

        // If 0, will OVERWRITE the existing file
        define('RENAME_F', 1);

        $re = '';
        if(isset($_FILES['upload']) && strlen($_FILES['upload']['name']) >1) {
            define('F_NAME', preg_replace('/\.(.+?)$/i', '', basename($_FILES['upload']['name'])));  //get filename without extension

            // get protocol and host name to send the absolute image path to CKEditor    
            $site = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['HTTP_HOST'].'/';
			
            $sepext = explode('.', strtolower($_FILES['upload']['name']));
            $type = end($sepext);    // gets extension
            $upload_dir = in_array($type, $imgset['type']) ? $upload_dir['img'] : $upload_dir['audio'];
            $upload_dir = trim($upload_dir, '/') .'/';

            //checkings for image or audio
            if(in_array($type, $imgset['type'])){
                // list($width, $height) = getimagesize($_FILES['upload']['tmp_name']);  // image width and height
                if(isset($width) && isset($height)) {
                    if($width > $imgset['maxwidth'] || $height > $imgset['maxheight']) $re .= '\\n Width x Height = '. $width .' x '. $height .' \\n The maximum Width x Height must be: '. $imgset['maxwidth']. ' x '. $imgset['maxheight'];
                    if($width < $imgset['minwidth'] || $height < $imgset['minheight']) $re .= '\\n Width x Height = '. $width .' x '. $height .'\\n The minimum Width x Height must be: '. $imgset['minwidth']. ' x '. $imgset['minheight'];
                    if($_FILES['upload']['size'] > $imgset['maxsize']*1000) $re .= '\\n Maximum file size must be: '. $imgset['maxsize']. ' KB.';
                }
            }
          
            else $re .= 'The file: '. $_FILES['upload']['name']. ' has not the allowed extension type.';

            //set filename; if file exists, and RENAME_F is 1, set "img_name_I"
            // $p = dir-path, $fn=filename to check, $ex=extension $i=index to rename
            function setFName($p, $fn, $ex, $i){
                if(RENAME_F ==1 && file_exists($p .$fn .$ex)) return setFName($p, F_NAME .'_'. ($i +1), $ex, ($i +1));
                else return $fn .$ex;
            }

            $f_name = setFName($_SERVER['DOCUMENT_ROOT'] .'/'. $upload_dir, F_NAME, ".$type", 0);
            $uploadpath = $_SERVER['DOCUMENT_ROOT'] .'/'. $upload_dir . $f_name;  // full file path

            // If no errors, upload the image, else, output the errors
            if($re == '') {
                // print_r($_FILES);exit;
                if(move_uploaded_file($_FILES['upload']['tmp_name'], $uploadpath)) {
                    $CKEditorFuncNum = $_GET['CKEditorFuncNum'];
                    $url = $site. $upload_dir . $f_name;
                    $msg = F_NAME .'.'. $type .' successfully uploaded: \\n- Size: '. number_format($_FILES['upload']['size']/1024, 2, '.', '') .' KB';
                    $re = in_array($type, $imgset['type']) ? "window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')"  //for img
                   : 'var cke_ob = window.parent.CKEDITOR; for(var ckid in cke_ob.instances) { if(cke_ob.instances[ckid].focusManager.hasFocus) break;} cke_ob.instances[ckid].insertHtml(\'<audio src="'. $url .'" controls></audio>\', \'unfiltered_html\'); alert("'. $msg .'"); var dialog = cke_ob.dialog.getCurrent();  dialog.hide();';
                }
                else $re = 'alert("Unable to upload the file")';
            }
            else $re = 'alert("'. $re .'")';
        }

        @header('Content-type: text/html; charset=utf-8');
        echo '<script>'. $re .';</script>';
    }
	
	
	public function downloadenquiry(Request $request)
    {
       $data=1;  
       return Excel::download(new EnquiryExport($data), 'Enquiry.xlsx'); 
    } 
	
	
	
}
