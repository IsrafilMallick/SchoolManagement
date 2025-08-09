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
		makeform('','',$cname);
	}
}
else
{
	if($username1=="")
	{
		makeform('','',$cname);
	}
	else
	{
		//makeform($incorrectLogin);
		?><script>
		alert('Incorrect Login. . . ! ! !');
		</script><?php
		makeform('','',$cname);
	}
}

function makeform($errormessage="", $username2 = "",$cname)
{
	?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Wellcome to <?=$cname?></title>
    	<link rel="icon" href="pic/logo.png" width="5" height="7" >
		<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/mystyle.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/loginstyle.css">
    </head>
    <body>
    <div class="pen-title"><h1>Login to <?=$cname?></h1></div>
    <div class="module form-module">
        <div class="toggle">
            <i class="fa fa-times fa-pencil"></i>
            <div class="tooltip">Click Me</div>
        </div>
        <div class="form">
            <h2>Login to your account</h2>
            <form name="LoginForm" id="LoginForm" method="post" action="login.php">
            <input type="text" name="username" id="username" placeholder="Enter Your User Name" required>
            <input type="password" name="password" id="password" placeholder="Enter Your Password" required>
            <!--<input type="checkbox" name="rememberMe" id="rememberMe" value="1"> Remember Me-->
            <button type="submit" name="Loginbtn" id="Loginbtn">Login</button>
            </form>
        </div>
        <div class="form">
            <h2>Create an account</h2>
            <form>
            <input type="text" placeholder="Username"/>
            <input type="password" placeholder="Password"/>
            <input type="email" placeholder="Email Address"/>
            <input type="tel" placeholder="Phone Number"/>
            <button>Register</button>
            </form>
        </div>
      <div class="cta">Design & Developed by <a href="../"><b>Netsoft Infotech</b></a></div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/nsilink.js"></script>
    <script src="assets/js/index.js"></script>
    </body>
    </html>
	<?php
}
?>