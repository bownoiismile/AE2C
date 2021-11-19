<?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $First_Name=$_POST['First_Name'];
	$Last_Name=$_POST['Last_Name'];
	$Middle_Name=$_POST['Middle_Name'];
	$Email=$_POST['Email'];
	$Contact_Number=$_POST['Contact_Number'];
	$Venue=$_POST['Venue'];
	$Event_Type=$_POST['Event_Type'];
	$Sample_Picture=$_POST['Sample_Picture'];
	$Date_Time=$_POST['Date_Time'];
    $Comment=$_POST['Comment'];   
    
    // checking empty fields
    if(empty($First_Name) || empty($Last_Name) || empty($Middle_Name) || empty($Email) || empty($Contact_Number) || empty($Venue) || empty($Event_Type) || empty($Sample_Picture) || empty($Date_Time) || empty($Comment)) {            
        if(empty($First_Name)) {
            echo "<font color='red'>First_Name field is empty.</font><br/>";
        }
		if(empty($Last_Name)) {
            echo "<font color='red'>Last_Name field is empty.</font><br/>";
        }
		if(empty($Middle_Name)) {
            echo "<font color='red'>Middle_Name field is empty.</font><br/>";
        }
		if(empty($Email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
		if(empty($Contact_Number)) {
            echo "<font color='red'>Contact_Number field is empty.</font><br/>";
        }
		if(empty($Venue)) {
            echo "<font color='red'>Venue field is empty.</font><br/>";
        }
        if(empty($Event_Type)) {
            echo "<font color='red'>Event Type field is empty.</font><br/>";
        }
		if(empty($Sample_Picture)) {
            echo "<font color='red'>Picture Type field is empty.</font><br/>";
        }
        if(empty($Date_Time)) {
            echo "<font color='red'>Date field is empty.</font><br/>";
        }
        if(empty($Comment)) {
            echo "<font color='red'>Comment field is empty.</font><br/>";
        }        
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE customers SET First_Name='$First_Name',Last_Name='$Last_Name',Middle_Name='$Middle_Name',Email='$Email',Contact_Number='$Contact_Number',Venue='$Venue',Event_Type='$Event_Type',Sample_Picture='$Sample_Picture',Date_Time='$Date_Time',Comment='$Comment' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM customers WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $First_Name = $res['First_Name'];
    $Last_Name = $res['Last_Name'];
    $Middle_Name = $res['Middle_Name'];
	$Email = $res['Email'];
	$Contact_Number = $res['Contact_Number'];
	$Venue = $res['Venue'];
	$Event_Type = $res['Event_Type'];
	$Sample_Picture = $res['Sample_Picture'];
	$Date_Time = $res['Date_Time'];
	$Comment = $res['Comment'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>First Name</td>
                <td><input type="text" name="First_Name" value="<?php echo $First_Name;?>"></td>
            </tr>
			<tr> 
                <td>Last Name</td>
                <td><input type="text" name="Last_Name" value="<?php echo $Last_Name;?>"></td>
            </tr>
			<tr> 
                <td>Middle Name</td>
                <td><input type="text" name="Middle_Name" value="<?php echo $Middle_Name;?>"></td>
            </tr>
			<tr> 
                <td>Email</td>
                <td><input type="text" name="Email" value="<?php echo $Email;?>"></td>
            </tr>
			<tr> 
                <td>Contact Number</td>
                <td><input type="text" name="Contact_Number" value="<?php echo $Contact_Number;?>"></td>
            </tr>
			<tr> 
                <td>Venue</td>
                <td><input type="text" name="Venue" value="<?php echo $Venue;?>"></td>
            </tr>
			<tr> 
                <td>Event Type</td>
                <td>
					<select id="Event_Type" name="Event_Type" value="<?php echo $Event_Type;?>">
						<option value="Birthday">Birthday</option>
						<option value="Reunion">Reunion</option>
						<option value="Wedding">Wedding</option>
						<option value="School Events">School Events</option>
					</select>
				</td>
            </tr>
			<tr> 
                <td>Picture Type</td>
                <td>
					<select id="Sample_Picture" name="Sample_Picture" value="<?php echo $Sample_Picture;?>">
						<option value="Sample 1">Sample 1</option>
						<option value="Sample 2">Sample 2</option>
						<option value="Sample 3">Sample 3</option>
						<option value="Sample 4">Sample 4</option>
						<option value="Sample 5">Sample 5</option>
						<option value="Sample 6">Sample 6</option>
					</select>
				</td>
            </tr>
            <tr> 
                <td>Date</td>
                <td><input type="text" name="Date_Time" value="<?php echo $Date_Time;?>"></td>
            </tr>
            <tr> 
                <td>Comment</td>
                <td><input type="text" name="Comment" value="<?php echo $Comment;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>