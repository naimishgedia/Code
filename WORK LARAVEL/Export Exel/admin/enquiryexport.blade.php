<table>
    <thead>
    <tr>
        <th>Sr No</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th> 
        <th>City</th>
        <th>Question 1</th>
        <th>Question 2</th>
        <th>Question 3</th>
    </tr>
    </thead>
	<tbody>
			<?php
			$i=1;
			?>
			@foreach($data as $newdata)
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $newdata->name; ?></td>
                <td><?php echo $newdata->phone; ?></td>
                <td><?php echo $newdata->email; ?></td>
                <td><?php echo $newdata->city; ?></td>
                <td><?php echo $newdata->question1; ?></td>
                <td><?php echo $newdata->question2; ?></td>
                <td><?php echo $newdata->question3; ?></td>
            </tr>
			@endforeach
       
        
    </tbody>
</table>
<?php //exit; ?>