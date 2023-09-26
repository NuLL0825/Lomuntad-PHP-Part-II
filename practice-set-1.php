<?php
/**
 * Calculate the total price of items in a shopping cart.
 *
 * @param array $items Array of items.
 * @return float The total price of the items.
 */
function calculateTP(array $items): float {
    $t = 0;
    foreach ($items as $item) {
        $t += $item['price'];
    }
    return $t;
}

/**
 * Modify the string by removing spaces and converting to lowercase.
 *
 * @param string $inputString The input string.
 * @return string The modified string.
 */
function modifyString(string $inputString): string {
    $modifiedString = str_replace(' ', '', $inputString);
    $modifiedString = strtolower($modifiedString);
    return $modifiedString;
}

/**
 * Check if the number is even or odd.
 *
 * @param int $number The number to be checked.
 * @return string The message to display whether the number is even or odd.
 */
function checkEvenOrOdd(int $num): string {
    if ($num % 2 == 0) {
        return "The number $num is even.";
    } else {
        return "The number $num is odd.";
    }
}

// The Shopping Cart Items.
$items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20],
];

// Calculate and Display the Total Price.
$total = calculateTP($items);
echo "Total price: $" . $total;

// String Manipulation
$inputString = "This is a poorly written program with little structure and readability.";
$modifiedString = modifyString($inputString);
echo "\nModified string: " . $modifiedString;

// Check if Even or Odd
$num = 42;
$result = checkEvenOrOdd($num);
echo "<div\n$result";
?>