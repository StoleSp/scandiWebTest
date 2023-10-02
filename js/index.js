$(document).ready(function(){
    let deleteBtn = $('#delete-product-btn');
    let checkboxes = $('.delete-checkbox');

    deleteBtn.on('click', function(e){
        
        checkboxStatus = false;

        checkboxes.each(function(){
            if(this.checked){
                checkboxStatus = true;

                return false;
            }
        })
        if(!checkboxStatus){
            e.preventDefault();
        }
    })

})

