<div class="records">
	<div class="control_panel row">
		<div class="left-side">
			<select id="pagelimit" class="filter-input" onchange="onPageLimitSelect();">
				<option value="5">5</option>
				<option value="10">10</option>
				<option value="15">15</option>
				<option value="20">20</option>
			</select>
		</div>
		<div class="right-side">
			<a href="/subscriptions/subscribe" class="button">Subscribe Student</a>
			<input type="text" name="search" placeholder="Search..." class="filter-input" onblur="search(this, 'subscriptions')">
		</div>
	</div>
	<div class="list_table row">
		<table>
			<thead>
			<tr>
				<th>S.No.</th>
				<th>Student</th>
				<th>Course</th>
				<th>Actions</th>
			</tr>
			</thead>
			<tbody id="page">
				<?php require_once('records.php');?>
			</tbody>
		</table>
	</div>
	<div class="pagination row">
		<?php if($this->data['subscriptions']):?>
			<ul id="pagination"></ul>
		<?php endif;?>
	</div>
</div>