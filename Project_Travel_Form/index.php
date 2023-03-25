<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">

    <title>Welcome to Travel Form</title>
</head>
<body>
    <!-- Back End Code -->
    <div>
    <?php
        $inserted=false;

        //if post method is used and 'name' is initialized then execute these command
        //if not -> and try to execute these commands error would occur
        if(isset($_POST['name'])){
        //     if($_SERVER["REQUEST_METHOD"]=="POST"){
        //         echo "post method is used<br><br>";
        //     }

            //initialize connection variables
            $server="localhost";
            $username="root";
            $password="";
            //connect with database
            $con=mysqli_connect($server,$username,$password);

            // if(!$con){
            //     die("connection to this database failed due to ".mysqli_connect_error());
            // }
            // else{
            //     echo "Success connecting to db.";
            // }
            
            //initialize attribute values of table trip
            $name= $_POST['name'];
            $gender= $_POST['gender'];
            $age= $_POST['age'];
            $email= $_POST['email'];
            $phone= $_POST['phone'];
            $desc= $_POST['desc'] ;

            //apply SQL query to insert data in Database: project_cwh and Table:trip .
            $sql="INSERT INTO `project_cwh`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
            
            // echo $sql;
            if($con->query($sql)==true){
                // echo "Successfully inserted";
                $inserted=true;
            }
            else{
                echo "Error:<br> $con->error";
            }
            //cose connection with database
            $con->close();
        }
    ?>
    </div>

<!-- --------------------------------------------------------------------------- -->
    <img  class="bgimg" src="img/bgimg.jpg"  alt="error loading image...">
    <div class="container">
        <h1>Welcome to CoxsBazar Trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in this trip. </p>
        
        <?php
        //inside php use Single Qutation for class value.
            if($inserted==true){
                echo "<p class='submitMsg'>Thank you for submitting this form.We are happy to see you for joining us for the Coxsbazar trip.</p>";
            }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name " required>

            <input type="number" name="age" id="age" placeholder="Enter your age" required>

            <input type="text" name="gender" id="gender" placeholder="Enter your gender" required>

            <input type="email" name="email" id="email" placeholder="Enter your email" required>

            <input type="phone" name="phone" id="phone" placeholder="Enter your phone" required>

            <textarea name="desc" id="desc" rows="5" cols="30" placeholder="Enter any other information here"></textarea>

            <button class="btn" type="submit" formmethod="post" formaction="index.php">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>
    


    <script src="js/index.js"></script>
    
</body>
</html>