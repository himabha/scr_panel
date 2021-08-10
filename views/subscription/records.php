<?php
 if($this->data['subscriptions']):
	foreach($this->data['subscriptions'] as $key => $subscription){
		?>
		<tr>
			<td><?= $key + 1 ?></td>			
			<td><?= $subscription->fullname ?></td>
			<td><?= $subscription->course_name ?></td>
			<td>
				<a href="/subscriptions/edit/<?=$subscription->id?>" id="edit">Edit</a>
				<a href="/subscriptions/delete/<?=$subscription->id?>" id="delete">Delete</a>
			</td>
		</tr>
		<?php
	}
else:
?>
	<tr><td colspan="3">No Data Found</td></tr>
<?php
endif;
?>