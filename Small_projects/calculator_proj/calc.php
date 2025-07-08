<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            width: 300px;
        }
    </style>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="number" name="num01" placeholder="Number one"><br>
        <select name="operator">
            <option value=""></option>
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select> <br>
        <input type="number" name="num02" placeholder="Number two"> <br>
        <button type="submit">Calculate</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num01 = $_POST["num01"] ?? null;
        $num02 = $_POST["num02"] ?? null;
        $operator = $_POST["operator"] ?? null;

        //ERROR HANDLER
    
        $errors = false;

        if (empty($num01) || empty($num02) || empty($operator)) {
            echo "<p class='error-message'>Fill in all fields!</p>";
            $errors = true;
        }
        if (!is_numeric($num01) || !is_numeric($num02)) {
            echo "<p class='error-message'>Invalid input, please enter a number</p>";
            $errors = true;
        }


        if (!$errors) {
            $result = 0; //??
            switch ($operator) {
                case 'add':
                    $result = $num01 + $num02;
                    break;
                case 'subtract':
                    $result = $num01 - $num02;
                    break;
                case 'multiply':
                    $result = $num01 * $num02;
                    break;
                case 'divide':
                    if ($num02 != 0) {
                        $result = $num01 / $num02;
                    } else {
                        $result = "Cannot divide a number by zero";
                    }
                    break;
                default:
                    $result = "<p class='invalid-operator'>Invalid operator</p>";
                    echo $result;
            }

            if ($result != "Invalid operator") {
                echo "<p class='result'>Result = " . $result . "</p>";    
            }
            
        }
    }
    ?>

</body>

</html>