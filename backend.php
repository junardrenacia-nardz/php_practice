<?php

$orders = ["5", "12", "0", "8", "15"];

$itemPrice = "100";
$discount = 0.1;

function calculateTotal($quantity, $price, $discount) {
    if ($quantity >= 10) {
        $currentPrice = $price - ($price * $discount);
        return $currentPrice * $quantity;
    } else if ($quantity <= 0) {
        return 0;
    } else {
        return $price * $quantity;
    }
}

$totalRevenue = 0;

foreach ($orders as $qty) {

    $orderTotal = calculateTotal($qty, $itemPrice, $discount);
    echo " <li class='list-group-item'>";
    // if-else method
    echo $orderTotal <= 0 ? "Invalid Order" : "Order: $qty - Total: $orderTotal";
    // if ($orderTotal == 0) {
    //     echo "Invalid Order";
    // } else {
    //     echo "Order: $qty - Total: $orderTotal";
    // }
    echo " </li>";

    $totalRevenue += $orderTotal;
}
