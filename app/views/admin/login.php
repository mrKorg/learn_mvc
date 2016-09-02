<?php
session_start();
if(isset($_POST["enter"])){
	$user = new Users();
	$login = trim($_POST["login"]);
	$password = trim($_POST["password"]);
	$result = $user->get_user($login, $password);
	if($result){
		$us = $_SESSION["id"];
		header("Location: /admin/");
	}
}
include_once "header.php";
?>
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">Log in</div>
					<div class="panel-body">
						<form role="form" method="post">
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="Login" name="login" type="text" autofocus="" required>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Password" name="password" type="password" value="" required>
								</div>
								<input type="submit" name="enter" class="btn btn-primary" value="Login">
							</fieldset>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
	</div>
<?php include_once "footer.php"; ?>
