<?php ?>
<input type="hidden" name="subscription_id" value="<?=isset($this->data['subscription']) ? $this->data['subscription']->id : ''?>">
<div class="field-group">
	<label for="detail">Student</label>
	<select name="student" required>
		<option value="">Select Student</option>
		<?php if($this->data['students']):
				foreach($this->data['students'] as $key => $student){
					?>
					<option value="<?=$student->id?>" <?=(isset($this->data['subscription']) && $this->data['subscription']->student_id === $student->id) ? 'selected' : ''?>><?= $student->firstname . $student->lastname?></option>
					<?php
				}
				endif;
		?>
	</select>
</div>
<div class="field-group">
	<label for="detail">Course</label>
	<select name="course" required>
		<option value="">Select Course</option>
		<?php if($this->data['courses']):
				foreach($this->data['courses'] as $key => $course){
					?>
					<option value="<?=$course->id?>" <?=(isset($this->data['subscription']) && $this->data['subscription']->course_id === $course->id) ? 'selected' : ''?>><?= $course->course_name?></option>
					<?php
				}
				endif;
		?>
	</select>
</div>
