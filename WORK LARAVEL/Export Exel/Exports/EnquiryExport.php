<?php

namespace App\Exports;

use App\Exam;
use Illuminate\Contracts\View\View; 
use Maatwebsite\Excel\Concerns\FromView; 
use Illuminate\Http\Request;

class EnquiryExport implements FromView
{
	
	protected $data;// aa data view file mathi pass krvano

    public function __construct($data) 
    {
        $this->data = $data;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
	    return view('admin.enquiryexport', [
            'data' => $this->data
        ]);
    }
	
	
	
}
