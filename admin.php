<html>
<head>
	<title>ADMIN</title>
	<link rel="stylesheet" type="text/css" href="style2.css"></link>
	<style>
		.logout 
		{
			background-color: #ef5350;
			border: none;
			border-radius: 5px;
			color: #FFF;
			cursor: pointer;
			padding: 0 15px;
			text-shadow: none;
			margin-top: 2px;
			margin-left: 160%;
			height: 24px;
		}
	</style>
</head>
<body bgcolor="#dff9fb">
	<header class="topnav">
		<div id="above-header">
			<center><font color="white" size="5">WELCOME !!!! </font></center>
		</div>
		<div class="menu">
			<div id="top-links">
				<li><a href="statistics.php">STATS</a></li>
				<li><a href="search.php">SEARCH</a></li>
				<li><a href="stu_req.php">STUDENT REQUESTS</a></li>
				<li><a href="fac_req.php">FACULTY REQUESTS</a></li>
				<li><a href="modify.php">UPDATE REQUESTS</a></li>
				<li><a href="bus.php">BUS DETAILS</a></li>
				<li><a href="complaint1.php">COMPLAINTS</a></li>
				<li><form action="admin_login.php"><input type="submit" class="logout" value="LOGOUT"></form></li>
			</div>
		</div>
	</header>
	
</body>
</html>