<?php
 if($this->data['courses']):
	foreach($this->data['courses'] as $key => $course){
		?>
		<tr>
			<td><?= $key + 1 ?></td>
			<td><?= $course->course_name ?></td>
			<td><?= $course->detail ?></td>
			<td>
				<a href="/courses/edit/<?=$course->id?>" id="edit">Edit</a>
				<a href="/courses/delete/<?=$course->id?>" id="delete">Delete</a>
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