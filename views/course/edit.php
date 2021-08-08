<?php ?>
<div class="form-group">
<form action="/courses/save" id="edit_course" method="post">
<input type="hidden" name="course_id" value="<?=$this->data['course']->id?>">
	<div class="field-group">
		<label for="title">Course Name:</label>
		<input type="text" name="title" value="<?=$this->data['course']->course_name?>" required />
	</div>
	<div class="field-group">
		<label for="detail">Course Detail:</label>
		<textarea name="detail" required /><?=$this->data['course']->detail?></textarea>
	</div>
	<div class="field-group">
		<input type="submit" name="submit"/>
	</div>
</form>
</div>