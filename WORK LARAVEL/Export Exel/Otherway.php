<?php
$data = json_decode(json_encode(DB::select('select e.name as Eventname,aq.name as Name,aq.phone as Phone,aq.city as City,aq.question1,aq.question2,aq.question3 from ask_questions aq,events e  where e.id=aq.event_id')), True);
		
        function cleanData(&$str)
        {
            if ($str == 't') $str = 'TRUE';
            if ($str == 'f') $str = 'FALSE';
            if (preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str) || preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$str)) {
                $str = " $str";
            }
            if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
        }

        $filename = "Enquiry.csv";
		header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: text/csv");
        $out = fopen("php://output", 'w');
        $flag = false;
        foreach ($data as $row) {
            if (!$flag) {
                // display field/column names as first row
                fputcsv($out, array_keys($row), ',', '"');
                $flag = true;
            }
            array_walk($row, __NAMESPACE__ . '\cleanData');
            fputcsv($out, array_values($row), ',', '"');
        }

        fclose($out);
		
		
//////////////////////////////

$data = //Your query;
$export='';
$export.= '
<table> 
<tr> 
<th> id </th>
<th>firstname</th> 
<th>lastname</th> 
<th>dob</th> 

</tr>
';
foreach($data as $newdata)
{
$export .= '<tr>
				 <td>'.$newdata->menu_id.'</td> 
				 <td>'.$newdata->menu_id.'</td> 
				 <td>'.$newdata->menu_id.'</td> 
				 <td>'.$newdata->menu_id.'</td> 
			 </tr>';
}
$export .= '</table>';
header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename=info.xls');
echo $export;
exit;