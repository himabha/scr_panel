<?php
 if($this->data['courses']):
	foreach($this->data['courses'] as $key => $course){
		?>
		<tr>
			<td><?= $key + 1 ?></td>
			<td><?= $course->course_name ?></td>
			<td><?= $course->detail ?></td>
			<td>
				<span><a href="javascript:void();" id="edit">Edit</a></span>
				<span><a href="javascript:void();" id="delete">Delete</a></span>
			</td>
		</tr>
		<?php
	}
else:
?>
	<tr><td colspan="4">No Data Found</td></tr>
<?php
endif;
?>