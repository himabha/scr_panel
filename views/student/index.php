<div>
<table>
	<tr>
		<th>S.No.</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Actions</th>
	</tr>
	<?php 
	foreach($this->data['students'] as $key => $student){
		?>
		<tr>
			<td><?= $key + 1 ?></td>
			<td><?= $student->firstname ?></td>
			<td><?= $student->lastname ?></td>
			<td>
				<span><a href="javascript:void();" id="edit">Edit</a></span>
				<span><a href="javascript:void();" id="delete">Delete</a></span>
			</td>
		</tr>
		<?php
	}?>
</table>
</div>