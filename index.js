let addBtn = document.getElementById("add-product-btn");

function handleAddBtn(event){
event.preventDefault();
 location.href='addProduct.php'
} 

addBtn.addEventListener("click",handleAddBtn);