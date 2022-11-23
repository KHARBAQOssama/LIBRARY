<?php
include 'database.php';
session_start();

// print_r($_POST);

if(isset($_POST['submitSup']))       register();
if(isset($_POST['submitSin']))       signIn();
if(isset($_POST['add']))             addBook();
if(isset($_POST['update']))          update();
if(isset($_POST['delete']))          delete();
if(isset($_POST['buy']))             buy();
if(isset($_POST['signout']))         signOut();
if(isset($_POST['saveEdit']))         saveEdit();
if(isset($_POST['changeP']))         changePass();




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
    $image = 'book'.rand(1,9).'.jpg';

    if(!empty($title) && !empty($author) && !empty($category) && !empty($price) && !empty($userId)){

        $result = mysqli_query($conn ,"INSERT INTO `books` (`title`,`author`,`category`,`price`,`admin`,`image`) VALUES ('$title','$author','$category','$price','$userId','$image');");

        if($result){
            $_SESSION['added'] = " your book has been added successfully !";
            header ('location: ./../../mybooks.php');
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
        $image = $book['image'];
    
        ?>
       <div class="col-lg-3 col-md-5 col-11 col-sm-5  bg-white rounded d-flex flex-column mb-4 pb-2 book">
                    <img class="m-auto rounded my-2" alt="" width="90%" src="./assets/img/<?php
                    echo "$image"?>">                    
                
                    <div class="w-100">
                  <h5 class="text-dark ps-2" style="text-overflow: ellipsis; overflow: hidden;  height: 1.8em; white-space: nowrap; max-width: 25ch;">TITLE : <span class="text-dark"><?php echo "$title" ;?></span></h5>
                  <h5 class="text-dark ps-2" style="text-overflow: ellipsis; overflow: hidden;  height: 1.8em; white-space: nowrap; max-width: 25ch;">AUTHOR : <span class="text-dark"><?php echo "$author" ;?></span></h5>
                  <div class="w-100 d-flex justify-content-between px-3">
                    <h6 class="text-dark">PRICE : <span class="text-info"><?php echo "$price" ;?> $</span></h6>
                    <?php if($userId != $x){
                                ?>
                    <button type="button" onclick="buying('<?= $title?>','<?= $y?>',<?= $id?>,<?= $x?>);" data-bs-toggle="modal" data-bs-target="#deleteBook" class="rounded bg-info px-2"><i class="bi bi-cart text-white"></i></button>

                    <?php }?>
                  </div>
                </div>
              </div>
        <?php    }

}

function myBooks($x){
    global $conn;

    $count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(*) FROM books WHERE books.admin = '$x'"));
    $result = mysqli_query($conn, "SELECT * FROM books WHERE books.admin = '$x'");

    if($count['count(*)'] == 0){
        $_SESSION['noBooks']= " you have no books for the moment !"
        ?>
        <div class="alert alert-sm alert-warning alert-dismissible fade show">
                        <strong class="text-warning me-2">SORRY!</strong>
                        <?php 
                                echo $_SESSION['noBooks'];
                                unset ($_SESSION['noBooks']);
                                
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
                        </div>
        <?php
    }else{
            while($book = mysqli_fetch_assoc($result)){
                $bookId = $book['id'];
                $title = $book['title'];
                $author = $book['author'];
                $category = $book['category'];
                $price = $book['price'];
                $image = $book['image'];
            
                ?>
                <div class="col-lg-3 col-md-5 col-11 col-sm-5  bg-white rounded d-flex flex-column mb-4 pb-2 book">
                
                <img class="m-auto rounded my-2" alt="" width="90%" src="./assets/img/<?php
                    echo "$image"?>"> 

                    <div class="w-100">
                  <h5 class="text-dark ps-2" style="text-overflow: ellipsis; overflow: hidden;  height: 1.8em; white-space: nowrap; max-width: 25ch;">TITLE : <span class="text-dark"><?php echo "$title" ;?></span></h5>
                  <h5 class="text-dark ps-2" style="text-overflow: ellipsis; overflow: hidden;  height: 1.8em; white-space: nowrap; max-width: 25ch;">AUTHOR : <span class="text-dark"><?php echo "$author" ;?></span></h5>
                  <div class="w-100 d-flex justify-content-between px-3">
                    <h6 class="text-dark">PRICE : <span class="text-info"><?php echo "$price" ;?> $</span></h6>
                  </div>
                  <button class="w-100 m-auto rounded mt-3 text-info" type="button" data-bs-toggle="modal" data-bs-target="#show-book" onclick="fillBook(<?= $bookId;?>,'<?= $title;?>','<?= $author;?>',<?= $category;?>,<?= $price;?>);">MORE</button>
                </div>
              </div>
            <?php    }}
}


