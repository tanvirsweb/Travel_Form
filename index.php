<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>">
    <!-- 
    PHP css changes not applied?? 
    ctrt+F5 to reresh

    Most probably the file is just being cached by the server. You could either disable cache (but remember to enable it when the site goes live), or modify href of your link tag, so the server will not load it from cache.
    If your page is created dynamically by some language like php, you could add some variable at the end of the href value, like:    
    <link rel="stylesheet" type="text/css" href="css/yourStyles.css?< ?php echo time(); ?>" />
    That will add the current timestamp on the end of a file path, so it will always be unique and never loaded from cache. -->

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
            $gender= $_POST['gender'];//$_post['name'] name=? not id-> input/textarea/selec's
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
    <!-- <img  class="bgimg" src="img/bgimg.jpg"  alt="error loading image..."> -->
    <div class="container text-white">
        <h1>Welcome to CoxsBazar Trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in this trip. </p>
        
        <?php
        //inside php use Single Qutation for class value.
            if($inserted==true){
                echo "<p class='submitMsg'>Thank you for submitting this form.We are happy to see you for joining us for the Coxsbazar trip.</p>";
            }
        ?>
  
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-11 m-auto">
            <form action="index.php" method="post">
            <input class="form-control mb-2" type="text" name="name" id="name" placeholder="Enter your name " required>

            <input class="form-control mb-2" type="number" name="age" id="age" placeholder="Enter your age" required>

            <!-- <input class="form-control mb-2" type="text" name="gender" id="gender" placeholder="Enter your gender" required> -->

            <select class="form-control mb-2" name="gender">
                <option>Male</option>
                <option>Female</option>
                <option>Ohter</option>
            </select>

            <input class="form-control mb-2" type="email" name="email" id="email" placeholder="Enter your email" required>

            <input class="form-control mb-2" type="phone" name="phone" id="phone" placeholder="Enter your phone" required>

            <textarea class="form-control mb-2" name="desc" id="desc" rows="5" cols="30" placeholder="Enter any other information here"></textarea>

            <!-- <div class="d-flex justify-content-center">
                <button class="btn btn-primary" type="submit" formmethod="post" formaction="index.php">Submit</button>
            </div> -->
            <!-- text-center: makes button(inline tag) center 
            but m-auto won't make button center as it's inline.margin:auto centers only block elements -->
            <button class="btn btn-primary mx-auto d-block" type="submit" formmethod="post" formaction="index.php">Submit</button>
            
            <!-- <button class="btn btn-primary mt-2 mx-auto d-block" type="reset">Reset</button> -->
        </form>
            </div>
        </div>
    </div>
    <script src="js/index.js"></script>
    
</body>
</html>