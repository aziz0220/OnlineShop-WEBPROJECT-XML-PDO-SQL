<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="dashboard.css">
    <title>Dashboard</title>
    <style>
        .product-card {
            width: 300px;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
        .product-card .title {
            font-size: 18px;
            font-weight: bold;
        }
        .card {
            display: inline-block;
        }
        .product-card .price {
            font-size: 14px;
            color: green;
        }
        body{
            background-image: url(background8.png);
            background-position: center;
            background-repeat: no repeat;
            background-attachement:fixed ;
        }
        .img{
            border-radius:7px;
            margin-left:15px;
            margin-top:15px;
            width:60px;
            height:60px;
        }
    </style>
    <style>
.card-container {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 50px;
}

.card {
  width: 18rem;
  height: 100%;
  background-color: #f8f8f8;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  transition:0.5s;
}

.card-img-top {
  height: 200px;
  object-fit: cover;
}

.card-body {
  padding: 15px;
}

.card-title {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
}
.card:hover{
    transform:scale(1.1);
}

.card-text {
  margin-bottom: 10px;
}

.price {
  font-weight: bold;
}

.quantity {
  margin-top: 10px;
}

input[type="checkbox"],
input[type="number"] {
  margin-right: 5px;
}
</style>
</head>
<body >
<header style="display:flex; height:90px;padding-bottom:7px; background-color:white; border-bottom:2px solid #FFBA00;">
        <img src="image/logo.jpg" class="img" alt="Shop Logo" >
        <h1 style="margin-left:10px;color:white;font-weight:500;margin-top:20px;background-color:#FFBA00;border-radius:10px;padding:5px;padding-left:8px;padding-right:8px;">Online Shop</h1>
        <form method="POST" action="logout.php">
        <input type="submit" value="Logout" style="margin-left:1100px;margin-top:30px;background:#FFBA00;border-radius:10px;color:white;  border:2px solid white;" >  </form>
    </header>

    <h2 style="font-weight:500; font-size:40px; color:#FFBA00; margin-left:40%; margin-bottom:70px;margin-top:100px; ">Our Products</h2>
    <?php
include "config.php";
$sql = "SELECT * FROM products";
$stmt = $conn->query($sql);
if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $productID = $row["product_ID"];
        $productName = $row["product_Name"];
        $description = $row["Description"];
        $price = $row["Price"];
        $quantity = $row["Quantity"];
        $imgsrc = "image/" . $productName . ".jpg";
        ?>
      <div class="card" style="width: 18rem; margin-left:60px; align-items:center; margin-bottom:50px;">
        <img <?php echo 'src="' . $imgsrc . '"'; ?> class="card-img-top" alt="...">
            <input type="checkbox" style="margin:20px" name="selected_products[]" value="<?php echo $productID; ?>" onchange="calculateTotal()">
            <div class="card-body">
                <div class="card-title"><?php echo $productName; ?></div>
                <div class="card-text"><?php echo $description; ?></div>
                <div class="price"><?php echo $price; ?> TND</div>
                <div class="quantity">Quantity:
                <input type="number" name="product_quantity[<?php echo $productID; ?>]" min="0" max="<?php echo $quantity; ?>" value="0" onchange="calculateTotal()">
                </div> 
            </div>
        </div>
         </div>           
    <?php
    }
} else {
    echo "No products found.";
}
$conn = null;
?>
<form method="POST" action="payment.php" style="margin-left:40%;  ">
    <h3 style="color:black; ">Total Price: <span id="totalPrice" style="color:black;">0</span> TND </h3>

    <input type="submit" value="Proceed to buy" style="border-radius:7px; background-color:#FFBA00; margin-bottom:100px; color:white; margin-left:30px">
</form>
<script>
    function calculateTotal() {
        var totalPrice = 0;
        var checkboxes = document.getElementsByName("selected_products[]");
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                var productPrice = parseInt(checkbox.parentNode.querySelector(".price").innerText.substring(0, checkbox.parentNode.querySelector(".price").innerText.indexOf(' ')));
                var productQuantity = parseInt(checkbox.parentNode.querySelector("input[type='number']").value);
                totalPrice += productPrice * productQuantity;
            }
        });
        document.getElementById("totalPrice").innerHTML = totalPrice;
    }
</script>
</body>
</html>
