<?php
include 'database.php';
session_start();

// print_r($_POST);

if(isset($_POST['submitSup']))       register();
if(isset($_POST['submitSin']))       signIn();
if(isset($_POST['add']))             addBook();



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
            header('location: ../../home.php'); 
        }
    }

}


function addBook(){
    global $conn;

    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $userId = $_POST['userId'];

    if(!empty($title) && !empty($author) && !empty($category) && !empty($price) && !empty($userId)){

        $result = mysqli_query($conn ,"INSERT INTO `books` (`title`,`author`,`category`,`price`,`admin`) VALUES ('$title','$author','$category','$price','$userId');");

        if($result){
            $_SESSION['added'] = " your book has been added successfully !";
            header('location: ./../../home.php');
        }
}}



function allBooks($x,$y){
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM books");

    while($book = mysqli_fetch_assoc($result)){
        $id=$book['id'];
        $title = $book['title'];
        $author = $book['author'];
        $category = $book['category'];
        $price = $book['price'];
        $userId = $book['admin'];
    
        ?>
       <div class="col-lg-3 bg-white rounded shadow d-flex flex-column mb-4 pb-2">
                
                <?php if($category == 1){
                                        ?>
                    <img class="mx-2 rounded my-2" alt="" width="90%" src="./assets/img/Music.png">                    
                <?php }else if($category == 2){
                                        ?>
                    <img class="m-auto rounded my-2" alt="" width="90%" src="./assets/img/historic.png">
                <?php }else if($category == 3){
                                        ?>
                    <img class="m-auto rounded my-2" alt="" width="90%" src="./assets/img/Sciences.png">
                <?php }else if($category == 4){
                                        ?>
                    <img class="m-auto rounded my-2" alt="" width="90%" src="./assets/img/animal.png">
                    <?php }?>
                    <div class="w-100">
                  <h5 class="text-dark ps-2" style="text-overflow: ellipsis; overflow: hidden;  height: 1.8em; white-space: nowrap; max-width: 25ch;">TITLE : <span class="text-dark"><?php echo "$title" ;?></span></h5>
                  <h5 class="text-dark ps-2" style="text-overflow: ellipsis; overflow: hidden;  height: 1.8em; white-space: nowrap; max-width: 25ch;">AUTHOR : <span class="text-dark"><?php echo "$author" ;?></span></h5>
                  <div class="w-100 d-flex justify-content-between px-3">
                    <h6 class="text-dark">PRICE : <span class="text-info"><?php echo "$price" ;?> $</span></h6>
                    <?php if($userId != $x){
                                ?>
                    <button type="button" onclick="buying('?= $title?>','?= $y?>',?= $id?>,?= $x?>);" data-bs-toggle="modal" data-bs-target="#deleteBook" class="rounded bg-info px-2"><i class="bi bi-cart text-white"></i></button>

                    <?php }?>
                  </div>
                  <button class="w-100 m-auto rounded mt-3 text-info"><a type="button" data-bs-toggle="modal" data-bs-target="#show-book" c onclick="fillBook(<?= $bookId;?>,'<?= $title;?>','<?= $author;?>',<?= $category;?>,<?= $price;?>);">MORE</a></button>
                </div>
              </div>
        <?php    }

}


