<? session_start();
if(!isset($_SESSION['user_admin'])) {
header("Location: index.php");
exit();
}
include '../includes/dbc.php';

$rs_results = mysql_query("select * from users where user_email = '$_POST[q]' or full_name='$_POST[q]'") or die(mysql_error());
$total = mysql_num_rows($rs_results);

?>
<html>
<head>
<title>Administration - Search Results</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
<script></script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="11%" valign="top"><p><a href="admin_main.php">Admin Main</a></p>
      <p><br>
        <a href="newuser.php">Create User</a><br>
        <a href="admin_ban.php">Ban/Unban </a><br>
        <a href="admin_logout.php">Logout</a> <br>
      </p></td>
    <td width="77%"><h2>Search Results</h2>
      <p>&nbsp;</p>
      <table width="80%" border="0" align="center" cellpadding="10" cellspacing="5" bgcolor="#e5ecf9">
        <tr>
          <td><form action="admin_results.php" method="post" name="form1">
              Search 
              <input name="q" type="text" id="q" value="">
              <input type="submit" name="Submit" value="Submit">
              [Type email or name] </form></td>
        </tr>
      </table>
      <h3>&nbsp;</h3>
	  
      <? if(isset($_POST['q'])) { ?>
      <p>Total found: <? echo $total;?></p>
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
        <? while ($rrows = mysql_fetch_array($rs_results)) {?>
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
		    <a href="#" onclick='$.get("do.php",{ cmd: "approve", id: "<? echo $rrows['user_id']; ?>" } ,function(data){ $("#approve<? echo $rrows['user_id']; ?>").html(data); });'>Approve</a> 
            <a href="#" onclick='$.get("do.php",{ cmd: "ban", id: "<? echo $rrows['user_id']; ?>" } ,function(data){ $("#ban<? echo $rrows['user_id']; ?>").html(data); });'>Ban</a> 
			<a href="#" onclick='$.get("do.php",{ cmd: "unban", id: "<? echo $rrows['user_id']; ?>" } ,function(data){ $("#ban<? echo $rrows['user_id']; ?>").html(data); });'>Unban</a>
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
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="12%">&nbsp;</td>
  </tr>
</table>
<? } ?>
</body>
</html>
