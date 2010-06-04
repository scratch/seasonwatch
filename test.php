<?php
?>

<html>
<head>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="http://www.google-analytics.com/urchin.js">
<script type="text/javascript">
_uacct = "UA-2623402-1";
urchinTracker();
</script>
<script type="text/javascript" src="js/chili-1.7.pack.js"></script>

<script type="text/javascript" src="js/pave_script.js"></script>
<style type="text/css">
.jscom, .mix htcom { color: #4040c2; }
.com { color: green; }
.regexp { color: maroon; }
.string { color: teal; }
.keywords { color: blue; }
.global { color: #008; }
.numbers { color: #880; }
.comm { color: green; }
.tag { color: blue; }
.entity { color: blue; }
.string { color: teal; }
.aname { color: maroon; }
.avalue { color: maroon; }
.jquery { color: #00a; }
.plugin { color: red; }
</style> 

</head>


<body>
<div id="signupbox"></div>
<div id="signuptab"></div>
<ul>
<li id="signupcurrent">
<a href=" ">Signup</a>
</li> 
</ul>
<div id="signupwrap">
<form id="signupform" action="" method="get" autocomplete="off">
<table>
<tbody>
<tr>
<td class="label">
<label id="lfirstname" for="firstname">First Name</label>
</td>
<td class="field">
<input id="firstname" type="text" maxlength="100" value="" name="firstname"/>
</td>

<td class="status"/>
</tr>
<tr>
<td class="label">
<label id="llastname" for="lastname">Last Name</label>
</td>

<td class="field">
<input id="lastname" type="text" maxlength="100" value="" name="lastname"/>
</td>
<td class="status"/>
</tr>
<tr>

<td class="label">
<label id="lusername" for="username">Username</label>
</td>
<td class="field">
<input id="username" type="text" maxlength="50" value="" name="username"/>
</td>

<td class="status"/>
</tr>
<tr>
<td class="label">
<label id="lpassword" for="password">Password</label>
</td>

<td class="field">
</td>
<td class="status"/>
</tr>
<tr>

<td class="label">
<label id="lpassword_confirm" for="password_confirm">Confirm Password</label>
</td>
<td class="field">
<input id="password_confirm" type="password" value="" maxlength="50" name="password_confirm"/>
</td>

<td class="status"/>
</tr>
<tr>
<td class="label">
<label id="lemail" for="email">Email Address</label>
</td>

<td class="field">
<input id="email" type="text" maxlength="150" value="" name="email"/>
</td>
<td class="status"/>
</tr>

<tr>
<td class="label">
<label>Which Looks Right</label>
</td>
<td class="field" style="vertical-align: top; padding-top: 2px;" colspan="2">
<table>

<tbody>
<tr>
<td style="padding-right: 5px;">
<input id="dateformat_eu" type="radio" value="0" name="dateformat"/>
<label id="ldateformat_eu" for="dateformat_eu">14/02/07</label>
</td>
<td style="padding-left: 5px;">
<input id="dateformat_am" type="radio" value="1" name="dateformat"/>
<label id="ldateformat_am" for="dateformat_am">02/14/07</label>
</td>
<td> </td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td class="label"> </td>
<td class="field" colspan="2">
<div id="termswrap">
<input id="terms" type="checkbox" name="terms"/>
<label id="lterms" for="terms">I have read and accept the Terms of Use.</label>
</div>
</td>
</tr>
<tr>
<td class="label">
<label id="lsignupsubmit" for="signupsubmit">Signup</label>
</td>
<td class="field" colspan="2">
<input id="signupsubmit" type="submit" value="Signup" name="signup"/>
</td>
</tr>
</tbody>
</table>
</form>
</div>
</div>
</div>
</div>
</div>
</body>

</html>