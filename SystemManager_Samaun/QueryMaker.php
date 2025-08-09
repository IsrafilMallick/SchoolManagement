<?
$requirelevel=0;
include 'ActiveUsers.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wellcome to Query Maker</title>
</head>
<body>
<form name="frm1" id="frm1" method="post" action="QueryMakers.php" target="_blank">
<table border="1">
<tr>
	<td>Query Type : </td>
	<td>
    <select name="qtyp" id="qtyp">
    <option value="">--- Select ---</option>
    <option value="1">Receive</option>
    <option value="2">Fetch</option>
    <option value="3">Insert</option>
    <option value="4">Update</option>
    <option value="5">Delete</option>
    <option value="6">Search</option>
    <option value="7">Blank Check</option>
    <option value="8">Create Form</option>
    </select>
    </td>
	<td>Method : </td>
	<td>
    <select name="method" id="method">
    <option value="">--- Select ---</option>
    <option value="1">Post</option>
    <option value="2">Request</option>
    <option value="3">Get</option>
    </select>
    </td>  
	<td>Table Name : </td>
	<td><input type="text" name="tblnm" id="tblnm" value="" onclick="this.select();" /></td>
</tr>
<tr>
	<td colspan="6"><textarea name="fields" id="fields" style="width:99%; height:100px;" onclick="this.select();"></textarea></td>
</tr>
<tr>
	<td colspan="6" align="center"><input type="submit" name="submt" id="submt" value="Generate Query" /></td>
</tr>
</table>
</form>
</body>
</html>