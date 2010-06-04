<?php
include './includes/dbc.php';
page_protect();

//$result = mysql_query('select tree_nickname from user_tree_table WHERE user_id = 81');
$sql = mysql_query("SELECT tree_nickname FROM user_tree_table WHERE user_id='$_SESSION[user_id]'");
while($row = mysql_fetch_assoc($sql))
{
$data1 .= "<option  value='{$row['tree_id']}'>{$row['tree_nickname']}</option>";
}
?>
<form action="<? $_SERVER['PHP_SELF']; ?>" method="post">
<select id="species_id" name= "tree_nickname" href="dropdown.php" onselect="http://localhost/seasonwatch/tree_observations.php";>
<option>Select your Tree</option>
<?php
mysql_close($link);
echo $data1;
?>
</select>
</form>
</td> 
</tr> 






