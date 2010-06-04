<?php
include '../includes/dbc.php';
$page_limit = 15; 

if (!isset($_GET['page']) )
{ $start=0; } else
{ $start = ($_GET['page'] - 1) * $page_limit; }

$rs_all = mysql_query("select count(*) as total_all from users") or die(mysql_error());
$rs_active = mysql_query("select count(*) as total_active from users where approved='1'") or die(mysql_error());
$rs_pending = mysql_query("select * from users where approved='0' limit $start,$page_limit") or die(mysql_error());
$rs_total_pending = mysql_query("select count(*) as tot from users where approved='0'");						   
list($total_pending) = mysql_fetch_row($rs_total_pending);
$rs_recent = mysql_query("select * from users where approved='1' order by date desc limit 25") or die(mysql_error());
list($all) = mysql_fetch_row($rs_all);
list($active) = mysql_fetch_row($rs_active);
$nos_pending = mysql_num_rows($rs_pending);
?>

<!--delete code from user-->
<?php 
if($_GET['id']!= "")
{ 
$userid=($_GET['id']);  
$sql1 = "DELETE FROM users
               WHERE user_id= '$userid'";  
echo "<div class='notice'>Successfully Deleted</div>";
mysql_query($sql1,$link)or die("Insertion Failed:" .mysql_error());  
} 
?>



<html>
<head>
<title>User Manager Main Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
<link type="text/css" rel="stylesheet" href="js/thickbox/thickbox.css"></link>
<script language="javascript" src="js/thickbox/thickbox.js"></script>
<link rel="stylesheet" href="../blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="../blueprint/print.css" type="text/css" media="print">
<link rel="stylesheet" href="../blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
<link rel="stylesheet" href="../css/styles_new.css" type="text/css"></link>
<script type = "text/javascript">
function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to delete")) {
 //alert(delUrl);
 	url = 'listusers.php?id='+delUrl; 
 	//alert(url);
   window.document.location = url;
  }
else
{
url = 'listusers.php';
 window.document.location = url;
}
}
</script>



</head>
<body>
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

<table style="width: 930px; margin-left: auto; margin-right: auto;">

<tr>
<td>
<a href="admin.php" title="species_page">
<img alt="" src="./images/cpanel.png" />cpanel</a>
</td>

<td>
<a href="addusers.php" title="species_page">
<img alt="" src="./images/addusers.png" />Add new user</a>
</td>


<td>
<a href="admin_logout.php" title="species_page">
<img alt="" src="./images/logout.png" />Logout</a>
</td>

<td width="10%"><h2>Administration Page</h2></td> 
</tr>
</table>



<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
<!-- 
<a href="newuser.php">Create User</a><br>
<a href="admin_ban.php">Ban/Unban </a><br> -->
 
 <tr bgcolor="#f5ecf9">  
 <td width="4%"><strong>ID</strong></td>
 <td> <strong>Date</strong></td>
 <td><strong>User Name</strong></td>
 <td width="18%"><strong>Email</strong></td>
 <td><strong>Location</strong></td>
 <td><strong>Edit</strong></td>
 <td><strong>Delete</strong></td>
 <td><strong>Login</strong></td>
 <!--<td width="10%"><strong>Approved</strong></td>
 <td width="8%"> <strong>Banned</strong></td>-->
 <td width="5%">&nbsp;</td>
  </tr>
     <tr> 
       <td>&nbsp;</td>
       <td width="12%">&nbsp;</td>
       <td width="18%">&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
     
