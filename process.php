<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Result</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <!-- This is how you link your external JS file to your HTML -->
    <script type="text/javascript" src="js/form.js"></script>
</head>
<body>

  <h1>MY SHOP'S INVOICE</h1>
  <div class="formData">
      <?php
        function SubTotal($totalPriceOfP1, $totalPriceOfP2, $totalPriceOfP3, $shippingCharge)
        {
          $subTotal = $totalPriceOfP1 + $totalPriceOfP2 + $totalPriceOfP3 + $shippingCharge;

          return $subTotal;
        }

        function CalculateTax($subTotal, $taxRate)
        {
          return $subTotal*$taxRate;
        }

        $errors = '';
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $postcode = $_POST['postcode'];
        $province = $_POST['province'];
        $product1 = $_POST['product1'];
        $product2 = $_POST['product2'];
        $product3 = $_POST['product3'];
        $deliveryTime = $_POST['deliveryTime'];

        if(trim($name) == '')
        {
          $errors .= 'Type your name. <br/>';
        }
        
        if(trim($email) == '')
        {
          $errors .= 'Type your email. <br/>';
        }
        
        if(trim($phone) == '')
        {
          $errors .= 'Type your phone. <br/>';
        }
        
        if(trim($address) == '')
        {
          $errors .= 'Type your address. <br/>';
        }
        
        if(trim($city) == '')
        {
          $errors .= 'Type your city. <br/>';
        }
        
        if(trim($postcode) == '')
        {
          $errors .= 'Type your postcode. <br/>';
        }

        $totalOrderNum = -1;
        if( trim($product1) != "")
        {
            if(!is_numeric($product1))
            {
                $errors .= "Input of product 1 should be a number.<br/>";
                $totalOrderNum = 0;
            }
            else
            {
                $product1 = intval($product1);
                $totalPriceOfP1 = 10*$product1;
                $totalOrderNum++;
            }
        }
        else
        {
          $totalPriceOfP1 = 0;
        }
        
        if( trim($product2) != "")
        {
            if(!is_numeric($product2))
            {
                $errors .= "Input of product 2 should be a number.<br/>";
                $totalOrderNum = 0;
            }
            else
            {
                $product2 = intval($product2);
                $totalPriceOfP2 = 20*$product1;
                $totalOrderNum++;
            }
        }
        else
        {
          $totalPriceOfP2 = 0;
        }

        if( trim($product3) != "")
        {
            if(!is_numeric($product3))
            {
                $errors .= "Input of product 1 should be a number.<br/>";
                $totalOrderNum = 0;
            }
            else
            {
                $product3 = intval($product3);
                $totalPriceOfP3 = 30*$product1;
                $totalOrderNum++;
            }
        }
        else
        {
          $totalPriceOfP3 = 0;
        }
 
        if( $totalOrderNum == -1 )
        {
            $errors .= "Buy at least one product.<br/>";
        }

        if( $errors != '')
        {
          echo $errors;
        }
        else
        {
          switch($deliveryTime)
          {
            case "1 Days" : 
              $shippingCharge = 30; 
              break;
            case "2 Days" : 
              $shippingCharge = 25; 
              break;
            case "3 Days" : 
              $shippingCharge = 20; 
              break;
            case "4 Days" : 
              $shippingCharge = 15; 
              break;
            default :
              break;
          }

          $subTotal = SubTotal($totalPriceOfP1, $totalPriceOfP2, $totalPriceOfP3, $shippingCharge);

          switch($province)
          {
            case 'Alberta':
              $taxRate = 0.05;
              break;
            case 'British Columbia':
              $taxRate = 0.12;
              break;
            case 'Manitoba':
              $taxRate = 0.13;
              break;
            case 'New Brunswick':
              $taxRate = 0.15;
              break;
            case 'Newfoundland and Labrador':
              $taxRate = 0.15;
              break;
            case 'Northwest Territories':
              $taxRate = 0.05;
              break;
            case 'Nova Scotia':
              $taxRate = 0.15;
              break;
            case 'Nunavut':
              $taxRate = 0.05;
              break;
            case 'Ontario':
              $taxRate = 0.13;
              break;
            case 'Prince Edward Island':
              $taxRate = 0.15;
              break;
            case 'Quebec':
              $taxRate = 0.1498;
              break;
            case 'Saskatchewan':
              $taxRate = 0.11;
              break;
            case 'Yukon':
              $taxRate = 0.05;
              break;
            default:
              $taxRate = -1;
              break;
          }

          $tax = CalculateTax($subTotal, $taxRate);

          $total = $subTotal + $tax;
    ?>

    <label>Name</label><label class="colon">:</label>
    <?php 
      echo "<span class='rightAlign'>$name</span>";
    ?>
    <br/>
    
    <label>Email</label><label class="colon">:</label>
    <?php 
      echo "<span class='rightAlign'>$email</span>";
    ?>
    <br/>

    <label>Phone</label><label class="colon">:</label>
    <?php 
      echo "<span class='rightAlign'>$phone</span>";
    ?>
    <br/>

    <label class="alignTop">Delivery Address</label><label class="colonAlignTop">:</label>
    <?php 
      echo "<span class='rightAlign'>$address,<br/>$city,<br/>$province, $postcode</span>";
    ?>

    <?php
      if($product1 != "")
      {
        echo "<label>$product1 of Product 1 @$10.00</label><label class='colon'>:</label>";
        echo "<span class='rightAlign'>$$totalPriceOfP1</span>";
      }

      if($product2 != "")
      {
        echo "<label>$product2 of Product 2 @$20.00</label><label class='colon'>:</label>";
        echo "<span class='rightAlign'>$$totalPriceOfP2</span>";
      }

      if($product3 != "")
      {
        echo "<label>$product3 of Product 3 @$30.00</label><label class='colon'>:</label>";
        echo "<span class='rightAlign'>$$totalPriceOfP3</span>";
      }
    ?>

  <label>Shipping Charges</label><label class="colon">:</label>
    <?php 
      echo "<span class='rightAlign'>$$shippingCharge</span>";
    ?>
  
  <label>Sub Total</label><label class="colon">:</label>
    <?php 
      // $subTotal = number_format($subTotal, 2);
      echo "<span class='rightAlign'>$" . number_format($subTotal, 2) . "</span>";
    ?>

  <label>Taxes @ <?php echo $taxRate*100; ?>%</label><label class="colon">:</label>
    <?php 
      echo "<span class='rightAlign'>$".number_format($tax, 2)."</span>";
    ?>

  <label>Total</label><label class="colon">:</label>
    <?php 
      echo "<span class='rightAlign'>$".number_format($total, 2)."</span>";
    ?>
  </div>

    <?php
    }
    ?>

</body>
</html>








