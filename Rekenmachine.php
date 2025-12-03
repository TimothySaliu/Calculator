<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Rekenmachine</title>
    <style> 




       
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .calculator {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input, select {
            padding: 10px;
            margin: 5px 0;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #f1f1f1;
            border-radius: 5px;
        }
    </style>
</head>
<body>
 
<div class="calculator">
    <h2>PHP Rekenmachine</h2>
   
   
    <form action="" method="POST">
        <label for="number1">Getal 1:</label>
        <input type="text" name="number1" id="number1" required>
 
        <label for="number2">Getal 2:</label>
        <input type="text" name="number2" id="number2" required>
 
        <label for="operation">Bewerking:</label>
        <select name="operation" id="operation">
            <option value="optellen">Optellen</option>
            <option value="aftrekken">Aftrekken</option>
            <option value="vermenigvuldigen">Vermenigvuldigen</option>
            <option value="delen">Delen</option>
        </select>
 
        <button type="submit">Bereken</button>
    </form>
 
   
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $number1 = $_POST['number1'];
        $number2 = $_POST['number2'];
        $operation = $_POST['operation'];
 
       
        if (is_numeric($number1) && is_numeric($number2)) {
            $number1 = (float)$number1;
            $number2 = (float)$number2;
 
           
            switch ($operation) {
                case "optellen":
                    $result = $number1 + $number2;
                    break;
                case "aftrekken":
                    $result = $number1 - $number2;
                    break;
                case "vermenigvuldigen":
                    $result = $number1 * $number2;
                    break;
                case "delen":
                    if ($number2 == 0) {
                        $result = "Fout: Delen door nul is niet toegestaan.";
                    } else {
                        $result = $number1 / $number2;
                    }
                    break;
                default:
                    $result = "Ongeldige bewerking geselecteerd.";
                    break;
            }
 
           
            echo "<div class='result'>Resultaat: $result</div>";
        } else {
           
            echo "<div class='result'>Fout: Voer geldige numerieke waarden in.</div>";
        }
    }
    ?>
</div>
 
</body>
</html>