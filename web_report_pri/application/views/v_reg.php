
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" ></script>
<script>

</script>
<style>
@media (min-width: 1200px) {
  .container {
    width: 700px;
	padding-top:150px;
  }
}
.pad{

	padding:5px;
}
</style>
</head>
<body>
<div class="container" align="center">
<form method="post" action="/web_report/web_report_pri/reg/register">
	<table border="2 px" width="50%" class="table-striped">
		<thead >
           <tr>
		   <th class="pad" colspan=2>Register Here</th>
		   </tr>
		</thead>
		<tbody >

		   <tr >
		   <td class="pad">ชื่อ</td>
		   <td class="pad"><input name="fname" type="text" ></td>
		   </tr>

		   <tr >
		   <td class="pad">นามสกุล</td>
		   <td class="pad"><input name="lname" type="text" ></td>
		   </tr>

		   <tr >
		   <td class="pad">Username</td>
		   <td class="pad"><input name="username" type="text" /></td>
		   </tr>

		   <tr >
		   <td class="pad">Password</td>
		   <td class="pad"><input name="password" type="password"  /></td>
		   </tr>

		   <tr >
		   <td colspan=2 class="pad"><input type="submit" name="Submit" value="Save"></td>
		    </tr>
		</tbody>

	</table>
</form>
already have an account:<a href='http://localhost/web_report/web_report_pri/c_login' >Log In</a>
</div>
</body>
</html>
