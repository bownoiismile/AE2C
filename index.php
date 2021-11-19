<?php
//including the database connection file
include_once("config.php");
 
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM customers ORDER BY id DESC"); // using mysqli_query instead
?>
 
<html>
<head>    
    <title>Admin</title>
</head>
 
<body>
    <a href="AE2C.html">Visit Page</a><br/><br/>
 
    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>First Name</td>
			<td>Last Name</td>
			<td>Middle Name</td>
			<td>Email</td>
			<td>Contact Number</td>
            <td>Venue</td>
			<td>Event Type</td>
			<td>Picture Type</td>
            <td>Date & Time</td>
            <td>Comment</td>
			<td>Update</td>
        </tr>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['First_Name']."</td>";
            echo "<td>".$res['Last_Name']."</td>";
            echo "<td>".$res['Middle_Name']."</td>";  
			echo "<td>".$res['Email']."</td>";
			echo "<td>".$res['Contact_Number']."</td>";
			echo "<td>".$res['Venue']."</td>";
			echo "<td>".$res['Event_Type']."</td>";
			echo "<td>".$res['Sample_Picture']."</td>";
			echo "<td>".$res['Date_Time']."</td>";
			echo "<td>".$res['Comment']."</td>";
            echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>
</body>
</html>