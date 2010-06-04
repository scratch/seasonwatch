$(document).ready(function() {
 // validate signup form on keyup and submit
 var validator = $("#signupform").validate({
 rules: {
 firstname: "required",
 lastname: "required",
 username: {
 required: true,
 minlength: 2,
 remote: "users.php"
 },
 password: {
 required: true,
 minlength: 5
 },
 password_confirm: {
 required: true,
 minlength: 5,
 equalTo: "#password"
 },
 email: {
 required: true,
 email: true,
 remote: "emails.php"
 },
 dateformat: "required",
 terms: "required"
 },
 messages: {
 firstname: "Enter your firstname",
 lastname: "Enter your lastname",
 username: {
 required: "Enter a username",
 minlength: jQuery.format("Enter at least {0} characters"),
 remote: jQuery.format("{0} is already in use")
 },
 password: {
 required: "Provide a password",
 rangelength: jQuery.format("Enter at least {0} characters")
 },
 password_confirm: {
 required: "Repeat your password",
 minlength: jQuery.format("Enter at least {0} characters"),
 equalTo: "Enter the same password as above"
 },
 email: {
 required: "Please enter a valid email address",
 minlength: "Please enter a valid email address",
 remote: jQuery.format("{0} is already in use")
 },
 dateformat: "Choose your preferred dateformat",
 terms: " "
 },
 // the errorPlacement has to take the table layout into account
 errorPlacement: function(error, element) {
 if ( element.is(":radio") )
 error.appendTo( element.parent().next().next() );
 else if ( element.is(":checkbox") )
 error.appendTo ( element.next() );
else
 error.appendTo( element.parent().next() );
 },
 // specifying a submitHandler prevents the default submit, good for the demo
 submitHandler: function() {
 alert("submitted!");
 },
 // set this class to error-labels to indicate valid fields
 success: function(label) {
 // set &nbsp; as text for IE
 label.html("&nbsp;").addClass("checked");
 }
 });

 // propose username by combining first- and lastname
 $("#username").focus(function() {
 var firstname = $("#firstname").val();
 var lastname = $("#lastname").val();
 if(firstname && lastname && !this.value) {
 this.value = firstname + "." + lastname;
 }
 });

});
