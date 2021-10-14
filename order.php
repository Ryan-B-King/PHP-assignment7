<?php

    //Variables initialized
    $name = $_POST['name'];             // pulls name from html
    $phoneNumber = $_POST['phone'];     // pulls phone number from html
    $toppings = "";                     // create global toppings variable 
    $msg = "";                          // create global msg variable
    $count ="";                         // create global count variable
    
    //Trimmed Name Variable
    $name = htmlspecialchars(trim($name));
    
    // IF Statement to handle if checkbox are marked or not on order form.
    if(isset($_POST['topping'])) {
        $toppings = $_POST['topping'];      // assign toppings variable with array

        $count = count($toppings);          // counts # of selected toppings

        $cost = 7.95 + ( $count * 1.00);    // calculates cost of pizza
        $cost = number_format($cost, 2);    // formats cost to float with two decimal places

        // message confirming total ordered toppings
        $msg  = "You have ordered the following <b>$count</b> toppings:<br>\n\r";  

        // FOREACH loop that reiterates through array and adds to message to display for each topping
        foreach($toppings as $topping_checked) {
            $msg .= "\t\t\t<p class='top'>$topping_checked</p>\n\r"; 
        }

        // additional message that states customer info and cost of pizza
        $msg .= "\t\t\t<p>Your name is <b>$name</b>.  Your phone number is <b>$phoneNumber</b>.</p>\n\r";
        $msg .= "\t\t\t<p id='cost'>The total cost is <b id='price'>\$$cost</b>.</p>\n\r";

    } else {  // handles customers that do not select toppings


        $cost = 7.95;                       // calculates cost of pizza
        $cost = number_format($cost, 2);    // formats cost to float with two decimal places

        // messge that states customer will be getting a cheese pizza
        $msg = "<p>You did not order any extra topping so you will receive our traditional cheese pizza.</p>\n\r";

        // additional message that states customer info and cost of pizza
        $msg .= "\t\t\t<p>Your name is <b>$name</b>.  Your phone number is <b>$phoneNumber</b>.</p>\n\r";
        $msg .= "\t\t\t<p id='cost'>The total cost is <b id='price'>\$$cost</b>.</p>\n\r";
    };

    // testing code for value checking
    // print_r($name);
    // print_r($phoneNumber);
    // print_r($toppings);
    // print_r($count);

?>

<!DOCTYPE html> <!-- Ryan King -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>

    <style>
        body {
            font-family: arial;
            font-size: 1.25em;
            background-color: #000;
            background-image: url(https://image.freepik.com/free-photo/crop-pizza-black_23-2147749510.jpg);
            background-repeat: no-repeat;          
            background-size: 100%;
            margin: 0;
            padding: 0;
        }
     
        div {
            width: 900px;
            height: auto;
            margin: 75px 0 0 150px;
            padding: 0;
            text-align: center;
        }

        main {
            text-align: left;
            border: 3px solid white;
            /* box-shadow: 0 0 20px 1px grey; */
            padding: 0 20px;
            /* margin: 50px 0 50px 50px; */
            background-color: aliceblue;
        }   

        h1 {
            
            font-size: 3em;
        }

        h1, #price {
            color: red;
        }

        h1, h2 {
            text-align: center;
        }

        .top{
            line-height: 0.5em;
            padding-left: 20px;
            font-weight: bold;
        }

        #cost {
            text-align: center;
            font-size: 2.5em;
        }

        #price {
            font-style: italic;
        }
        
    </style>

</head>
<body>
    <div>
        <main>

            <h1>Pizza Express</h1>

            <h2>Your pizza order will be ready for pick up in 15 minutes!</h2>
            <?php print $msg; ?>

        </main>
    </div>
</body>
</html>