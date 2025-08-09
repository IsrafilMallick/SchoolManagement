<?php
include 'connect.php';
$tblnm='net_signup';
if(isset($_COOKIE["RemCookieUser"]) && isset($_COOKIE["RemCookiePass"]))
{
	$RemCookieUser=$_COOKIE["RemCookieUser"];
	$RemCookiePass=$_COOKIE["RemCookiePass"];
}

session_start();
$UserName=$_SESSION['UserName'];
$username=$_SESSION['username'];
$password=$_SESSION['password'];
$lastlogin=$_SESSION['lastlogin'];

$sql=mysqli_query($con, "SELECT * FROM $tblnm WHERE username='$username' AND password='$password'") or die(mysqli_error());
if(mysqli_num_rows($sql)>0)
{
	while($R=mysqli_fetch_array($sql))
	{
		$UserActualName=$R['name'];
		$userlevel=$R['userlevel'];
	}
	if($requirelevel==0&&$userlevel>0)
	{
		die("You need to be an admin for this page");
	}
	else
	if($userlevel<$requirelevel&&$userlevel>0)
	{
		die("Your acces level is not high enough for this page, <br> Your access level: $userlevel <br> Level required: $requirelevel");
	}
	else
	if($userlevel>$requirelevel&&$userlevel>=0)
	{
		die("You Cannot Access this Page!! Please Contact with your System Administrator.");
	}
}
else
{
	if($RemCookieUser!=""&&$RemCookiePass!="")
	{
		$sql=mysqli_query($con, "SELECT * FROM $tblnm WHERE username='$RemCookieUser'") or die(mysqli_error());
		if(mysqli_num_rows($sql)>0)
		{
			while($R=mysqli_fetch_array($sql))
			{
				$password=$R['password'];
				$userlevel=$R['userlevel'];
			}
			if(md5($password)==$RemCookiePass)
			{
				$_SESSION["password"]=$RemCookiePass;
				$_SESSION["username"]=$RemCookieUser;
				if($requirelevel==0&&$userlevel>0)
				{
					die("You need to be an admin for this page");
				}
				else
				if($userlevel<$requirelevel&&$userlevel>0)
				{
					die("Your acces level is not high enough for this page, <br> Your access level: $row[userlevel] <br> Level required: $reqlevel");
				}
				else
				if($userlevel>$requirelevel&&$userlevel>=0)
				{
					die("You Cannot Access this Page!! Please Contact with your System Administrator.");
				}
			}else{die(header("location:login.php"));}
		}else{die(header("location:login.php"));}
	}else{die(header("location:login.php"));}
}
$eby=htmlspecialchars($username,ENT_NOQUOTES);
$eby=str_replace('\"', "&quot;",$eby);
$eby=str_replace("\'", "&#039",$eby);

//get_value('main_drcr','sl',$srcval,$rtrnfild,'',$con)
?>