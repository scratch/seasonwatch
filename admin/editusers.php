<?php 
include '../includes/dbc.php';
?>
<head>
<title>Edit User Page</title>
</head>
<body>
<link rel="stylesheet" href="../css/styles_new.css" type="text/css"></link>
<div class="container first_image" style="-moz-border-radius-bottomleft: 10px; -moz-border-radius-bottomright: 10px;">
<table>
<tbody>
<tr>
<td/>
</tr>
</tbody>
</table>
<div>
<hr/>
</div>

<?php
$userID = $_GET['userid'];
//echo $userID; 
$users_details = mysql_query("SELECT * FROM users Where user_id='$userID'"); 
//print_r(mysql_fetch_array($tree_details));
$one_user_detail = mysql_fetch_array($users_details);
?>



<table style="width: 600px;">
<tbody>
<tr>
<td class="cms" style="border-bottem: 1px solid rgb(217, 92, 21); width: 45%;">
<form action="updateusers.php" method="POST" name="frm3" id= "frm3">
<input type = "hidden" name="user_id" value=<? echo $one_user_detail['user_id']; ?>/>

<div align="center">
<table width=585 cellpadding=6 cellspacing=2>
</div>
<p>Please use the form below to update user information.</p>
<tr>
<td><b>Update User Details</b></td>
</tr>
<tr>&nbsp;</tr> 
<tr>&nbsp;</tr> 
<tr>&nbsp;</tr> 
<tr>&nbsp;</tr> 

<tr>
<td align=right>Full Name</td>
<td><input type="text" name="full_name" value="<? echo $one_user_detail['full_name'];?>" style="width:200px;">
</td>
</tr>

<tr>
<td align=right>User Name:</td>
<td>
<input type="text" name="user_name" value="<? echo $one_user_detail['user_name'];?>" style="width:200px;">
</td>
</tr>

<tr>
<td align=right>User Email:</td>
<td><input type="text" name="user_email" value="<? echo $one_user_detail['user_email'];?>" style="width:200px;"></td>
</tr>


<tr>
<td align=right>Address:</td>
<td><input type="text" name="address" value="<? echo $one_user_detail['address'];?>" style="width:200px;"></td>
</tr>

<tr>
<td align=right>Address1:</td>
<td><input type="text" name="address1" value="<? echo $one_user_detail['address1'];?>" style="width:200px;"></td>
</tr>

<tr>
<td align=right>Address2:</td>
<td><input type="text" name="address2" value="<? echo $one_user_detail['address2'];?>" style="width:200px;"></td>
</tr>

<tr>
<td align=right>city:</td>
<td><input type="text" name="city" value="<? echo $one_user_detail['city'];?>" style="width:200px;"></td>
</tr>


<tr>
<td align=right>district:</td>
<td><input type="text" name="district" value="<? echo $one_user_detail['district'];?>" style="width:200px;"></td>
</tr>


<tr>
<td align=right>state:</td>
<td><input type="text" name="state" value="<? echo $one_user_detail['state'];?>" style="width:200px;"></td>
</tr>

<!--
<tr>
<td align=right>User IP Details:</td>
<td><input type="text" name="users_ip" value="<? echo $one_user_detail['users_ip'];?>" style="width:200px;"></td>
</tr>-->


<tr>
<td align=right>Date:</td>
<td><input type="text" name="date" value="<? echo $one_user_detail['date'];?>" style="width:200px;"></td>
</tr>


<tr>
<td colspan=2 align=center>
<br>
<input name="doUpdate" type="submit" id="doUpdate" value="Update">
&nbsp;&nbsp;
</br>
</td>
</tr>
</table>
</table>
</form>
</div>
</div>
<?php mysql_close($link);?>
</body>
</html>

