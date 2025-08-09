<?php
include 'connect.php';
$username1=isset($_POST['username']) ? $_POST['username'] : '';
$password1=isset($_POST['password']) ? $_POST['password'] : '';
$rememberMe=isset($_POST['rememberMe']) ? $_POST['rememberMe'] : '0';
$ip=$_SERVER['REMOTE_ADDR'];

$sql=mysqli_query($con, "SELECT * FROM net_signup WHERE username='$username1'") or die(mysqli_error());
if(mysqli_num_rows($sql)>0)
{
	while($R=mysqli_fetch_array($sql))
	{
		$UserName=$R['name'];
		$password2=$R['password'];
		$lastloginfail=$R['lastloginfail'];
		$numloginfail=$R['numloginfail'];
		$stat=$R['stat'];
	}
	if($stat==0)
	{
		if($numloginfail<=5)
		{
			if($password1==$password2)
			{
				mysqli_query($con, "UPDATE net_signup SET lastlogin='$edttm', numloginfail='0', ip='$ip' WHERE username='$username1'");
				session_start();
				session_unset();
				$_SESSION["UserName"]=$UserName;
				$_SESSION["username"]=$username1;
				$_SESSION["password"]=$password1;
				$_SESSION["lastlogin"]=$edttm;
				if($rememberMe=="1")
				{
					setcookie("RemCookieUser",$username1,(time()+604800));
					setcookie("RemCookiePass",md5($password1),(time()+604800));
				}
				header("Location: index.php");
			}
			else
			{
				$CurrentTime=date('d-m-Y h:i:s', strtotime('-5 minutes', strtotime($edttm)));
				if($lastloginfail>=$CurrentTime)
				{
					$numloginfail++;
					mysqli_query($con, "UPDATE net_signup SET lastloginfail='$edttm', numloginfail='$numloginfail' WHERE username='$username1'");
				}
				else
				{
					mysqli_query($con, "UPDATE net_signup SET lastloginfail='$edttm' WHERE username='$username1'");
				}
				//makeform($incorrectLogin);
				?><script>
				alert('Incorrect Login. . . ! ! !');
				</script><?php
				makeform("");
			}
		}
		else
		{
			$CurrentTime=date('d-m-Y h:i:s', strtotime('-30 minutes', strtotime($edttm)));
			if($lastloginfail<=$CurrentTime)
			{
				mysqli_query($con, "UPDATE net_signup SET numloginfail='5' WHERE username='$username1'");
				makeform($underAttackReLogin, "$username1",$cname);
			}
			else
			{
				echo '<br><br><br><br><center id="tblrecord">Under Attack Please Wait for 30 Minutes Untill Your Login will Unlocked. . . ! ! !</center>';
			}
		}
	}
	else
	{
		//makeform($accountNotActivated);
		?><script>
		alert('Your Account is not Activated Please Contact with your System Administrator. . . ! ! !');
		</script><?php
		makeform("");
	}
}
else
{
	if($username1=="")
	{
		makeform("");
	}
	else
	{
		//makeform($incorrectLogin);
		?><script>
		alert('Incorrect Login. . . ! ! !');
		</script><?php
		makeform("");
	}
}

function makeform($errormessage="", $username2 = "")
{
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
                    	<div class="col-md-6"><img src="../Theme/images/logo.png" alt="Image" class="img-fluid"></div>
                        <div class="col-md-6 contents">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="mb-4">
                                    	<h3>Sign In</h3>
                                    	<p class="mb-4"> Admin Panel Login </p>
                                    </div>
                                    <form name="LoginForm" id="LoginForm" method="post" action="login.php">
                                        <div class="form-group first">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" id="username" class="form-control" required>
                                        </div>
                                        <div class="form-group last mb-4">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" required>
                                        </div>
                                        <div class="d-flex mb-5 align-items-center">
                                            <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                                <input type="checkbox" checked="checked"/>
                                                <div class="control__indicator"></div>
                                            </label>
                                        	<span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
                                        </div>
                                    	<input type="submit" value="Log In" class="btn btn-block btn-primary">
                                    </form>
                                </div>
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
	<?php
}
?>