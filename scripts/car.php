<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .cart-container {
      max-width: 600px;
      margin: 20px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .product-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    .product-item {
      display: table-row;
      border-bottom: 1px solid #ddd;
    }

    .product-details, .quantity {
      display: table-cell;
      padding: 10px;
    }

    .product-details {
      width: 70%;
    }

    .product-title {
      font-size: 16px;
      font-weight: bold;
    }

    .product-price {
      color: #4caf50;
    }

    .quantity {
      width: 10%;
      text-align: center;
    }

    .total-price {
      font-size: 18px;
      font-weight: bold;
      text-align: right;
    }

    .checkout-btn {
      background-color: #4caf50;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }
  </style>
</head>
<body>

<div class="cart-container">
  <h2><i class="fas fa-shopping-cart"></i> Shopping Cart</h2>

  <!-- Product Table -->
  <table class="product-table">
    <tr class="product-item">
      <td class="product-details">
        <div class="product-title">Product 1</div>
        <div class="product-price">Price: $20.00</div>
      </td>
      <td class="quantity">Qty: 2</td>
    </tr>

    <tr class="product-item">
      <td class="product-details">
        <div class="product-title">Product 2</div>
        <div class="product-price">Price: $15.00</div>
      </td>
      <td class="quantity">Qty: 1</td>
    </tr>
  </table>

  <!-- Total Price -->
  <div class="total-price">Total: $55.00</div>

  <!-- Checkout Button -->
  <button class="checkout-btn">Checkout</button>
</div>

</body>
</html>
