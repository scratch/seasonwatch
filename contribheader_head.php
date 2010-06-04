<?php 
page_protect();
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<link rel="SHORTCUT ICON" href="images/favicon.ico" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery-1.3.2.min.js" type="text/javascript"></script>



<script type="text/javascript">
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
function gettree_nickname(id) {	
	document.getElementById('tree_nicknamediv').style.visibility = 'visible';
		//alert("tree_nickname :"+id);
		var strURL="treenickname.php?id="+id;
		//alert("url="+strURL);
		var req = getXMLHTTP();
if (req) {
			req.onreadystatechange = function() {
			if (req.readyState == 4) {
			//alert("onreadystatechange ==4");
			// only if "OK"
			//HTTP Request req.status ==200 shows 'Everything is OK' commented by Pavanesh
if (req.status == 200) {
						
		document.getElementById('tree_nicknamediv').innerHTML=req.responseText;	
								
			} else {
			alert("There was a problem while using XMLHTTP:\n" + req.statusText);
			}
			}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}

</script>


<!-- <script>
$(document).ready(function() {
 
$(".filter").corner();
$(".first_image").corner('bottom');
});
</script> --> 

<!-- <script type="text/javascript">
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
</script>  -->
 
<!-- <script> 
$(document).ready(function(){
$('#query').autocomplete("autocomplete.php", {
// width: 388,
selectFirst: false,
matchSubset :true,
matchContains: false,
formatItem: formatItem
 
});
  
$("#query").result(function(event, data, formatted) {
 
document.location.href= "../guide.php?id="+ data[1];
 
}); 
}); 
function formatItem(row) {
var completeRow;
completeRow = new String(row);
var scinamepos = completeRow.lastIndexOf("(");
var rest = completeRow.substr(0,scinamepos)
var sciname = completeRow.substr(scinamepos);
var commapos = sciname.lastIndexOf(",");
sciname = sciname.substr(0,commapos);
var newrow = rest + '<br><i>' + sciname + '</i>';
return newrow; 
} 
</script> -->

<!-- <script>
function getValue()
  {
  var x=document.getElementById("myHeader");
  alert(x.innerHTML);
  }
</script>
 -->


<!--  <script> 
$(document).ready(function() {
 
$(".filter").corner();
$(".first_image").corner('bottom');
});
</script>   



<script>
$(document).ready(function(){
$('#query').autocomplete("autocomplete.php", {
// width: 388,
selectFirst: false,
matchSubset :true,
matchContains: false,
formatItem: formatItem

});
  
$("#query").result(function(event, data, formatted) {
 
document.location.href= "../guide.php?id="+ data[1];
 
});
});
function formatItem(row) {
var completeRow;
completeRow = new String(row);
var scinamepos = completeRow.lastIndexOf("(");
var rest = completeRow.substr(0,scinamepos)
var sciname = completeRow.substr(scinamepos);
var commapos = sciname.lastIndexOf(",");
sciname = sciname.substr(0,commapos);
var newrow = rest + '<br><i>' + sciname + '</i>';
return newrow;
}
</script>  -->

<style type="text/css"> 
#jsddm
{ margin: 0;
padding: 0;
font-size:14px;
}

#jsddm li
{ float: left;
list-style: none;
background: #000000;
}

#jsddm li a
{ display: block;
background: #000000;
padding: 3px 5px;
text-decoration: none;
border-right: 1px solid white;
width:auto;
color: #fff;
font-size:100%;
white-space: nowrap}

#jsddm li a:hover 
{ color: #ffcb1a}

#jsddm li ul
{ margin: 0;
padding: 0;
position: absolute;
visibility: hidden;
border-top: 1px solid #ffcb1a;
}

#jsddm li ul li
{ float: none;
display: inline;
}

#jsddm li ul li a
{ width: auto;
font-size:14px;
background: #333;border: 1px solid #ffcb1a; border-top:none; font-weight:normal; }

#jsddm li ul li a:hover
{ background: #000;color: #fff}
</style> 

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