function update(){
    global $conn;

    $id =$_POST['bookId'];
    $title =$_POST['title'];
    $author =$_POST['author'];
    $category =$_POST['category'];
    $price =$_POST['price'];

    $sql = "UPDATE `books`
    SET `title` = '$title',`author` = '$author',`category` = '$category',`price` = '$price'
    WHERE `id` = '$id';";

    $result = mysqli_query($conn,$sql);

    if($result){
    
        $_SESSION['updated'] = 'your book informations have been updated successfully';
        header ('location: ./../../mybooks.php');
    }
}


function delete(){
    global $conn;

    $id = $_POST['bookId'];

    $sql = "DELETE FROM `books` WHERE `id`=$id;";

    $result = mysqli_query($conn,$sql);

    if($result){
    
        $_SESSION['deleted'] = 'your book has been deleted successfully';
        header ('location: ./../../mybooks.php');    
    }
}

function buy(){
    global $conn;
    $book=$_POST['book'];
    $admin=$_POST['admin'];
    $aid=$_POST['adminid'];
    $bid=$_POST['bookid'];

    $result = mysqli_query($conn, "INSERT INTO `sales` (`book_name`,`admin_name`) VALUES ('$book','$admin')");
    $result2 = mysqli_query($conn, "UPDATE `books` SET `admin` = '$aid' WHERE books.id = '$bid';");

    header('location: ../../mybooks.php'); 

}

function signOut(){
    session_destroy();
    unset($_SESSION['profile']);
    header('location: signin.php');
}


// --------------------------------------
// -----------statics functions ---------
function sales(){
    global $conn;  

    $result = mysqli_query($conn,"SELECT count(*) FROM `sales`");
    $sales = mysqli_fetch_assoc($result);

    echo $sales['count(*)'];

}

function myBooksCount($x){
    global $conn;
    $count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(*) FROM books WHERE books.admin = '$x'"));

    echo $count['count(*)'];
}

function allBooksCount(){
    global $conn;
    $count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(*) FROM books"));

    echo $count['count(*)'];
}

function categoryCount($x,$y){
    global $conn;
    $count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(*) FROM books WHERE books.admin = '$x' AND books.category = '$y'"));

    echo $count['count(*)'];
}

function categoryAllCount($x){
    global $conn;
    $count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(*) FROM books WHERE books.category = '$x'"));

    echo $count['count(*)'];
}

function adminCount(){
    global $conn;  

    $result = mysqli_query($conn,"SELECT count(*) FROM `admin`");
    $sales = mysqli_fetch_assoc($result);

    echo $sales['count(*)'];
}


function saveEdit(){
    global $conn;
    $email = $_POST['email'];
    $username = $_POST['username'];
    $id = $_SESSION['profile']['id'];

    if($username != '' && $email != '' ){
        if($username != $_SESSION['profile']['username'] || $email != $_SESSION['profile']['email']){
            $sql = "UPDATE `admin`
    SET `email` = '$email',`username` = '$username'
    WHERE `id` = '$id';";
        $result = mysqli_query($conn,$sql);


        if($result){

            $result1= mysqli_query($conn ,"SELECT * FROM admin WHERE admin.id= '$id';");
            $_SESSION['profile'] = mysqli_fetch_assoc($result1);

            $_SESSION['changeProfile'] = 'Your informations has been edited successfully';
            header('location: ./../../home.php');
        }
        }
        else{
            header('location: ./../../home.php');
        }
    }else{
        header('location: ./../../home.php');
    }
}

function changePass(){
    global $conn;

    $oldPass = $_POST['oldWritten'];
    $newPass = $_POST['newPass'];
    $newConf = $_POST['newConf'];
    $id = $_SESSION['profile']['id'];


    if($oldPass == $_SESSION['profile']['password']){
        if($newPass == $newConf && $newPass != ''){
            $sql = "UPDATE `admin`
    SET `password` = '$newPass'
    WHERE `id` = '$id';";
        $result = mysqli_query($conn,$sql);


        if($result){

            $_SESSION['passChanged'] = 'Your password has been changed successfully';
            header('location: ./../../changepass.php');
        }
        }else{
            $_SESSION['wInfo'] = 'there is something wrong with your informations';
            header('location: ./../../changepass.php');
        }
    }else{
        $_SESSION['oldWrong'] = 'the old password is wrong !';
        header('location: ./../../changepass.php');
    }
}