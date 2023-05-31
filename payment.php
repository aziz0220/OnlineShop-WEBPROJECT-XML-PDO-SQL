<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <link rel="stylesheet" href="payment.css">
</head>
<body>
    <h1>Payment</h1>
    <form method="POST" action="confirmation.php">
        <h2>Select Payment Method:</h2>
        <input type="radio" name="payment_method" value="credit_card">Credit Card<br>
        <input type="radio" name="payment_method" value="paypal">PayPal<br><br>
        <div id="credit_card_fields" style="display: none;">
            <h2>Credit Card Details:</h2>
            <label for="card_number">Card Number:</label>
            <input type="text" name="card_number" id="card_number"><br><br>
            <label for="expiration_date" >Expiration Date:</label>
            <input type="text" name="expiration_date" placeholder="YY/MM/DD" id="expiration_date"><br><br>
        </div>
        <input type="submit" value="Next">
    </form>

    <script>
        const creditCardFields = document.getElementById('credit_card_fields');
        const paymentMethodRadios = document.getElementsByName('payment_method');

        for (let i = 0; i < paymentMethodRadios.length; i++) {
            paymentMethodRadios[i].addEventListener('change', function() {
                if (this.value === 'credit_card' || this.value === 'paypal') {
                    creditCardFields.style.display = 'block';
                } else {
                    creditCardFields.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>