<?php
// Include the Cart class
require_once 'Cart.php';

// Start or resume session to store cart data
session_start();

// Initialize or retrieve cart object from session
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    echo "Cart object retrieved from session<br>";
} else {
    $cart = new Cart();
    $_SESSION['cart'] = $cart;
    echo "New cart object created and stored in session<br>";
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $item = $_POST['item'];
        $quantity = $_POST['quantity'];
        $cart->addItem($item, $quantity);
    } elseif (isset($_POST['remove'])) {
        $item = $_POST['item'];
        $cart->removeItem($item);
    } elseif (isset($_POST['update'])) {
        $item = $_POST['item'];
        $quantity = $_POST['quantity'];
        $cart->updateQuantity($item, $quantity);
    }

    // Update cart in session
    $_SESSION['cart'] = $cart;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Shopping Cart</h1>
    <form method="post">
        <label for="item">Item:</label>
        <input type="text" name="item" id="item">
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" value="1">
        <button type="submit" name="add">Add to Cart</button>
    </form>

    <h2>Cart Items:</h2>
    <ul>
        <?php
        // Ensure $cart is an object before accessing its methods
        if (is_object($cart)) {
            foreach ($cart->getItems() as $item => $quantity): ?>
                <li>
                    <?php echo $item; ?> - Quantity: <?php echo $quantity; ?>
                    <form method="post" style="display: inline;">
                        <input type="hidden" name="item" value="<?php echo $item; ?>">
                        <label for="quantity">Update Quantity:</label>
                        <input type="number" name="quantity" id="quantity" value="<?php echo $quantity; ?>">
                        <button type="submit" name="update">Update</button>
                    </form>
                    <form method="post" style="display: inline;">
                        <input type="hidden" name="item" value="<?php echo $item; ?>">
                        <button type="submit" name="remove">Remove</button>
                    </form>
                </li>
            <?php endforeach;
        } else {
            echo "Cart object is not valid.";
        }
        ?>
    </ul>

    <h2>Total Price: $<?php echo $cart->getTotalPrice(); ?></h2>
</body>
</html>
