<?php 
?>
<div class="container top" style="background-image:url('images/pagetopstrip.png'); background-repeat:no-repeat; background-position:top left; margin-left:10px; width:990px; padding-top:30px; background-color:#fff; margin-left:auto; margin-right:auto;">
<div class="left" style="background-image:url('images/lefttorightfullpage.png'); background-repeat:repeat-y; padding-left:15px;">
<div class="container logo-box"  style=" margin-left:auto; margin-right:auto; height:110px; margin-top:0px; padding-bottom:10px;">
<div style="float:left;clear:none;">
<a href='index.php'><img style="margin-left:20" src="images/swlogo.jpg" alt="SeasonWatch" title="SeasonWatch"></a>
</div>
<div style="float:right;margin-top:20px;padding-left:relative;">
<div style="float:right;">

<form action="login.php" method="post" name="logForm" id="logForm" >
<table>
<tr>
<td width="45%"></td>
<td>
<table style="margin-bottom: 0.7em">
<?php  
if( $_SESSION['user_id'] ) { ?>

<tr>
<td style='text-align:right;'>
<?php  echo $_SESSION['user_name']; ?>&nbsp;(
<a href='logout.php?cmd=logout'>Log Out</a> )&nbsp;</td>
</tr>
<? } else {
?>

<tr>
<td class="small-link" style="margin:0;padding:0;font-size:10px;">
<table style="margin:0;padding:0;width:390px;">
<tr>
<td style="text-align:right;width:150px"><a title="register" href="register.php">signup!</a></td>
<td style="padding-left:35px">
<a title="forgot password ?" href="forgot.php">forgot?</a>
</td>
<td style="text-align:right;padding-right:33px">
<a title="remember me" class="rememberme" href="#">remember me</a>
<a style="display:none" class="rememberme" href="#">remembered</a>
<input type="hidden" value="0" id="remember" name="remember">
</td>
</tr>
</table>
 
</td>
</tr>
<tr>
<td style="padding:0;margin:0;">
<input class="default-value login-box" type="text" name="usr_email" value="email id" />
<input id="password-clear" class="login-box" type="text" value="password" autocomplete="off"/>
<input class="login-box" id="password-password" type="password" name="pwd" value="" autocomplete="off" />
<input type="hidden" name="cmd" value="login" />

<input  name="doLogin" style="width:30px;border:solid 1px #666" type="submit" value="go" id="doLogin3" onclick="javascript:return validate();">
</td>
</tr>
<? } ?>
</table>
</td>
</tr>
</table>
</form>

<table style="margin-bottom: 0.4em">
<tr>
<td width="45%"></td>
<td>
<table class="main-links" style="margin-bottom: 0.4em">
<tr>
<td style=""><a href="contrib.php">my&nbsp;home</a></td>
<td style=''>|</td>
<td style=""><a href="addtree_options.php">add&nbsp;tree</a></td>
<td style=''>|</td>
<td style=""><a href="listtree.php">edit&nbsp;tree</a></td>
<td style=''>|</td>
<td style=""><a href="listtree_for_observation.php">add&nbsp;observation</a></td>
<td style=''>|</td>
<td style=""><a href="listobservations.php">edit&nbsp;observation</a></td>
<td style=''>|</td>
<td style=""><a href="mysettings.php">my&nbsp;profile</a></td>
</tr>
</table>
</td>
</tr>
</table>

</div>
</div>
</div> <!-- END OF LOGO BOX -->
<div class="container main_banner" style="width:950px; height:160px; margin-top:-20px; background-color:#fff; background-image:url('images/sw_banner.jpg'); background-repeat:no-repeat;">
</div>

<div class="container menu_links" style="color:#d95c15;width:950px; height:40px; padding-top:4px; background-image: url('images/shim.gif'); background-repeat:repeat-x; font-size:17px;"> <!-- background-image: url('images/shim.gif'); background-repeat:repeat-x; -->

