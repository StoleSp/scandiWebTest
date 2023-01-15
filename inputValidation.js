let saveBtn = document.getElementById("save-product-btn");
let alertDanger = document.getElementById("alert");
let skuInput = document.getElementById("sku");
let nameInput = document.getElementById("name");
let priceInput = document.getElementById("price");
let incorrectData = "Please, provide the data of indicated type!";
let formValid = true;

function checkSku() {
    let skuInputValue = skuInput.value;
    $ajax = $.ajax({
        type: "POST",
        url: "checkSku.php",
        data: { id: skuInputValue },
        success: function (data) {
            //here its checked if there are returned data.
            if (!data) {
                alertDanger.style.display = "none";
                alertDanger.innerHTML = '';
                formValid = true;
                skuInput.classList.remove("is-invalid");
            } else {
                alertDanger.style.display = "block";
                alertDanger.innerHTML = incorrectData;
                formValid = false;
                skuInput.classList.add("is-invalid");
            }
        }
    });
}


function validateSKU() {
    let sku = skuInput.value;
    if (sku === "") {
        skuInput.classList.add("is-invalid");
        formValid = false;
    } else {
        let skuRegex = /^[A-Za-z0-9]+$/;
        if (!skuRegex.test(sku)) {
            skuInput.classList.add("is-invalid");
            formValid = false;
            alertDanger.style.display = "block";
            alertDanger.innerHTML = incorrectData;
        } else {
            skuInput.classList.remove("is-invalid");
            formValid = true;
            alertDanger.style.display = "none";
            alertDanger.innerHTML = '';
        }
    }
}

function validateName() {
    let name = nameInput.value;
    if (name === "") {
        nameInput.classList.add("is-invalid");
        formValid = false;
    } else {
        let nameRegex = /^[A-Za-z ]+$/;
        if (!nameRegex.test(name)) {
            nameInput.classList.add("is-invalid");
            formValid = false;
            alertDanger.style.display = "block";
            alertDanger.innerHTML = incorrectData;
        } else {
            nameInput.classList.remove("is-invalid");
            formValid = true;
            alertDanger.style.display = "none";
            alertDanger.innerHTML = '';
        }
    }
}


function validatePrice() {
    let price = priceInput.value;
    if (price === "") {
        priceInput.classList.add("is-invalid");
        formValid = false;
    } else {
        let priceRegex = /^\d+(\.\d{1,2})?$/;
        if (!priceRegex.test(price)) {
            priceInput.classList.add("is-invalid");
            formValid = false;
            alertDanger.style.display = "block";
            alertDanger.innerHTML = incorrectData;
        } else {
            priceInput.classList.remove("is-invalid");
            formValid = true;
            alertDanger.style.display = "none";
            alertDanger.innerHTML = '';
        }
    }
}

function validateSelectableInputs(inputs) {
    inputs.forEach((input) => {
        const value = input.value;
        if (value === '') {
            input.classList.add("is-invalid");
            formValid = false;
        } else {
            let heightRegex = /^\d+(\.\d{1,2})?$/;
            if (!heightRegex.test(value)) {
                input.classList.add("is-invalid");
                formValid = false;
                alertDanger.style.display = "block";
                alertDanger.innerHTML = incorrectData;
            } else {
                input.classList.remove("is-invalid");
                formValid = true;
                alertDanger.style.display = "none";
                alertDanger.innerHTML = '';
            }
        }
    });
}




skuInput.addEventListener("input", checkSku)
skuInput.addEventListener("input", validateSKU);
nameInput.addEventListener("input", validateName);
priceInput.addEventListener("input", validatePrice);




saveBtn.addEventListener("click", function (event) {
    event.preventDefault();
    checkSku();
    validateSKU();
    validateName();
    validatePrice();
    validateSelectableInputs(selectableInputs.inputs);
    if (formValid) {
        document.getElementById("product_form").submit();
        $ajax.abort();
    }
});
