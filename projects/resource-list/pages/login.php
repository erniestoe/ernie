<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


?>

<section class="login">
	<inner-column>
		<?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>

		<form method="POST">
			<input type="hidden" name="form_type" value="login">
			<label>Username:</label>
			<input type="text" id="username" name="username" required>

			<label>Password:</label>
			<input type="password" id="password" name="password" required>

			<button type="submit">Login</button>
		</form>

		<?php
		print_r($_SESSION);
		print_r($_POST);
		print_r($_GET); 
		var_dump($_SESSION); ?>
	</inner-column>
</section>