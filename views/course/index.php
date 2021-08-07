<div>
<table>
	<tr>
		<th>S.No.</th>
		<th>Course Detail</th>
		<th>Course </th>
		<th>Actions</th>
	</tr>
	<?php 
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
	}?>
</table>
</div>