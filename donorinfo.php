



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

 div [class=form-group]{

    font-weight: bold;
    }

 
 input[type=text]{
    font-size: 15px;
    border: 1px solid red;
    width: 100%;
    padding: 12px 20px;
    margin: 16px 0;
    display: inline-block;
    border: 3px solid #ccc;

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
    <title>Donor Information</title>

   

    <h1>Donor Information</h1>
    <?php include 'header.php'; //This is our navigation bar?>


</head>

<body>
   
<?php
    
    

    if(isset($_POST['submit'])){
        session_start();


        $donarid  = $_POST['donarid'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];
        $date = $_POST['date'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $_SESSION['name'] = $name;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['donarid'] = $donarid;
        $_SESSION['age'] = $age;
        $_SESSION['city'] = $city;
        $_SESSION['phone'] = $phone;
        $_SESSION['email'] = $email;
        $_SESSION['date'] = $date;

        

        header("Location: /bloodinfo.php"); 
    
    } 
?>
    
    

     <form id="DonatorForm" method="post" action="/donorinfo.php">
                <div class="form-group">
                    <label for="formInput2">Donar ID:</label>
                    <input type="text" class="form-control" id = "id" name="donarid" placeholder="Enter ID"/>
                </div>
                <div class="form-group">
                    <label for="formInput4">Name:</label>
                    <input type="text" class="form-control" id = "name" name="name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="formInput4">Last Name:</label>
                    <input type="text" class="form-control" id = "lname" name="lastname" placeholder="Enter Last Name">
                </div>  
                <div class="form-group">
                    <label for="formInput4">Age:</label>
                    <input type="text" class="form-control" id = "age" name="age" placeholder="Enter Age">
                </div>

                <div class="form-group">
                    <label for="formInput4">City:</label>
                    <input type="text" class="form-control" id = "city" name="city" placeholder="Enter City">
                </div>
                <div class="form-group">
                    <label for="formInput4">Phone:</label>
                    <input type="text" class="form-control" id = "ph" name="phone" placeholder="Enter Phone#">
                </div>
                <div class="form-group">
                    <label for="formInput4">Date (mmddyyyy): </label>
                    <input type="text" class="form-control" id = "date" name="date" placeholder="Enter Date">
                </div>
                <div class="form-group">
                    <label for="formInput4">Email:</label>
                    <input type="text" class="form-control" id = "ph" name="email" placeholder="Enter Email">
                </div>
                
                <input type="submit" name="submit" value="Submit"></input>

    </form>
</body>

</html>