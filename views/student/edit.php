<?php ?>
<div class="control_panel row">
	<div class="left-side">
	</div>
	<div class="right-side">
		<a href="/students" class="button">List Students</a>
	</div>
</div>
<div class="form-group">
<form action="/students/save" id="edit_student" method="post">
	<input type="hidden" name="student_id" value="<?=$this->data['student']->id?>">
	<div class="field-group">
		<label for="title">First Name:</label>
		<input type="text" name="firstname" value="<?=$this->data['student']->firstname?>" required />
	</div>
	<div class="field-group">
		<label for="detail">Last Name:</label>
		<input type="text" name="lastname" value="<?=$this->data['student']->lastname?>" required />
	</div>
	<div class="field-group">
		<label for="detail">Email:</label>
		<input type="email" name="email" value="<?=$this->data['student']->email?>" required />
	</div>
	<div class="field-group">
		<label for="detail">DOB:</label>
		<input type="date" name="dob" value="<?=$this->data['student']->dob?>" required value="" min="1970-01-01" max="2030-12-31"/>
	</div>
	<div class="field-group">
		<label for="detail">Contact No.:</label>
		<input type="text" name="contact_no" value="<?=$this->data['student']->contact_no?>" required />
	</div>
	<div class="field-group">
		<label for="detail">Status:</label>
		<select name="status" required>
			<option value="">Select Status</option>
			<option value="1" <?= ($this->data['student']->active) ? 'selected': ''?>>Active</option>
			<option value="0" <?= (!$this->data['student']->active) ? 'selected': ''?>>In-Active</option>
		</select>
	</div>
	<div class="field-group">
		<input type="submit" name="submit"/>
	</div>
</form>
</div>