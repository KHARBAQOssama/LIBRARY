<?php
include 'database.php';
session_start();

// print_r($_POST);

if(isset($_POST['submitSup']))       register();
if(isset($_POST['submitSin']))       signIn();


function register(){
    global $conn;
    //CODE HERE
    // let's collect inputs values ;
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $result = mysqli_query($conn ,"SELECT count(*) FROM admin WHERE admin.email= '$email';");
    $row = mysqli_fetch_assoc($result);


    if($row['count(*)'] == 1){


        $_SESSION['error'] = "this email is already exist!";
            header('location: signup.php'); 


    }else if($row['count(*)'] == 0){


    //SQL INSERT
        $result = mysqli_query($conn ,"INSERT INTO `admin` (`username`,`email`,`password`) VALUES ('$username','$email','$password')");

        if($result){
            $_SESSION['message'] = " your account has been created successfully !";
            header('location: signin.php');
        }
    }
}

function signIn(){
    global $conn;
    //CODE HERE
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    
    $result = mysqli_query($conn ,"SELECT count(*) FROM admin WHERE admin.email= '$email';");
    $row = mysqli_fetch_assoc($result);
    if($row['count(*)'] == 0){

        $_SESSION['incorrect'] = "email is not correct !";
            header('location: signin.php'); 
    }else{
        $result1= mysqli_query($conn ,"SELECT * FROM admin WHERE admin.email= '$email';");
        $_SESSION['profile'] = mysqli_fetch_assoc($result1);

        if($_SESSION['profile']['password'] != $password){
            $_SESSION['incorrect'] = "password is not correct !";
            header('location: signin.php'); 
        }else{
            $_SESSION['welcome'] = "welcome back  ";
            header('location: home.php'); 
        }
    }

}