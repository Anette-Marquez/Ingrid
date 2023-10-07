<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #E6E6FA;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h2 {
            text-align: center;
        }

        p {
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Comparación de Números</h2>
        <form method="post" action="">
            <?php
            $letras = ['A', 'B', 'C', 'D'];
            $numeros = [];

            for ($i = 0; $i < 4; $i++) {
                echo "<label for='num$letras[$i]'>Número $letras[$i]:</label>";
                echo "<input type='number' name='numeros[]' required><br><br>";
            }
            ?>
            <input type="submit" value="Comparar">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numeros = $_POST["numeros"];
            $comparaciones = [];

            for ($i = 0; $i < 4; $i++) {
                for ($j = $i + 1; $j < 4; $j++) {
                    if ($numeros[$i] < $numeros[$j]) {
                        $comparaciones[] = "$letras[$i] < $letras[$j]";
                    } elseif ($numeros[$i] > $numeros[$j]) {
                        $comparaciones[] = "$letras[$i] > $letras[$j]";
                    } else {
                        $comparaciones[] = "$letras[$i] = $letras[$j]";
                    }
                }
            }

            $resultado = implode(', ', $comparaciones);

            echo "<p>Comparaciones: $resultado</p>";

            if (count(array_unique($numeros)) == 1) {
                echo "<p>Todos los números son iguales.</p>";
            } else {
                echo "<p>No todos los números son iguales.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
