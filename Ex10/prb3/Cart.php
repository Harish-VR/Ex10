<?php
class Cart {
    private $items = array(); // Array to store items in the cart

    // Add item to cart
    public function addItem($item, $quantity) {
        if (isset($this->items[$item])) {
            // Item already exists in cart, update quantity
            $this->items[$item] += $quantity;
        } else {
            // Add new item to cart
            $this->items[$item] = $quantity;
        }
    }

    // Remove item from cart
    public function removeItem($item) {
        if (isset($this->items[$item])) {
            unset($this->items[$item]);
        }
    }

    // Update quantity of an item in cart
    public function updateQuantity($item, $quantity) {
        if (isset($this->items[$item])) {
            $this->items[$item] = $quantity;
        }
    }

    // Get total price of items in cart
    public function getTotalPrice() {
        $totalPrice = 0;
        foreach ($this->items as $item => $quantity) {
            // Here you would fetch the price of the item from a database or some other source
            // For demonstration purposes, let's assume the price is hardcoded
            $price = 10; // Change this with your actual price lookup
            $totalPrice += $price * $quantity;
        }
        return $totalPrice;
    }

    // Getter for cart items
    public function getItems() {
        return $this->items;
    }
}
?>
