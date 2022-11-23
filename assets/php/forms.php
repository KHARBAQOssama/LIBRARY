<div class="modal fade" id="add-book" aria-hidden="true">
    <div class="modal-dialog ">
        
            <form action="./assets/php/script.php" method="post" class="modal-content  col-lg-6 col-md-6 col-sm-12 m-0 sign-form m-auto bg-white text-dark "  >
        
                    <div class="d-flex justify-content-center mb-3">
                        <h3 class="text-info">ADD BOOK
                        </h3>
                    </div>
                    <div class="mb-3  d-flex position-relative">
                        <i class="bi bi-book"></i>
                        <input type="text" name="title" class="form-control rounded-0" id="title" placeholder="The Book Title">
                        <i class="hide" id="i1" title="please fill out this"></i>
                    </div>
                    <div class="mb-3  d-flex position-relative">
                        <input type="hidden" name="userId" value="
                        <?php if (isset($_SESSION['profile'])){ 
                                echo $_SESSION['profile']['id']; }
                       ?>
                        ">
                    </div>
                    <div class="mb-3  d-flex position-relative">
                        <i class="bi bi-pencil"></i>                        
                        <input type="text" name="author" class="form-control rounded-0 " id="author" placeholder="The Author">
                        <i class="hide" id="i2" title="email invalid"></i>
                    </div>
                    <div class="mb-3  d-flex position-relative">
                        <i class="bi bi-list-nested"></i>
                        <select class="form-control rounded-0 border-0 text-dark" name="category">
									<option  class="text-dark" value="" >Category</option>
									<option class="text-dark" value="1">Music</option>
									<option class="text-dark" value="2">Historic</option>
									<option class="text-dark" value="3">Sciences</option>
									<option class="text-dark" value="4">Animals</option>
						</select>
                    </div>
                    <div class="mb-3  d-flex position-relative">
                        <i class="bi bi-tags"></i>
                        <input type="number" name="price" class="form-control rounded-0 " id="price" placeholder="The Price">
                        <i class="hide" id="i4" title="passwords are not the same"></i>
                    </div>
                    <div class="w-100 d-flex justify-content-around align-items-center">
                        <button type="submit" name="add" class="btn btn-primary text-info fw-bold rounded px-5">ADD</button>
                    </div>
            </form>  
    </div>
</div>




<!-- Button trigger modal -->


<!-- Modal -->
<form action="./assets/php/script.php" method="post" class="modal fade" id="deleteBook" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
                            <input type="hidden" name="book" id="book">
                            <input type="hidden" name="admin" id="admin">
                            <input type="hidden" name="bookid" id="bookid">
                            <input type="hidden" name="adminid" id="adminid">
                            <h1 class="text-dark fs-5 text-center my-5">ARE YOU SURE YOU WANT TO BUY THIS BOOK</h1>
        <div class="d-flex justify-content-around my-3 w-75 m-auto">
            <button type="button" class="btn  text-info" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn bg-info text-white fw-bold" name="buy">Buy The Book</button>
        </div>
        
      
    </div>
  </div>
</form>







<div class="modal fade" id="show-book" aria-hidden="true">
    <div class="modal-dialog ">

        <form action="./assets/php/script.php" method="post" class=" modal-content col-lg-6 col-md-6 col-sm-12 m-0 sign-form m-auto bg-white text-dark">
                    <div class="d-flex justify-content-center mb-3">
                        <h3 class="text-info">Book informations
                        </h3>
                    </div>
                    <label class="ms-5 text-dark fw-bold" for="title">Title</label>
                    <div class="mb-3  d-flex position-relative">
                        <i class="bi bi-book"></i>
                        <input type="text" name="title" class="form-control rounded-0" id="btitle" placeholder="The Book Title">
                        <i class="hide" id="i1" title="please fill out this"></i>
                    </div>
                    <div class="mb-3  d-flex position-relative">
                        <input type="hidden" id="bid" name="bookId" value="">
                    </div>
                    <label class="ms-5 text-dark fw-bold" for="author">Author</label>
                    <div class="mb-3  d-flex position-relative">
                        <i class="bi bi-pencil"></i>                        
                        <input type="text" name="author" class="form-control rounded-0 " id="bauthor" placeholder="The Author">
                        <i class="hide" id="i2" title="email invalid"></i>
                    </div>
                    <label class="ms-5 text-dark fw-bold" for="category">Category</label>
                    <div class="mb-3  d-flex position-relative">
                        <i class="bi bi-list-nested"></i>
                        <select class="form-control rounded-0 border-0 text-dark" name="category" id="bcategory">
                                    <option class="text-dark" value="1">Music</option>
                                    <option class="text-dark" value="2">Historic</option>
                                    <option class="text-dark" value="3">Sciences</option>
                                    <option class="text-dark" value="4">Animals</option>
                        </select>
                    </div>
                    <label class="ms-5 text-dark fw-bold" for="price">Price</label>
                    <div class="mb-3  d-flex position-relative">
                        <i class="bi bi-tags"></i>
                        <input type="number" name="price" class="form-control rounded-0 " id="bprice" placeholder="The Price">
                        <i class="hide" id="i4" title="passwords are not the same"></i>
                    </div>
                    <div class="w-100 d-flex justify-content-around align-items-center">
                        <button type="submit" name="delete" class="btn bg-danger border-0 delete-btn text-white rounded px-5">DELETE</button>
                        <button type="submit" name="update" class="btn bg-warning border-0 update-btn text-white rounded px-5">UPDATE</button>
                    </div>
            </form>
        </div>
    </div>






<div class="modal fade" id="show-profile" aria-hidden="true">
    <div class="modal-dialog ">

        <form action="./assets/php/script.php" id="changeInfo" method="post" class=" modal-content col-lg-6 col-md-6 col-sm-12 m-0 sign-form m-auto bg-white text-dark">
                    <div class="d-flex flex-column mb-3">
                        <h3 class="text-info text-center">PROFILE</h3>
                    </div>
                    <label class="ms-5 text-dark fw-bold" for="title">User Name</label>
                    <div class="mb-3  d-flex position-relative">
                        <i class="bi bi-person-circle"></i>

                        <input type="text" name="username" class="form-control rounded-0" id="userName" value="<?php echo $_SESSION['profile']['username'];?>">


                    </div>
                    <div class="mb-3  d-flex position-relative">
                    </div>
                    <label class="ms-5 text-dark fw-bold" for="author">EMAIL</label>
                    <div class="mb-3  d-flex position-relative">
                        <i class="bi bi-at"></i>

                        <input type="email" name="email" class="form-control rounded-0 " id="userEmail" value="<?php echo $_SESSION['profile']['email'];?>">


                    </div>
                    <div class="w-100 d-flex justify-content-around align-items-center mb-3">
                        <button type="button" name="passChange" class=" bg-transparent border-1 delete-btn text-info rounded px-1"><a href="changepass.php">Change Password</a></button>
                        <button type="submit" name="saveEdit" class="bg-info border-0 update-btn text-white rounded p-1">Save Changes</button>
                    </div>
            </form>
        </div>
    </div>



