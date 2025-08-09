<?php
//include 'SimpleImage.php';
function CheckInputData($data) 
{
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}

function get_value($table,$srcfild,$srcval,$rtrnfild,$morecond,$con)
{
	$rtrnval="";
	$sql=mysqli_query($con,"SELECT $rtrnfild FROM $table WHERE $srcfild='$srcval' $morecond");
	while($R=mysqli_fetch_array($sql))
	{
		$rtrnval=$R[$rtrnfild];
	}
	return $rtrnval;
	/*
	if($rtrnval=="")
	{
		return 'NA';
	}
	else
	{
		return $rtrnval;
	}
	*/
}

function EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con)
{
	$LOG=mysqli_query($con,"INSERT INTO main_edt_log(tblnm, tblsl, ufnm, fldnm, old_val, new_val, rdt, rdttm, rby, edt, edttm, eby) VALUES('$tblnm', '$tblsl', '$ufnm', '$fldnm', '$old_val', '$new_val', '$edt', '$edttm', '$eby', '$edt', '$edttm', '$eby')")or die (mysqli_error());
}

function shortform($val)
{	
	if($val!="")
	{
		$words = explode(" ",$val);
		$acronym = "";
		
		foreach ($words as $w) {
		  $acronym .= strtoupper($w[0]);
		}
		return $acronym;
	}
}

function sendSMS($user,$key,$mobile,$message,$senderid,$accusage)
{
	$message=urlencode($message);
	$msgurl="http://103.233.79.246/submitsms.jsp?";
	$postdata="user=$user&key=$key&mobile=$mobile&message=$message&senderid=$senderid&accusage=$accusage";
	$ch=curl_init($msgurl.$postdata);	if(curl_errno($ch)){echo 'curl error : '. curl_error($ch);}
	$ret=curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	if (empty($ret)){die(curl_error($ch));}else{$info=curl_getinfo($ch);}
	$curlresponse=curl_exec($ch);
	curl_close($ch);
}

function photo_upload($file_nm,$file_size,$target_path,$width,$height)
{
	$response='';
	$allowedExts = array("gif", "jpeg", "jpg", "JPG", "png");
	$temp = explode(".", $_FILES[$file_nm]["name"]);
	$extension = end($temp);
	if ((($_FILES[$file_nm]["type"] == "image/gif")
	|| ($_FILES[$file_nm]["type"] == "image/jpeg")
	|| ($_FILES[$file_nm]["type"] == "image/jpg")
	|| ($_FILES[$file_nm]["type"] == "image/pjpeg")
	|| ($_FILES[$file_nm]["type"] == "image/x-png")
	|| ($_FILES[$file_nm]["type"] == "image/png"))
	&& ($_FILES[$file_nm]["size"] < $file_size)
	&& in_array($extension, $allowedExts))
	{
		if ($_FILES[$file_nm]["error"] > 0)
		{
			$response="Return Code: " . $_FILES[$file_nm]["error"] . "<br>";
		}
		else
		{
			$response=move_uploaded_file($_FILES[$file_nm]["tmp_name"],$target_path);
			if($width!=""&&$width!="")
			{
				$image=new SimpleImage();
				$image->load($target_path);
				$image->resize($width,$height);
				$image->save($target_path);
				$er2="Picture Upload Successfully.";
			}
		}
	}
	else
	{
		$er2="Invalid Profile Picture";
	}
	return $response;
}

function generateOTP($length,$strength) 
{
	/*
    $vowels = 'AEIOUYaeiouy0123456789@#$%';
    $consonants = 'BCDFGHJKLMNPQRSTVWXZbcdfghjklmnpqrstvwxz0123456789@#$%';
	*/
	$vowels='0123456789';
    $consonants='9876543210';
    $password='';
    $alt = time() % 2;
    for ($i = 0; $i < $length; $i++) 
    {
        if ($alt == 1) 
        {
            $password .= $consonants[(rand() % strlen($consonants))];
            $alt = 0;
        } 
        else 
        {
            $password .= $vowels[(rand() % strlen($vowels))];
            $alt = 1;
        }
    }
    return $password;
}

function DateToWord($date)
{
	$date_in_word = new Numbers_Words();
	$M=date('F',strtotime($date)); 
	$j=date('j',strtotime($date)); 
	$Y=date('Y',strtotime($date)); 
	$S=date('S',strtotime($date));
	
	return $j."</u><sup>".$S."</sup><u> ".$M.", ".$Y;
}

function get_drcr_rs($ldgr,$fdtt,$flag,$con)
{
	if($fdtt==""){$dt="WHERE paydt<'$fdtt'";}else{if($flag==0){$dt="WHERE paydt<='$fdtt'";}else{$dt="WHERE paydt<'$fdtt'";}}
	$sql=mysqli_query($con,"SELECT (SUM(IF(drldgr='$ldgr', amnt, 0)) - SUM(IF(crldgr='$ldgr', amnt, 0))) AS modbal  FROM main_drcr $dt");
	while($R=mysqli_fetch_array($sql))
	{
		$modbal=$R['modbal'];
	}

	if(is_null($modbal))
	{
		return 0;
	}
	else
	{
		return $modbal;
	}
	//return "SELECT (SUM(IF(drldgr='$ldgr', amnt, 0)) - SUM(IF(crldgr='$ldgr', amnt, 0))) AS modbal  FROM main_drcr $dt";
}

function NameCase($TextValue)
{
	return ucwords(strtolower($TextValue));
}
?>