<ul id="jsddm">
<!--<li><a href="http://localhost/seasonwatch/register.php">join</a>
</li><li>|</li>-->
<li ><a href="../wordpress/?p=1">why join</a></li>
<!--
<ul>
<li><a href="#">watch migrants</a></li>
<li><a href="#">identify migrants</a></li>
<li><a href="#">submit data</a></li>
</ul>-->


 
<!--<?php 
if( $_SESSION['user_id'] ) 
{  
$sql = mysql_query("SELECT user_tree_id FROM user_tree_table WHERE user_id='$_SESSION[user_id]'");
while($row = mysql_fetch_array($sql))
{ 
$var = $row['user_tree_id'];
}  
}  
?>-->

<!--<li><a href="#" onmouseover= "gettree_nickname('$var');">My Species</a>
<ul id="tree_nicknamediv">
<li>
<a href="#">
<div id="tree_nicknamediv">
</div>
</a>
</li> 
</li>


<!--<li><a href="participants.php">individuals</a></li>
<li><a href="#">groups</a></li>
<li><a href="#">map</a></li>
</ul><li>|</li>
</li>-->  

<li><a href="../wordpress/?p=15">tree reports</a></li>
<!--<ul>
<li><a href="#">migrants we watch</a></li>
<li><a href="#">highlighted species</a></li>
<li><a href="#">all species</a></li>
</ul>-->


<li><a href="../wordpress/?p=38">participants</a> </li>
<!--<ul>
<li><a href="participants.php">individuals</a></li> 
<li><a href="#">groups</a></li>
<li><a href="#">map</a></li>
</ul>-->


<li><a href="../wordpress/?p=49">about seasonwatch</a></li>
<!--<ul>
<li><a href="#">view data/maps</a></li>
<li><a href="#">latest summaries</a></li>
<li><a href="#">terms of use</a></li>
</ul>-->


<li><a href="../wordpress/?p=54">resources</a></li>
<!--<ul>
<li><a href="#">getting started with indian birds</a></li>
<li><a href="#">bird migration and climate change</a></li>
<li><a href="#">citizen science projects</a></li>
<li><a href="#">publications</a></li>
</ul>-->


<li><a href="../wordpress/?p=56">news</a></li>
<!--<ul>
<li><a href="#">media</a></li>
</ul>-->

</ul>
<!--
<div style="float:right">
<form id="search_form" action="search/index.php" method="get">
<input type="text" name="query" id="query" style="border:solid 1px #666;" value="search" autocomplete="off" delay="1500">
<input type="hidden" name="search" value="1">
<input type="submit" class="submit" value="go">
</form>
</div>
-->
</div>

<!-- This script must be in body-Pavanesh-->

<script>
var timeout = 500;
var closetimer = 0;
var ddmenuitem = 0;
function jsddm_open()
{ jsddm_canceltimer();
jsddm_close();
ddmenuitem = $(this).find('ul').css('visibility', 'visible');}
function jsddm_close()
{ if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');}
function jsddm_timer()
{ closetimer = window.setTimeout(jsddm_close, timeout);}
function jsddm_canceltimer()
{ if(closetimer)
{ window.clearTimeout(closetimer);
closetimer = null;}}
$(document).ready(function()
{ $('#jsddm > li').bind('mouseover', jsddm_open)
$('#jsddm > li').bind('mouseout', jsddm_timer)});
document.onclick = jsddm_close;
</script>

<script type="text/javascript">
$('.default-value').each(function() {
var default_value = this.value;
$(this).css('color', '#666'); // this could be in the style sheet instead
$(this).focus(function() {
if(this.value == default_value) {
this.value = '';
$(this).css('color', '#333');
}
});
$(this).blur(function() {
if(this.value == '') {
$(this).css('color', '#666');
this.value = default_value;
}
});
});
 
$('#password-clear').show();
$('#password-password').hide();
 
$('#password-clear').focus(function() {
$('#password-clear').hide();
$('#password-password').show();
$('#password-password').focus();
});
$('#password-password').blur(function() {
if($('#password-password').val() == '') {
$('#password-clear').show();
$('#password-password').hide();
}
});
 
var toggle = false;
$(".rememberme").click(function () {
if( toggle == false) {
$('#remember').val('1');
toggle = true;
} else {
$('#remember').val('0'); toggle = false;
}
$(".rememberme").toggle();
});
</script>



 