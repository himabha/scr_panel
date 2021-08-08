<?php ?>
<div class="form-group">
<form action="/courses/save" id="add_course" method="post">
	<div class="field-group">
		<label for="title">Course Name:</label>
		<input type="text" name="title" required />
	</div>
	<div class="field-group">
		<label for="detail">Course Detail:</label>
		<textarea name="detail" required /></textarea>
	</div>
	<div class="field-group">
		<input type="submit" name="submit"/>
	</div>
</form>
</div>