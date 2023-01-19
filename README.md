# scandiWebTest
checkSku.php PHP code has been moved to the products method named 'checkSKU'.
The problem with input validation was in the 'formValid' variable. As the inputs are filled the 'formValid' variable changes to true and false and if the last input is filled correctly (formValid == true) then the form can be submitted without validating other inputs again.
The save button was submitting the form even though it had event.preventDefault added in js because it was located inside the form and was of type 'submit'(event.preventDefault - on localhost was working fine, but on WebHost does not work). 

Thank you for your feedback! 
