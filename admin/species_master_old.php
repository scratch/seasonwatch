<html> 
<head><TITLE>Species Master Page</TITLE></head>

<body style="width: 550px;">
<small style="font-family: Helvetica,Arial,sans-serif;">
<map name="Map">
<!--Add here Related link for HotSpots-->
<area shape="rect" coords="64, 180, 192, 220" href="admin_logout.php">
</map>

<img style="border-style: none;" alt="SeasonWatch banner" src="../images/speciesmaster.png" usemap="#Map"><br>

</small>
</body>

<form action="species_process.php" method="post">
<table width=585 cellpadding=6 cellspacing=2>
<tr>
<td><b>Create Species </b></td>
</tr>
<tr>&nbsp;</tr>
<tr>&nbsp;</tr>
<tr>&nbsp;</tr>
<tr>&nbsp;</tr>

<tr>
<td align=right>Species Primary Common Name:</td>
<td>
<input type="text" name="species_primary_common_name" style="width:200px;">
</td>
</tr>

<tr>
<td align=right>Species Scientific Name:</td>
<td>
<input type="text" name="species_scientific_name" style="width:200px;">
</td>
</tr>

<tr>
<td align=right>family:</td>
<td><input type="text" name="family" style="width:200px;"></td>
</tr>


<tr>
<td align=right>vegetation type:</td>
<td><input type="text" name="vegetation_type" style="width:200px;"></td>
</tr>

<tr>
<td align=right>status in india:</td>
<td><input type="text" name="status_in_india" style="width:200px;"></td>
</tr> 

<tr>
<td align=right>habitat type:</td>
<td><input type="text" name="habitat_type" style="width:200px;"></td>
</tr>

<tr>
<td align=right>distribution in india:</td>
<td><input type="text" name="distribution_in_india" style="width:200px;"></td>
</tr>

<tr>
<td align=right>leaf shape category:</td>
<td>
<input type="text" name="leaf_shape_category" style="width:200px;">
</td>
</tr>


<tr>
<td align=right>size description:</td>
<td><input type="text" name="size_description" style="width:200px;"></td>
</tr>

<tr>
<td align=right>flower description:</td> 
<td><input type="text" name="flower_description" style="width:200px;"></td>
</tr>

<tr>
<td align=right>bark description:</td>
<td><input type="text" name="bark_description" style="width:200px;"></td>
</tr>

<tr>
<td align=right>fruit description:</td>
<td><input type="text" name="fruit_description" style="width:200px;"></td>
</tr>

<tr>
<td align=right>leaf type:</td>
<td><input type="text" name="leaf_type" style="width:200px;"></td>
</tr>

<tr>
<td align=right>spine thorn description:</td>
<td><input type="text" name="spine_thorn_description" style="width:200px;"></td>
</tr>

<tr>
<td align=right>flowering time:</td>
<td><input type="text" name="flowering_time" style="width:200px;"></td>
</tr>

<tr>
<td align=right>fruiting time:</td>
<td><input type="text" name="fruiting_time" style="width:200px;"></td>
</tr>

<tr>
<td align=right>time of leaf flush:</td>
<td><input type="text" name="time_of_leaf_flush" style="width:200px;"></td>
</tr>

<tr>
<td align=right>special notes on phenology:</td>
<td><input type="text" name="special_notes_on_phenology" style="width:200px;"></td>
</tr>

<tr>
<td align=right>similar species:</td>
<td><input type="text" name="similar_species" style="width:200px;"></td>
</tr>

<tr>
<td align=right>known pollinators:</td>
<td><input type="text" name="known_pollinators" style="width:200px;"></td>
</tr>

<tr>
<td align=right>Known Seed Dispersers:</td>
<td><input type="text" name="Known_Seed_Dispersers" style="width:200px;"></td>
</tr>

<tr>
<td align=right>Uses by humans:</td>
<td><input type="text" name="Uses_by_humans"style="width:200px;"></td>
</tr>

<tr>
<td align=right>list_of_references:</td>
<td><input type="text" name="list_of_references" style="width:200px;"></td>
</tr>

<tr>
<td align=right>Special Notes on the Species:</td>
<td><input type="text" name="Special_Notes_on_the_Species" style="width:200px;"></td>
</tr>

<tr>
<td colspan=2 align=center>
<br>
<input type=submit value= "Submit"  class=buttonstyle onclick="javascript:return validate();">
&nbsp;&nbsp;
<input type=reset  value="Clear"  class=buttonstyle>
&nbsp;
<input type=reset  value="Cancel"  class=buttonstyle onclick="javascript:window.location.href='admin_main.php';">
<input type=hidden name="cmd" value="createnew" />
<br>
</td>
</tr>
</table>
</form>
</html>
