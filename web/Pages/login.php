<?php
include_once dirname(__FILE__).'/../autoload.php';
include_once dirname(__FILE__).'/../Controller/AdminLoginController.php';

if(!empty($_SESSION['sessionId'])){
  $adminLoginControllerCheckSession = new AdminLoginController();
  $adminLoginControllerCheckSessionData = $adminLoginControllerCheckSession->checkLoggedIn($_SESSION['sessionId']);
  if($adminLoginControllerCheckSessionData){
		$url = 'index';
		redirectTo($url);
  }
}

$errorMessage = '';
if(!empty($_POST)){
  $_SESSION['sessionId'] = base64_encode(openssl_random_pseudo_bytes(64));
  $userName = isset($_POST['userName']) ? Sanitize::sanitizeData($_POST['userName']) : '';
  $password = isset($_POST['password']) ? Sanitize::sanitizeData($_POST['password']) : '';
  $sessionId = isset($_SESSION['sessionId']) ? $_SESSION['sessionId'] : '';
  $adminLoginController = new AdminLoginController();
  $adminLoginControllerData = $adminLoginController->loginData($userName, $sessionId, $password);
  if($adminLoginControllerData){
    if($adminLoginControllerData->errorCode == 200){
      $url = 'index';
      redirectTo($url);
    }else{
      $errorMessage = $adminLoginControllerData->message;

    }
  }
}
//echo $errorMessage;
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Theme/css_login/login/style_fonts_login.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../Theme/css_login/login/bootstrap_login.css">
    <!-- Style -->
    <link rel="stylesheet" href="../Theme/css_login/login/style_main_login.css">
    <title>Login</title>
    <style>
      .erroMessageClass {
        
             font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
             font-size: 1em;
             color : red;
      }
	  
	  
	  .imageBack{
			
			background-image: url('../Theme/images/Logo_SMPS.png');
			background-size: cover;
			opacity: 0.5;
	  }

    </style>
  </head>
  <body>
  <div class="content">
    <div class="container">
      <div class="row" >
        <div class="col-md-6">
          <img src="../Theme/images/Logo_SMPS.png" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">

            <div class="col-md-8" >
			
             
			 <div class="mb-4">
			   
				<h3>Sign In</h3>
				<p class="mb-4"> Admin Panel Login </p>
				</div>
            <form action="#" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="userName" name="userName">
              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div>
              <div class="erroMessageClass"> <?php echo $errorMessage;?></div>
              <input type="submit" value="Log In" class="btn btn-block btn-primary">
				</form>
			
          </div>
        </div>
      </div>
    </div>
  </div>
	<script src="../Theme/js_login/login/jquery-3.3.1.min.js"></script>
    <script src="../Theme/js_login/login/popper.min.js"></script>
    <script src="../Theme/js_login/login/bootstrap.min.js"></script>
    <script src="../Theme/js_login/login/main.js"></script>  
  </body>
</html>