<?php

require "conecta-banco.php";
//$urlPadrao = $_SERVER['HTTP_HOST'];


$urlOriginal = "https://canaltech.com.br/games/resident-evil-4-remake-ganha-trailer-de-gameplay-e-demo-e-anunciada-241202/";
$alfabetoNumerico = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

$stringEmbaralhada = str_shuffle("$alfabetoNumerico");
$stringEmbaralhadaCurta = substr($stringEmbaralhada,0,7);


$statement = $pdo->prepare("INSERT INTO url (url_original, url_curta) VALUES (:url_original,:url_curta)");
$statement->bindValue(":url_original",$urlOriginal);
$statement->bindValue(":url_curta", $stringEmbaralhadaCurta);
$statement->execute();


