<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binary to Decimal Converter</title>
</head>
<body>
    <h1>Binary to Decimal Converter</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $binaryNumber = $_POST["binaryNumber"];
        $decimalNumber = 0;
        $power = 0;
        for ($i = strlen($binaryNumber) - 1; $i >= 0; $i--) {
            $bit = $binaryNumber[$i];
            if ($bit === '1') {
                $decimalNumber += pow(2, $power);
            }

            $power++;
        }
        echo "<p>Binary Number: $binaryNumber</p>";
        echo "<p>Decimal Equivalent: $decimalNumber</p>";
    }
    ?>
</body>
</html>
