<?php

require "conecta-banco.php";

$pdo->exec("CREATE TABLE url (
    url_id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    url_original varchar(255) NOT NULL,
    url_curta varchar(255) NOT NULL
)");