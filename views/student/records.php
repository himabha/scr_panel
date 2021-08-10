<?php if($this->data['students']):
	foreach($this->data['students'] as $key => $student){
		?>
		<tr>
			<td><?= $key + 1 ?></td>
			<td><?= $student->firstname ?></td>
			<td><?= $student->lastname ?></td>
			<td><?= $student->email ?></td>
			<td><?= $student->dob ?></td>
			<td><?= $student->contact_no ?></td>
			<td><?= ($student->active) ? 'Active': 'In-active' ?></td>
			<td>
				<a href="/students/edit/<?=$student->id?>" id="edit"><span class="material-icons">
mode_edit</span></a>
				<a href="/students/delete/<?=$student->id?>" id="delete"><span class="material-icons">
delete</span></a>
			</td>
		</tr>
		<?php
	}
else:
?>
	<tr><td colspan="7">No Data Found</td></tr>
<?php
endif;
?>