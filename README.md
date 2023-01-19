# scandiWebTest
checkSku.php PHP code has been moved to products method named 'checkSKU'.
The problem with input validation was in the 'formValid' variable. As the inputs are filled the 'formValid' variable is changing to true and false and if the last input
is filled properly(formValid == true) then the form can be submitted without validating other inputs again.
The save button was submitting the form even though it had event.preventDefault added in js because it was located inside the form and was of type 'submit'.

Thank you for your feedback! 
