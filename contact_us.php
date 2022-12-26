<?php /* 
    $db_hostname="127.0.0.1";
    $db_username="root";
    $db_password="";
    $db_name="tour";

    $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
    if(!$conn)
    {
        echo"Connection Failed:",mysqli_connect_error();
        exit;
    }

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];

    $sql="Insert into contact(Name,Email,Phone,Subject,Message) values ('$name','$email','$phone','$subject','$message')";
    $result=mysqli_query($conn,$sql);
    if(!$result)
    {
        echo "error: ",mysqli_error($conn);
        exit;
    }
    echo "We will contact you soon";
    mysqli_close($conn);
 */

 $name=$_POST['name'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $subject=$_POST['subject'];
 $message=$_POST['message'];


 //Database Connection...
 $conn = new mysqli('localhost','root','','tour');
 if($conn->connect_error)
 {
    die('Connection Failed : '.$conn->connect_error);
 }
 else
 {
    $stmt = $conn->prepare("insert into contact(name, email, phone, subject, message) 
    values(?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $name, $email, $phone, $subject, $message);
    $stmt->execute();
    echo "<h1>Your Contact form has been submitted successfully...</h1>";
    $stmt->close();
    $conn->close();
 }







?> 
