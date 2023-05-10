<?php

    if(isset($_POST['name'])){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            echo "post method is used<br><br>";
        }
        
        $server="localhost";
        $username="root";
        $password="";
        $con=mysqli_connect($server,$username,$password);

        if(!$con){
            die("connection to this database failed due to ".mysqli_connect_error());
        }
        else{
            echo "Success connecting to db.";
        }
        
        $name= $_POST['name'];
        $gender= $_POST['gender'];
        $age= $_POST['age'];
        $email= $_POST['email'];
        $phone= $_POST['phone'];
        $desc= $_POST['desc'] ;

        $sql="INSERT INTO `project_cwh`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
        
        // echo $sql;
        if($con->query($sql)==true){
            echo "Successfully inserted";
        }
        else{
            echo "Error:<br> $con->error";
        }
        $con->close();
    }
?>
