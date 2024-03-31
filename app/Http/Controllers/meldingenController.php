<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $attractie = $_POST['attractie'];
    $type = $_POST['type'];
    $capaciteit = $_POST['capaciteit'];

    if(isset($_POST['prioriteit'])) {
        $prioriteit = true;
    } else {
        $prioriteit = false;
    }
    
    $melder = $_POST['melder'];
    $overig = $_POST['overig'];

    if (empty($attractie)) {
        $errors[] = "Vul de attractie-naam in.";
    }
    if (empty($type)) {
        $errors[] = "Kies een type.";
    }
    if (!is_numeric($capaciteit)) {
        $errors[] = "Vul voor capaciteit een geldig getal in.";
    }
    if (empty($melder)) {
        $errors[] = "Vul de naam van de melder in.";
    }
  
    
    // Connection
    require_once __DIR__ . '/../../config/conn.php'; 

    // Query
    $query = "INSERT INTO meldingen (attractie, type, capaciteit, prioriteit, melder, overige_info) VALUES (:attractie, :type, :capaciteit, :prioriteit, :melder, :overig)";

    // Prepare
    $statement = $conn->prepare($query);

    // Execute
    $statement->execute([
        ":attractie" => $attractie,
        ":type" => $type,
        ":capaciteit" => $capaciteit,
        ":prioriteit" => $prioriteit,
        ":melder" => $melder,
        ":overig" => $overig
    ]);

    // Redirect
    header("Location: ../meldingen/index.php?msg=Melding opgeslagen");
    exit; // Ensure no further code execution after redirection
}
?>
