 <body bgcolor="53436A">
 <font color="White"> <center>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<center>
<table style="color:White;">
 <tr>
<td> </td><td><h2>Get Patient Information</h2></td>
</tr>
<tr>
<tr>
<td> <font color="White"> Patient Phone number</font> </td><td><input class="textbox" type="tel" name="phone" maxlength="10" value=""/>  </td>
</tr><tr>
<td></td><td><center><input class="classname" type="submit" name="run" value="Get Patient data"/></center></td></center>
</tr>
</table> 
<style> 
.textbox { 
height: 25px; 
width: 275px; 
border: 1px solid #848484; 
padding-left: 30px; 
} 
</style> 

<style type="text/css">
.classname {
	background-color:#53436A;
	-webkit-border-top-left-radius:0px;
	-moz-border-radius-topleft:0px;
	border-top-left-radius:0px;
	-webkit-border-top-right-radius:0px;
	-moz-border-radius-topright:0px;
	border-top-right-radius:0px;
	-webkit-border-bottom-right-radius:0px;
	-moz-border-radius-bottomright:0px;
	border-bottom-right-radius:0px;
	-webkit-border-bottom-left-radius:0px;
	-moz-border-radius-bottomleft:0px;
	border-bottom-left-radius:0px;
	text-indent:0;
	border:1px solid #dcdcdc;
	display:inline-block;
	color:White;
	font-family:arial;
	font-size:15px;
	font-weight:bold;
	font-style:normal;
	height:50px;
	line-height:50px;
	width:126px;
	text-decoration:none;
	text-align:center;
}.classname:hover {
	background-color:#53537A;
}.classname:active {
	position:relative;
	top:1px;
}</style>
<?php
/*
?phone=
*/
    // include db handler
    require_once 'include/DB_update.php';
    
	if(empty($_POST["phone"]) )
		echo "";//Error: in input data\n";
	else{
		$db = new DB_update();
		$resultarray = $db->get_record($_POST["phone"]);
		$entry=1;
		echo "<table style=\"border:1px solid black;color:White\">";
		//Display column names
		if (mysql_num_rows($resultarray) > 0) {
			$numfields = mysql_num_fields($resultarray);
			for ($i=0; $i < $numfields; $i++)
				echo '<th>'.mysql_field_name($resultarray, $i).'</th>'; 
		}
		//Display Entries
		while ($row = mysql_fetch_array($resultarray))
		{
			echo "<tr>";
			for($i=0; $i<$numfields; $i++)         
			{    
			//foreach($row as $key => $value){ 
					echo '<td>'.$row[$i].'</td>'; 
			} 
			echo "</tr>";
			$entry++;
		}
		echo "</table>";
	}
	?>
</center>
</font>