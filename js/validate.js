function firstFocus()
{
    //in order to give a focus to the first text element when the form loading
    var focus1 = document.getElementById('name');
    focus1.focus();
}

//When submitting, validateForm() is executed
function validateForm()
{
    var errors = ''; // we will use this to store any error messages.
    var focus = "";
    
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var address = document.getElementById('address').value;
    var city = document.getElementById('city').value;
    var postcode = document.getElementById('postcode').value;
    //var province = document.getElementById('province').value;
    var product1 = document.getElementById('product1').value;
    var product2 = document.getElementById('product2').value;
    var product3 = document.getElementById('product3').value;
    //var deliveryTime = document.getElementById('deliveryTime').value;
    
    if( name.trim() == "")
    {
        errors += "Type your name.<br/>";

        if (focus == "")
        {
            focus = "name";
        }
    }

    if( email.trim() == "")
    {
        errors +="Type your email.<br/>";

        if (focus == "")
        {
            focus = "email";
        }
    }

    if( phone.trim() == "")
    {
        errors +="Type your phone.<br/>";

        if (focus == "")
        {
            focus = "phone";
        }
    }
    else
    {
        // Writing a regular expression to validate Phone
        // Phone format example is 123-123-1234 or 123.123.1234
        // or (123)-(123)-(1234) or (123).(123).(1234) or 1231231234
        // or 123/123/1234 or (123)/123/1234
        // or (123).123.1234 or (123)-123-1234 and some more that satisfy the rules

        var phoneregex = /^\(?(\d{3})\)?[\.\-\/\s]?(\d{3})[\.\-\/\s]?(\d{4})$/;

        // Testing if the phone fits the pattern
        if(phoneregex.test(phone)){ // Returns true if phone satisfies the pattern
            errors += ''; // No error in phone
        }
        else{
            // Error found in phone; concatenating to the existing list of errors
            errors += 'Phone is not in correct format <br/>'; 
            
            if (focus == "")
            {
                focus = "phone";
            }
        }
 
    }

    if( address.trim() == "")
    {
        errors +="Type your address.<br/>";

        if (focus == "")
        {
            focus = "address";
        }
    }

    if( city.trim() == "")
    {
        errors +="Type your city.<br/>";

        if (focus == "")
        {
            focus = "city";
        }
    }

    if( postcode.trim() == "")
    {
        errors +="Type your postcode.<br/>";

        if (focus == "")
        {
            focus = "postcode";
        }
    }
    else
    {
        // Writing a regular expression to validate Post Code
        // Post code format example is N2E 1A6

        var postcoderegex = /^[A-Z][0-9][A-Z]\s[0-9][A-Z][0-9]$/;

        // Converting the postcode to uppercase before testing
        postcode = postcode.toUpperCase(); 
        //alert(postcode);

        // Testing if the postcode fits the pattern
        if(postcoderegex.test(postcode)){ // Returns true if postcode satisfies the pattern
            errors += ''; // No error in postcode
        }
        else{
            errors += 'Post code is not in correct format <br/>'; // Error found in postcode
          
            if (focus == "")
            {
                focus = "postcode";
            }
        }
    }

    var totalNum = -1;
    if( product1.trim() != "")
    {
        if(isNaN(product1))
        {
            errors += "Input of product 1 should be a number.<br/>";
            totalNum = 0;
           
            if (focus == "")
            {
                focus = "product1";
            }
    
        }
        else
        {
            product1 = parseInt(product1);
            totalNum++;
        }
    }
    
    if( product2.trim() != "")
    {
        if(isNaN(product2))
        {
            errors += "Input of product 2 should be a number.<br/>";
            totalNum = 0;
            
            if (focus == "")
            {
                focus = "product2";
            }
        }
        else
        {
            product2 = parseInt(product2);
            totalNum++;
        }
    }  

    if( product3.trim() != "")
    {
        if(isNaN(product3))
        {
            errors += "Input of product 3 should be a number.<br/>";
            totalNum = 0;

            if (focus == "")
            {
                focus = "product3";
            }
        }
        else
        {
            product3 = parseInt(product3);
            totalNum++;
        }
    }    

    if( totalNum == -1 )
    {
        errors += "Buy at least one product.<br/>";

        if (focus == "")
        {
            focus = "product1";
        }
    }

    // Comparing the errors string if any errors were found.
    if(errors.trim() != ''){ // trim is the function that trims any empty spaces from front or back
        // Showing the errors
        document.getElementById('errors').innerHTML = errors + '-- Please fix the above errors --';
        document.getElementById('errors').style.border = '2px dashed white';

        if (focus != "")
        {
            document.getElementById(focus).focus();
            document.getElementById(focus).select();
        }

    }
    else{
        // If no errors found

        return true;
    }

    return false;
}

