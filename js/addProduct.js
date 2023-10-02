$(document).ready(function () {
    let selectProduct = $('#productType');
    let productData = $('.product-data');
    let incorrectData = "Please, provide the data of indicated type!";
    let skuInput = $('#sku');
    let nameInput = $('#name');
    let alertDanger = $('#alertDanger'); 


    function handleSelect(){
            productData.hide();
            let target = $(this).find(':selected').data('target');
            $(target).show();
    }
    handleSelect.call(selectProduct);

    selectProduct.on('change', handleSelect );

    $('#product_form').on('submit', function (event) {
        $('.product-data:hidden [name]').removeAttr('name');
    });


    function validatePriceAndAttributes(inputs) {
        let error = false;
        inputs.each(function (index) {
            const value = $(this).val();
            if (value === '') {
                $(this).addClass("is-invalid");
                error = false;
                alertDanger.show().html(incorrectData);
            } else {
                let Regex = /^\d+(\.\d{1,2})?$/;
                if (!Regex.test(value)) {
                    $(this).addClass("is-invalid");
                    error = false;
                    alertDanger.show().html(incorrectData);
                } else {
                    $(this).removeClass("is-invalid");
                    error = true;
                    alertDanger.hide().html('');
                }
            }
        });
        return !error;
    }


    function validateSku(skuInputValue) {
        $.ajax({
            type: "POST",
            url: "actions/checkSku.php",
            data: { id: skuInputValue },
            success: function (data) {
                var result = JSON.parse(data);
                let skuRegex = /^[A-Za-z0-9]+$/;
    
                if (!result && skuRegex.test(skuInputValue)) {
                    alertDanger.hide().html('');
                    skuInput.removeClass("is-invalid");
                } else {
                    alertDanger.show().html(incorrectData);
                    skuInput.addClass("is-invalid");
                }
            }
        });
    }
    

    function validateName(name) {
        if (name === "") {
            alertDanger.show().html(incorrectData);
            nameInput.addClass("is-invalid"); 
        } else {
            let nameRegex = /^[A-Za-z0-9]+$/;
            if (!nameRegex.test(name)) {
                alertDanger.show().html(incorrectData);
                nameInput.addClass("is-invalid"); 
            } else {
                alertDanger.hide().html('');
                nameInput.removeClass("is-invalid"); 
            }
        }
    }
    


    skuInput.on('input', function () {
        validateSku(skuInput.val());
    });

    nameInput.on('input', function () {
        validateName(nameInput.val());
    });

    $('.decimal').on('input', function () {
        validatePriceAndAttributes($(this));
    });
 

    $('form').on('submit', function (e) {
        let vidisbleInputs = $('input:visible');
        let decimalNumbers = $('.decimal:visible');

        validateSku(skuInput.val().trim());
        validateName(nameInput.val().trim());
        validatePriceAndAttributes(decimalNumbers);

        if (vidisbleInputs.hasClass("is-invalid")) {
            e.preventDefault();
            alertDanger.show().html(incorrectData);
        }
    });
});
