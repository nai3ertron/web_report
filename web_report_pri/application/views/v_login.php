
<html>
<head>
<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" ></script>
<link rel ="stylesheet" href ="asset/bootstrap/css/bootstrap.min.css" type="text/css">
<link rel ="stylesheet" href ="asset/bootstrap/css/bootstrap-theme.min.css" type="text/css">
 -->

<script>

</script>
<style>
 #login{
	 padding:50px;
 }

 @media (min-width: 1200px) {
  .container {
    width: 700px;
	padding-top:150px;
  }
}
</style>
</head>
<body>

<div class="container" >

<form method="post" action="/web_report/web_report_pri/c_login/authen">
<fieldset class="border p-2">
<legend class="w-auto">LOG IN</legend>
	<div id="login">
		<span >Username:</span><input name="username" type="text" /><br><br>
		<span >Password:</span><input name="password" type="password" /><br>

<input type="submit" name="Submit" value="Login">
     </div>
</fieldset>
No Account?:<a href='http://localhost/web_report/web_report_pri/reg' >Register </a>
</form>

</div>
<!--->
 <script src="asset/bootstrap/js/bootstrap.min.js"></script>
<script src="asset/bootstrap/js/moment.min.js" type="text/javascript"></script>
<!--->
</body>
</html>
