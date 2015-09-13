<?php 

$step = substr($_POST['step'], -1);
$_POST['step'];
?>

<?php if ($step == 1) { ?>




<?php
return;
} else if ($step == 2) { ?>
echo $_POST['step']; ?>
<?php echo do_shortcode(get_post_meta(get_the_ID(), 'free_request_pt2_shortcode', 1)); ?>

<form>
	<h2>Step Two: About The Company</h2>
	<label>
		<span>Company Name:</span>
		<input type="text">
	</label>
	<label>
		<span>Company Website:</span>
		<input type="text">
	</label>
	<div class="file-upload-wrap">
		<span>Company Logo:</span>
		<div class="request-button-wrap">
			<a class="add-url button-black-outline" isfor="logo" href="#">Add Url</a>
			<a class="add-file button-black-outline" isfor="logo" href="#">Add File</a>
		</div>
	</div>
	<div class="file-upload-wrap">
		<span>Key Brand Assets:</span>
		<div class="request-button-wrap">
			<a class="add-url button-black-outline" isfor="brandassets" href="#">Add Url</a>
			<a class="add-file button-black-outline" isfor="brandassets" href="#">Add File</a>
		</div>
	</div>
	<input type="submit" class="button-green-fill" gotostep="3" value="Go To The Final Step">
</form>

<?php
return;
} else if ($step == 3) { ?>

<form>
	<h2>Step Three: About The Request</h2>
	<label>
		<span>What kind of request is this?</span>
		<select placeholder="Please Choose">
			<option value="" disabled selected>Select your option</option>
			<option>Option 1</option>
			<option>Option 1</option>
			<option>Option 1</option>
			<option>Option 1</option>
			<option>Option 1</option>
		</select>
	</label>
	<label>
		<span>What Do You Need?:</span>
		<textarea></textarea>
	</label>
	<label>
		<span>What Text Should The Request Contain:</span>
		<textarea></textarea>
	</label>
	<label class="dimensions">
		<span>Dimensions:</span>
		<input type="text" class="dimension" placeholder="Width">
		<input type="text" class="dimension" placeholder="Height">
		<div class="dimensioncross">x</div>
	</label>
	<div class="file-upload-wrap">
		<span>Inspiration:</span>
		<div class="request-button-wrap">
			<a class="add-url button-black-outline" isfor="inspiration" href="#">Add Url</a>
			<a class="add-file button-black-outline" isfor="inspiration" href="#">Add File</a>
		</div>
	</div>

	<div class="file-upload-wrap">
		<span>Anti-inspiration:</span>
		<div class="request-button-wrap">
			<a class="add-url button-black-outline" isfor="anti-inspiration" href="#">Add Url</a>
			<a class="add-file button-black-outline" isfor="anti-inspiration" href="#">Add File</a>
		</div>
	</div>
	<input type="submit" class="button-green-fill" gotostep="confirmation" value="Submit Request">
</form>
<?php 
return;
} else if ($step == 'confirmation') { ?>
	<h2>Thank you!</h2>
	<p>We've received your request. You'll hear from us shortly!</p>
<?php
return;
} else { ?>
	<h2>Uh Oh!</h2>
	<p>It looks like something went wrong.</p>
<?php
return;
} ?>
