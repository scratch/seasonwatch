<html>
<head>
<link media="screen, projection" type="text/css" href="blueprint/screen.css" rel="stylesheet">
</link>
<link media="print" type="text/css" href="blueprint/print.css" rel="stylesheet">
</link>
<link media="screen, projection" type="text/css" href="blueprint/plugins/fancy-type/screen.css" rel="stylesheet">
<link rel="stylesheet" href="css/styles_new.css" type="text/css">
<body>
<table style="width: 700px; margin-left: auto; margin-right: auto;">
<tbody>
<tr>
<td colspan="2"> </td>
</tr>
<tr>
<td style="width: 300px;">
<div id="picdiv"> </div>
<table>
<tbody>
<tr>
<td class="notice" style="text-align: center;" colspan="2">You can upload upto 4 photographs for a particular sighting. </td>
</tr>
<form id="uploadForm" method="post" action="uploadphotos.php?id=" enctype="multipart/form-data"/>
<input type="hidden" value="2097152" name="MAX_FILE_SIZE"/>
<tr>
<td id="photo1" style="text-align: right; font-weight: bold;">Photo 1</td>
<td>
<input id="userfile1" type="file" name="userfile1"/>
</td>
</tr>
<tr>
<td id="photo2" style="text-align: right; font-weight: bold;">Photo 2</td>
<td>
<input id="userfile2" type="file" name="userfile2"/>
</td>
</tr>
<tr>
<td id="photo3" style="text-align: right; font-weight: bold;">Photo 3</td>
<td>
<input id="userfile3" type="file" name="userfile3"/>
</td>
</tr>
<tr>
<td id="photo4" style="text-align: right; font-weight: bold;">Photo 4</td>
<td>
<input id="userfile4" type="file" name="userfile4"/>
</td>
</tr>
<tr>
<td/>
<td style="">
<input id="uploadbutton1" type="submit" name="uploadphotos" value="Upload Photos"/>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>

<script>
function appendPhotos(iteration)
{
 alert('hello');
 var tbl = $('#uploadPic');
 //var lastRow = $('#uploadPic tr').length;
 //var iteration = lastRow;
 //if (iteration < 4) {
 var newElement = "<tr><td>Photo " + iteration + "</td><td>" + "<input name=userfile" + iteration + " type='file'/>" + "</td></tr>";
 $('#uploadPic').append(newElement);

 }
 //alert(newElement);
}
</script>

<script type="text/javascript">
$(document).ready(function() {
$('a.deletephoto').click(function() {
 //e.preventDefault();
 var parent = $(this).parent().parent().parent();
 id = $(this).attr('id');

 //id = id.replace(/delete-/, "");
 jConfirm('Are you sure you want ot delete this photo?', '',function(r)
 {
 if(r==true)
 {

 location.href="uploadphotos.php?id=" + id + "&deletephoto=true";

 }
 });

 });
$("#uploadForm").validate({
 rules: {
 userfile1: {

 accept: "png|jpg|jpeg|tiff",

 },

 caption1 : {
 required : function(element) {
 return $('#userfile1').val() != '';
 }

 },

 userfile2: {

 accept: "jpg|jpeg|tiff",

},

 caption2 : {
 required : function(element) {
 return $('#userfile2').val() != '';
 }

 },

 userfile3: {

accept: "jpg|jpeg|tiff",

 },

 caption3 : {
 required : function(element) {
 return $('#userfile3').val() != '';
 }

 },

 userfile4: {

 accept: "jpg|jpeg|tiff",

 },

 caption4 : {
 required : function(element) {
 return $('#userfile4').val() != '';
 }

 },
 },
 messages: {

 userfile1: {
 accept: "Only jpg and tiff formats allowed"
 },

 caption1 : {
 required: "please enter a caption for the image"
 },
 userfile2: {
 accept: "Only jpg and tiff formats allowed"
 },

 caption2 : {
 required: "please enter a caption for the image"
},

 userfile3: {
 accept: "Only jpg and tiff formats allowed"
 },

 caption3 : {
 required: "please enter a caption for the image"
 },

 userfile4: {
 accept: "Only jpg and tiff formats allowed"
 },
caption4 : {
required: "please enter a caption for the image"
},
}
});
$("#userfile1").blur(function() {
 $("#caption1").valid();
});
});

</script>
</body>
</html>
