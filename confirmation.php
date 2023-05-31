<!DOCTYPE html>
<html>
<head>
    <title>Confirmation</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        
        h1 {
            color: #333333;
        }
        
        h2 {
            color: #555555;
        }
        
        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #e5b815;
            border: none;
            color: #ffffff;
            border-radius: 5px;
            cursor: pointer;
        }
        
        button:hover {
            background-color: #e5b815;
        }
    </style>
</head>
<body>
    <h1>Thank you for placing an order</h1>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paymentMethod = $_POST["payment_method"];

    if ($paymentMethod === 'credit_card') {
        $cardNumber = $_POST["card_number"];
        $expirationDate = $_POST["expiration_date"];


    } elseif ($paymentMethod === 'paypal') {
    } elseif ($paymentMethod === 'cash') {
    }

    echo "<h2>Buying process is successful!</h2>";
}
?>

    <button onclick="window.location.href='dashboard.php'">Return to Dashboard</button>
</body>
</html>