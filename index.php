<?php
session_start();

require_once("captcha.php");

if(isset($_POST['rCaptcha'])) {
	echo captcha::image();
	exit;
}
else if(isset($_POST["code"])) {
	if($_POST["code"] == captcha::get_code()) {
		echo "Good";
	}
	else {
		echo "Bad";
	}

	echo "<br/>";
}

?>
<script>
function refreshCaptcha(target) {

    var req = new XMLHttpRequest();

    req.open("POST", window.location, true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	
    req.onreadystatechange = function() {
	    if(req.readyState == 4 && req.status == 200) {
			target.src = req.responseText;
	    }
    }

    req.send("rCaptcha=true");
}
</script>

<form method="post" autocomplete="off">
	<fieldset>
		<legend>PHP Captcha</legend>
		
		<input type="text" name="code" placeholder="Captcha Code" /><br/>
		<img src="<?= captcha::image() ?>" onclick="refreshCaptcha(this)" title="click to refresh" /><br/>
		<input type="submit" value="Check" /><br/>
	</fieldset>
</form>