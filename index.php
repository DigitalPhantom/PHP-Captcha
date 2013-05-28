<?php

require_once("captcha.php");


if(isset($_POST["code"])) {
	if($_POST["code"] == captcha::get_code()) {
		echo "Good";
	}
	else {
		echo "Bad";
	}

	echo "<br/>";
}

?>
<form method="post">
	<input type="text" name="code" />
	<img src="<?= captcha::image() ?>" />
	<input type="submit" value="Check" />
</form>