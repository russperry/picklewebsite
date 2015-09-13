<?php 

$for = $_POST['isfor'];
$type = $_POST['type'];
$string = $_POST['string'];

if ($type == 'url') { ?>

<div class="extrainputwrap" string="<?php echo $string; ?>">
	<label>
		<input type="text" name="<?php echo $for; ?>-url-<?php echo $string; ?>" placeholder="url">
		<div class="delete-field" string="<?php echo $string; ?>">x</div>
	</label>
</div>

<?php } else { ?>

<div class="extrainputwrap fileinputcontainer" string="<?php echo $string; ?>">
	<label>
		<div class="inputfilewrap">
			<div class="filesrc" string="<?php echo $string; ?>">No File Chosen</div>
			<div class="choose-file">Choose File</div>
			<input type="file" placeholder="url" name="<?php echo $for; ?>-file-<?php echo $string; ?>" string="<?php echo $string; ?>" value="<?php echo $file; ?>">
		</div>
	</label>
	<div class="delete-field" string="<?php echo $string; ?>">x</div>
</div>

<?php }; ?>