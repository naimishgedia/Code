<?php
https://stefanzweifel.io/posts/how-to-encrypt-file-uploads-with-laravel/


$questionfile_name = 'question'.$groupe_name.''.time().'.'.request()->question_file->getClientOriginalExtension();
$question_file = $request->file('question_file');
$Q_file_content = $question_file->get();
$Q_encryptedContent = encrypt($Q_file_content);
Storage::put('teacher_questions/'.$questionfile_name, $Q_encryptedContent); 



==========
//Download the file
$encryptedContent = Storage::get('teacher_questions/'.$qry->question_file);
		$decryptedContent = decrypt($encryptedContent);
		$qry2=DB::update('update groups set que_download = ? where id = ?',['1',$group_id]);
		return response()->streamDownload(function() use ($decryptedContent) {
			echo $decryptedContent;
		},$qry->question_file);
?>