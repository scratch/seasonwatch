<link rel="SHORTCUT ICON" href="images/favicon.ico" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js" type="text/javascript"></script>

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

<script type="text/javascript">
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

