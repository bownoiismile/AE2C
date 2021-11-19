<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $First_Name = $_POST['First_Name'];
	$Last_Name = $_POST['Last_Name'];
	$Middle_Name = $_POST['Middle_Name'];
	$Email = $_POST['Email'];
	$Contact_Number = $_POST['Contact_Number'];
	$Venue = $_POST['Venue'];
	$Event_Type = $_POST['Event_Type'];
	$Sample_Picture = $_POST['Sample_Picture'];
    $Date_Time = $_POST['Date_Time'];
    $Comment = $_POST['Comment'];
        
    // checking empty fields
    if(empty($First_Name) || empty($Last_Name) || empty($Middle_Name) || empty($Email) || empty($Contact_Number) || empty($Venue) || empty($Event_Type) || empty($Sample_Picture) || empty($Date_Time) || empty($Comment)) {                
        if(empty($First_Name)) {
            echo "<font color='red'>First Name field is empty.</font><br/>";
        }
        if(empty($Last_Name)) {
            echo "<font color='red'>Last Name field is empty.</font><br/>";
        }
        if(empty($Middle_Name)) {
            echo "<font color='red'>Middle Name field is empty.</font><br/>";
        }
        if(empty($Email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
		if(empty($Contact_Number)) {
            echo "<font color='red'>Contact Number field is empty.</font><br/>";
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
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO customers(First_Name,Last_Name,Middle_Name,Email,Contact_Number,Venue,Event_Type,Sample_Picture,Date_Time,Comment) VALUES('$First_Name','$Last_Name','$Middle_Name','$Email','$Contact_Number','$Venue','$Event_Type','$Sample_Picture','$Date_Time','$Comment')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>