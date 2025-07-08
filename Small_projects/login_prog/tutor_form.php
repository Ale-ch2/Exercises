<?php
    //starting SESSION before using session-data or outputting anything
    session_start(); 
    include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //turn every special character into his equivalent HTML entity
    //SANITIZE INPUT
    $nome_utente = htmlspecialchars($_POST['nome_utente']); 
    $pwd = htmlspecialchars($_POST['pwd']);

    //prepare SQL to avoit injections
    $stmt = $conn->prepare("SELECT nome_utente, pwd FROM utenti WHERE nome_utente = ? AND pwd = ?");
    $stmt->bind_param("ss", $nome_utente, $pwd);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION["nome_utente"] = $nome_utente;
        $_SESSION["pwd"] = $pwd;
        header('Location: successfull.php');
        exit(); //exit() ferma lo script, chiude il programma, molto simile a "die"
    } else {
        header('Location: unsuccessfull.htm');
        exit();
    }
}
