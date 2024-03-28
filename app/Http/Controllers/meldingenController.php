<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];

echo $attractie . " / " . $capaciteit . " / " . $melder;

//1. Verbinding
require_once '../../../config/conn.php';

//2. Query
$type = "standaardwaarde"; // Je kunt hier een standaardwaarde toewijzen of deze uit het formulier halen, afhankelijk van jouw vereisten

$query = "INSERT INTO meldingen (attractie, capaciteit, melder, type) VALUES(:attractie, :capaciteit, :melder, :type)";



//3. Prepare
$statement = $conn->prepare($query);

//4. Execute
$statement->execute([
    ":attractie" => $attractie,
    ":capaciteit" => $capaciteit,
    ":melder" => $melder
]);