<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    session_start();
    include "connection.php";

    $stmt = $conn->prepare("SELECT nome_utente, pwd FROM utenti WHERE nome_utente = ? AND pwd = ?");
    $stmt->bind_param("ss", $_SESSION["nome_utente"], $_SESSION["pwd"]);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<br>" . "Nome utente: " . $_SESSION["nome_utente"] . "<br>" . "Password: " . $_SESSION["pwd"] ;
        }
    } 
    ?>
</body>
</html>