function fillBook(bookID,bookTitle,bookAuthor,bookCategory,bookPrice){
    // console.log('i am in');
    let bid = document.getElementById('bid');
    let title = document.getElementById('btitle');
    let author = document.getElementById('bauthor');
    let category = document.getElementById('bcategory');
    let price = document.getElementById('bprice');


    bid.value = bookID;
    title.value = bookTitle;
    author.value = bookAuthor;
    category.value = bookCategory;
    price.value = bookPrice;
}

function buying(adminName,bookName,bookID,adminId){
    document.getElementById('book').value = bookName;
    document.getElementById('admin').value = adminName;
    document.getElementById('bookid').value = bookID;
    document.getElementById('adminid').value = adminId;
}


