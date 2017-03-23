



<!DOCTYPE html>
<html>
<style>
 body {

        background-color: #ffefef;

     } 
 h1{
    color: red;
    font-size: 50px;
    font-weight: bold;
    text-align: center;
    text-shadow: 4px 3px black;

 }

input[type=submit] {
    font-family: Arial;
    font-size: 15px;
    font-weight: bold;
    background-color: #FFC0CB;
    color: black;
    padding: 10px 7px;
    border: none;
    cursor: pointer;
    width: 100%;
    text-align: left;


}
 

</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood Information</title>


    <h1>Blood Information</h1>

<?php include 'header.php'; //This is our navigation bar?>
</head>
<body>

<?php
    
    
    if(isset($_POST['submit'])){

        //`Blood Group`, `Testing Status`, `Blood Status`
        session_start();
        $bloodgroup = $_POST['bloodgroup'];
        $testingstatus = $_POST['testingstatus'];
        $bloodstatus = $_POST['bloodstatus'];
   
        $_SESSION['bloodgroup'] = $bloodgroup;
        $_SESSION['testingstatus'] = $testingstatus;
        $_SESSION['bloodstatus'] = $bloodstatus;

       
        
        

        header("Location: /bankinfo.php"); 
    } 
     ?>


 <form name="myForm" id="BloodForm" method="post" action="/bloodinfo.php">


    <div class="form-group">
        <label for="formInput2">Blood Group:</label>
        <SELECT name="bloodgroup">
    	    <OPTION value="O-" SELECTED> O Negative </OPTION>
    	    <OPTION value="O+"> O Positive </OPTION>
    	    <OPTION value="A-"> A Negative </OPTION>
    	    <OPTION value="A+"> A Positive </OPTION>
    	    <OPTION value="B-"> B Negative </OPTION>
    	    <OPTION value="B+"> B Positive </OPTION>
    	    <OPTION value="AB-"> AB Negative </OPTION>
    	    <OPTION value="AB+"> AB Positive </OPTION>
        </SELECT>
    </div>

    <div class="form-group">
        <label for="formInput3">Testing Status:</label>
        <SELECT name="testingstatus" >
            <OPTION value="Passed" SELECTED>Passed </OPTION>
            <OPTION value="Failed" >Failed</OPTION>
        </SELECT>
    </div>

    <div class="form-group">
        <label for="formInput3">Blood Status:</label>
        <SELECT name="bloodstatus">
            <OPTION value="New" SELECTED> New </OPTION>
            <OPTION value="Used" > Used </OPTION>
            <OPTION value="Old" > Old </OPTION>
            <OPTION value="Tainted" > Tainted </OPTION>
        </SELECT>
    </div>



    <input type="submit" name="submit" value="Submit"></input>

</form>
</body>
</html>
