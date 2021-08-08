<div class="records">

<div class="control_panel">
	<div class="left-side">
		<select id="pagelimit" onchange="onPageLimitSelect();">
			<option value="5">5</option>
			<option value="10">10</option>
			<option value="15">15</option>
			<option value="20">20</option>
		</select>
	</div>
	<div class="right-side">
		<input type="text" name="search" onblur="search(this, 'courses')">
	</div>
</div>
<table>
	<thead>
	<tr>
		<th>S.No.</th>
		<th>Course</th>
		<th>Course Detail</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody id="page">
		<?php require_once('records.php');?>
	</tbody>
</table>
<?php if($this->data['courses']):?>
	<div id="pagination"></div>
<?php endif;?>
</div>