<?php
session_start();
if(!isset($_SESSION['user_admin'])) {
header("Location: index.php");
exit();
}
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


<html>
<head>
<title>Administration Main Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
<link type="text/css" rel="stylesheet" href="../js/thickbox/thickbox.css"></link>
<script language="javascript" src="../js/thickbox/thickbox.js"></script>
<link rel="stylesheet" href="../blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="../blueprint/print.css" type="text/css" media="print">
<link rel="stylesheet" href="../blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
<link rel="stylesheet" href="../css/styles_new.css" type="text/css">
<link type="text/css" rel="stylesheet" href="../js/thickbox/thickbox.css"></link>
<script language="javascript" src="../js/thickbox/thickbox.js"></script>
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
&nbsp;
&nbsp;
&nbsp;
&nbsp;
</td>


<td>
<!-- <a href="newuser.php">Create User</a><br>
<a href="admin_ban.php">Ban/Unban </a><br>-->
<a href="species_page.php" title="species_page">
<img alt="" src="./images/addedit.png" />Add new species</a>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
</td>

<td>
<a href="listspecies.php" title="species_page">
<img alt="" src="./images/address_f2.png" />All Species List</a>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
</td>

<td>
<a href="listusers.php" title="species_page">
<img alt="" src="./images/icon-48-user.png" />User Manager</a>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
</td>


<td>
<a href="admin_logout.php" title="species_page">
<img alt="" src="./images/logout.png" />Logout</a>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
</td>


<!-- <a href="species_page.php">Add New Species</a><br>
<a href="listspecies.php" title="species_page">
<a href="admin_logout.php">Logout</a> <br></p></td>  -->
<td width="10%"><h2>Administration Page</h2></td>
</tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> 
<td>Total users: <? echo $all;?></td>
<td>Active users: <? echo $active; ?></td>
<td>Pending users: <? echo $nos_pending; ?></td> 
</tr>
</table>
<p>&nbsp;</p>  
     <!--  <table width="80%" border="0" align="center"  cellpadding="10" cellspacing="5" bgcolor="#e5ecf9">
        <tr> 
          <td><form name="form1" method="post" action="admin_results.php">
              Search    
              <input name="q" type="text" id="q">
              <input type="submit" name="Submit" value="Submit">
              [Type email or name] </form></td>
        </tr> 
      </table> 
      <p><strong>*Note: </strong>Once the user is banner, he/she will never be 
        able to register new account with same email address.</p>
      <h3>Users Pending Approval</h3>   
      <p>Approve -&gt; A notification email will be sent to user notifying activation.<br>
        Ban -&gt; No notification email will be sent to the user.</p>
      <p>Total Pending: <? echo $total_pending; ?></p> --> 
      
<table id="table1" class="tablesorter" cellspacing="0" cellpadding="3" style="width: 930px; margin-left: auto; margin-right: auto;">
<colgroup>
<col style="width: 5px;"/>
<col style="width: 750px;"/>
<col style="width: 650px;"/>
<col style="width: 750px;"/>
<col style="width: 750px;"/>
<col style="width: 650px;"/>
</colgroup>
<thead>
<tr>
<th class="header">ID</th>
<th class="header">Date</th>
<th class="header">User Name</th>
<th class="header">Email</th>
<th class="header">Location</th>
<th class="header">Approval</th>
<th class="header">Banned</th>
<th class="header">Approved</th>
<th class="header">Banned</th>
<th class="header">UnBanned</th>
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
        
  <td> <span id="papprove<? echo $prows['user_id']; ?>">
            <? if(!$prows['approved']) { echo "Pending"; } else {echo "yes"; }?>
			</span>
          </td>
          <td><span id="pban<? echo $prows['user_id']; ?>">
            <? if(!$prows['banned']) { echo "no"; } else {echo "yes"; }?>
</span> 
</td>

<td> 
<a href="javascript:void(0);" onclick='$.get("do.php",{ cmd: "approve", user_id: "<? echo $prows['user_id']; ?>" } ,function(data){ $("#papprove<? echo $prows['user_id']; ?>").html(data); });'>Approve</a> 
</td>
<td>
<a href="javascript:void(0);" onclick='$.get("do.php",{ cmd: "ban", user_id: "<? echo $prows['user_id']; ?>" } ,function(data){ $("#pban<? echo $prows['user_id']; ?>").html(data); });'>Ban</a> 
</td>
<td>
<a href="javascript:void(0);" onclick='$.get("do.php",{ cmd: "unban", user_id: "<? echo $prows['user_id']; ?>" } ,function(data){ $("#pban<? echo $prows['user_id']; ?>").html(data); });'>Unban</a>
</td>
</tr>
<? } ?>
</table>
<p>
<?php
// generate paging here
if ($total_pending > $page_limit)
{
$total_pages = ceil($total_pending/$page_limit);
echo "<h4><font color=\"#CC0000\">Pages: </font>";
$i = 0;
while ($i < $total_pages) 
{
$page_no = $i+1;
echo "<a href=\"admin.php?page=$page_no\">$page_no</a> ";
$i++;
}
echo "</h4>";
}?>
</p>

<p>
<input name="doRefresh" type="button" id="doRefresh" value="Refresh All" onClick="location.reload();">
</p>
    
<!--    
    
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
        <? while ($rrows = mysql_fetch_array($rs_recent)) {?>
    <tr> 
          <td>#<? echo $rrows['user_id']?></td> 
          <td><? echo $rrows['date']?></td> 
          <td><? echo $rrows['user_name']?></td> 
          <td><? echo $rrows['user_email']?></td>
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
      </table>--> 
      
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
