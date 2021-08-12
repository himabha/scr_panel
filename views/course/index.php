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
					<a href="/courses/add" class="button">Add Course</a>
			<input type="text" name="search" placeholder="Search..." class="filter-input" onkeyup="search(this, 'courses')">
		</div>
	</div>
	<div class="list_table row">
		<table>
			<thead>
			<tr>
				<th onclick="sort(this, 'id', 'courses')" data-order="1" class="active">S.No. <span class="material-icons sort">sort</span></th>
				<th onclick="sort(this, 'course_name', 'courses')" data-order="0">Course <span class="material-icons sort">sort</span></th>
				<th onclick="sort(this, 'detail', 'courses')" data-order="0">Course Detail <span class="material-icons sort">sort</span></th>
				<th>Actions</th>
			</tr>
			</thead>
			<tbody id="page">
				<?php require_once('records.php');?>
			</tbody>
		</table>
	</div>
	<div class="pagination">
		<?php if($this->data['courses']):?>
			<ul id="pagination"></ul>
		<?php endif;?>
	</div>
</div>