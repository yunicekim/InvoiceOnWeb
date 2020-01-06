<!--
    This is for handling the form for invoice

    Mar 25, 2019
        Created by Yunice Kim(7940406)
-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Assignment 3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <!-- This is how you link your external JS file to your HTML -->
    <script type="text/javascript" src="js/validate.js"></script>
</head>
<body onload="firstFocus();">
  <h1>MY SHOP</h1>

  <form name="myform" method="Post" onsubmit="return validateForm();"  action="process.php" >

    <label>Name<span id="mandatory">*</span></label>
    <input id="name" placeholder="First Last" type="text" name="name"><br/>

    <label>Email<span id="mandatory">*</span></label>
    <input id="email" placeholder="email@domain.com" type="email" name="email"><br/>

    <label>Phone<span id="mandatory">*</span></label>
    <input id="phone" placeholder="123-123-1234" type="phone" name="phone"><br/>

    <label>Address<span id="mandatory">*</span></label>
    <input id="address" placeholder="unit# street# street" type="address" name="address"><br/>

    <label>City<span id="mandatory">*</span></label>
    <input id="city" placeholder="Kitchener" type="city" name="city"><br/>

    <label>Post Code<span id="mandatory">*</span></label>
    <input id="postcode" placeholder="X9X 9X9" type="postcode" name="postcode"><br/>
    
    <label>Province<span id="mandatory">*</span></label>
    <select name="province" id="province">
        <option value="Alberta">Alberta</option>
        <option value="British Columbia">British Columbia</option>
        <option value="Manitoba">Manitoba</option>
        <option value="New Brunswick">New Brunswick</option>
        <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
        <option value="Nova Scotia">Nova Scotia</option>
        <option value="Ontario" selected>Ontario</option>
        <option value="Prince Edward Island">Prince Edward Island</option>
        <option value="Quebec">Quebec</option>
        <option value="Saskatchewan">Saskatchewan</option>
        <option value="Northwest Territories">Northwest Territories</option>
        <option value="Nunavut">Nunavut</option>
        <option value="Yukon">Yukon</option>
    </select><br/><br/>

    <label>Product 1</label>
    <input id="product1" placeholder="" type="product1" name="product1"><br/>
    
    <label>Product 2</label>
    <input id="product2" placeholder="" type="product2" name="product2"><br/>
    
    <label>Product 3</label>
    <input id="product3" placeholder="" type="product3" name="product3"><br/>
    
    <label>Delivery Time</label>
    <select name="deliveryTime" id="deliveryTime">
        <option value="1 Days">1 Days</option>
        <option value="2 Days">2 Days</option>
        <option value="3 Days" selected>3 Days</option>
        <option value="4 Days">4 Days</option>
    </select>

    <br/><br/>
<!--
    <button onclick="validateForm()">
    submit</button>
    <p id="errors"></p>
-->


    <input type="submit" value="Submit">
    <p id="errors"></p>
  </form>  


</body>
</html>