<?php  while ($prows = mysql_fetch_array($rs_pending)) {?>
<tr> 
          <td>#<? echo $prows['user_id']?></td>
           <td><? echo $prows['date']?></td>
          <td><? echo $prows['user_name']?></td>
          <td><? echo $prows['user_email']?></td>
<td>
<?php  
$query=mysql_query("SELECT state FROM seswatch_states WHERE state_id='$prows[state_id]'");
while($query1 = mysql_fetch_array($query))
{
echo $query1['state'];
}
?>
</td>

<td>
<?php
$edituserlink="<a class=thickbox href=\"editusers.php?userid=".$prows['user_id']."\">Edit</a>";
echo $edituserlink; 
?>
</td>

<td>
<?php
$var=$prows['user_id'];
//$deleteuserlink="<a class=thickbox href=\"deleteusers.php?userid=".$prows['user_id']."\">Delete</a>";
$deleteuserlink = "<a  href='listusers.php' onclick=confirmDelete('$var');>Delete</a>";
echo $deleteuserlink;
?>
</td>
         
<td>
<?php
$loginuserlink="<a target=\"_blank\" href=\"inspectlogin.php?userid=".$prows['user_id']."\">Login</a>";
echo $loginuserlink; 
?>
</td>




         <!-- <td> <span id="papprove<? echo $prows['user_id']; ?>">
            <? if(!$prows['approved']) { echo "Pending"; } else {echo "yes"; }?>
			</span>
          </td>
          <td><span id="pban<? echo $prows['user_id']; ?>">
            <? if(!$prows['banned']) { echo "no"; } else {echo "yes"; }?>
			</span> 
          </td>
          <td> 
		    <a href="javascript:void(0);" onclick='$.get("do.php",{ cmd: "approve", user_id: "<? echo $prows['user_id']; ?>" } ,function(data){ $("#papprove<? echo $prows['user_id']; ?>").html(data); });'>Approve</a> 
           | <a href="javascript:void(0);" onclick='$.get("do.php",{ cmd: "ban", user_id: "<? echo $prows['user_id']; ?>" } ,function(data){ $("#pban<? echo $prows['user_id']; ?>").html(data); });'>Ban</a> 
		   | <a href="javascript:void(0);" onclick='$.get("do.php",{ cmd: "unban", user_id: "<? echo $prows['user_id']; ?>" } ,function(data){ $("#pban<? echo $prows['user_id']; ?>").html(data); });'>Unban</a>
			</td>
        </tr>-->
        
        <? } ?>
        <tr> 
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
	  <p>  <?php
	  // generate paging here
	  if ($total_pending > $page_limit)
	  {
	   $total_pages = ceil($total_pending/$page_limit);
	   echo "<h4><font color=\"#CC0000\">Pages: </font>";
	  $i = 0;
		while ($i < $total_pages) 
		{
				$page_no = $i+1;
				echo "<a href=\"listusers.php?page=$page_no\">$page_no</a> ";
				$i++;
		}
	  echo "</h4>";
	  }?>
      </p>
     <p align="center">
        <input name="doRefresh" type="button" id="doRefresh" value="Refresh All" onClick="location.reload();">

        <input type=reset  value="Back"  class=buttonstyle onclick="javascript:window.location.href='admin.php';">
      </p>   

  
    
      <h3>Recent Registrations</h3>
      <p>This shows to <strong>25 latest approved</strong> registrations and their 
        banned status.</p>
      <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr bgcolor="#e5ecf9">  
          <td width="4%"><strong>ID</strong></td>
          <td> <strong>Date</strong></td>
          <td><strong>User Name</strong></td>
          <td width="29%"><strong>Email</strong></td>
          <td width="10%"><strong>Approved</strong></td>
          <td width="8%"> <strong>Banned</strong></td>
          <td width="19%">&nbsp;</td>
        </tr>
        <tr>  
          <td>&nbsp;</td>
          <td width="12%">&nbsp;</td>
          <td width="18%">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td> 
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <?php  while ($rrows = mysql_fetch_array($rs_recent)) {?>
    <tr> 
          <td>#<?php  echo $rrows['user_id']?></td> 
          <td><?php  echo $rrows['date']?></td> 
          <td><?php  echo $rrows['user_name']?></td> 
          <td><?php  echo $rrows['user_email']?></td>
          <td> <span id="approve<? echo $rrows['user_id']; ?>">
            <? if(!$rrows['approved']) { echo "Pending"; } else {echo "yes"; }?>
			</span>
          </td> 
          <td><span id="ban<? echo $rrows['user_id']; ?>">
            <? if(!$rrows['banned']) { echo "no"; } else {echo "yes"; }?>
			</span> 
          </td>
          <td> 
		    <a href="javascript:void(0);" onclick='$.get("do.php",{ cmd: "approve", user_id: "<? echo $rrows['user_id']; ?>" } ,function(data){ $("#approve<? echo $rrows['user_id']; ?>").html(data); });'>Approve</a> 
           | <a href="javascript:void(0);" onclick='$.get("do.php",{ cmd: "ban", user_id: "<? echo $rrows['user_id']; ?>" } ,function(data){ $("#ban<? echo $rrows['user_id']; ?>").html(data); });'>Ban</a> 
		   | <a href="javascript:void(0);" onclick='$.get("do.php",{ cmd: "unban", user_id: "<? echo $rrows['user_id']; ?>" } ,function(data){ $("#ban<? echo $rrows['user_id']; ?>").html(data); });'>Unban</a>
			</td>
        </tr>
        <? } ?> 
 <!--        <tr> 
          <td>&nbsp;</td>
          <td>&nbsp;</td> 
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr> 
        <tr>  
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>  
          <td>&nbsp;</td>
          <td>&nbsp;</td> 
          <td>&nbsp;</td>
        </tr> -->
      </table>
      
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="12%">&nbsp;</td>
  </tr>
</table>
<?php mysql_close($link);?>
</body>
</html>

