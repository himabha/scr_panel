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
			<a href="/students/add" class="button">Add Student</a>
			<input type="text" name="search" placeholder="Search..." class="filter-input" onkeyup="search(this, 'students')">
		</div>
	</div>
	<div class="list_table row">
		<table>
			<thead>
			<tr>
				<th onclick="sort(this, 'id', 'students')" data-order="1" class="active">S.No. <span class="material-icons sort">sort</span></th>
				<th onclick="sort(this, 'firstname', 'students')" data-order="0">First Name <span class="material-icons sort">sort</span></th>
				<th onclick="sort(this, 'lastname', 'students')" data-order="0">Last Name <span class="material-icons sort">sort</span></th>
				<th onclick="sort(this, 'email', 'students')" data-order="0">Email <span class="material-icons sort">sort</span></th>
				<th onclick="sort(this, 'dob', 'students')" data-order="0">DOB <span class="material-icons sort">sort</span></th>
				<th onclick="sort(this, 'contact_no', 'students')" data-order="0">Contact No. <span class="material-icons sort">sort</span></th>
				<th onclick="sort(this, 'active', 'students')" data-order="0">Status <span class="material-icons sort">sort</span></th>
				<th>Actions</th>
			</tr>
			</thead>
			<tbody id="page">
			<?php require_once('records.php');?>
			</tbody>
		</table>
	</div>
	<div class="pagination">
		<?php if($this->data['students']):?>
			<ul id="pagination"></ul>
		<?php endif;?>
		</div>
</div>