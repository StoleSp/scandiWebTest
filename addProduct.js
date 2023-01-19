
let cancelBtn = document.getElementById("cancel-product-btn");
let inputType = document.getElementById('productType');
let inputContainer = document.getElementById('inputContainer');
let selectableInputs = {};

function handleCancelBtn(event) {
  event.preventDefault();
  location.href = 'index.php'
}
cancelBtn.addEventListener("click", handleCancelBtn);


const inputElements = {
  Furniture: () => {
    const heightLabel = document.createElement('label')
    heightLabel.innerText = 'Height:';
    heightLabel.setAttribute("for", "height")

    const height = document.createElement('input');
    height.type = 'text';
    height.required;
    height.name = 'height';
    height.id = 'height';
    height.setAttribute("class", "form-control");

    const widthLabel = document.createElement('label')
    widthLabel.innerText = 'Width:';
    widthLabel.setAttribute("for", "width")

    const width = document.createElement('input');
    width.type = 'text';
    width.name = 'width';
    width.id = 'width';
    width.setAttribute("class", "form-control");

    const lengthLabel = document.createElement('label')
    lengthLabel.innerText = 'Length:';
    lengthLabel.setAttribute("for", "length")

    const length = document.createElement('input');
    length.type = 'text';
    length.name = 'length';
    length.id = 'length';
    length.setAttribute("class", "form-control");

    return [heightLabel, height, widthLabel, width, lengthLabel, length];
  },
  Book: () => {
    const weightLabel = document.createElement('label')
    weightLabel.innerText = 'Weight(kg):';
    weightLabel.setAttribute("for", "weight")

    const weight = document.createElement('input');
    weight.type = 'text';
    weight.name = 'weight';
    weight.id = 'weight';
    weight.setAttribute("class", "form-control");

    return [weightLabel, weight];
  },
  DVD: () => {
    const sizeLabel = document.createElement('label')
    sizeLabel.innerText = 'Size(mb):';
    sizeLabel.setAttribute("for", "size")

    const size = document.createElement('input');
    size.type = 'text';
    size.name = 'size';
    size.id = 'size';
    size.setAttribute("class", "form-control");

    return [sizeLabel, size];
  },
};


function onLoad() {
  inputType.value = "Furniture";
  inputType.dispatchEvent(new Event('change'));
}

window.onload = onLoad;


let validateDimensions = false;

inputType.addEventListener('change', (event) => {
  inputContainer.innerHTML = '';
  validateDimensions = false;
  // console.log('changeVal:',validateDimensions)
  const selectedValue = event.target.value;
  const inputs = inputElements[selectedValue]();
  formValidDimensions = Array(inputs.length).fill(true);
  inputs.forEach((input) => inputContainer.appendChild(input));
  let inputContainerInputs = inputContainer.querySelectorAll("input");
  selectableInputs.inputs = inputContainerInputs;
  selectableInputs.inputs.forEach((input) => {
    input.addEventListener("input", () => {
      validateSelectableInputs(selectableInputs.inputs);
      validateDimensions = formValidDimensions.every(element => element === true);
      // console.log('inputval:',validateDimensions)
    });
    
  });

});




