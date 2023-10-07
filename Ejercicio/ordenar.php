<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #B0C4DE;
        }

        th:first-child, td:first-child {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Números y Letras Asignadas</h2>





<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeros = array(
        "numero1" => $_POST["numero1"],
        "numero2" => $_POST["numero2"],
        "numero3" => $_POST["numero3"],
        "numero4" => $_POST["numero4"]
    );

    // Asignar letras específicas a cada número
    $letras = array(
        "numero1" => 'A',
        "numero2" => 'B',
        "numero3" => 'C',
        "numero4" => 'D'
    );

    // Crear una tabla para mostrar los números y letras
    echo "<table>";
    echo "<tr><th>Ordenamiento</th><th>Números</th><th>Letras</th></tr>";

    // Función para mostrar los números y letras en una fila de la tabla
    function mostrarFila($ordenamiento, $numeros, $letras) {
        echo "<tr><td>$ordenamiento</td><td>";
        foreach ($numeros as $numero) {
            echo "$numero<br>";
        }
        echo "</td><td>";
        foreach ($numeros as $key => $numero) {
            echo $letras[$key] . "<br>";
        }
        echo "</td></tr>";
    }

    // Ordenar los números de diferentes maneras y mostrar en la tabla
    asort($numeros);
    mostrarFila("Ascendente", $numeros, $letras);

    arsort($numeros);
    mostrarFila("Descendente", $numeros, $letras);

    // Cambia los ordenamientos personalizados aquí
    $numeros_personalizado = array(
        "numero4" => $numeros["numero4"],
        "numero1" => $numeros["numero1"],
        "numero4" => $numeros["numero4"],
        "numero3" => $numeros["numero3"]
    );
    $letras_personalizado = array(
        "numero2" => $letras["numero2"],
        "numero3" => $letras["numero3"],
        "numero4" => $letras["numero4"],
        "numero1" => $letras["numero1"]
    );
    mostrarFila("Orden Personalizado", $numeros_personalizado, $letras_personalizado);

    $numeros_numericos = $numeros;
    $letras_numericos = $letras;
    asort($numeros_numericos, SORT_NUMERIC);
    mostrarFila("Numérico", $numeros_numericos, $letras_numericos);

    ksort($numeros);
    ksort($letras);
    mostrarFila("Orden inicial", $numeros, $letras);

    echo "</table>";
}
?>
<button type="button" class="btn btn-outline-danger"> <a href="http://localhost/Ejercicio/ordenar_numeros.html"><font color="Black">Volver</font></a ></button>


</body>
</html>