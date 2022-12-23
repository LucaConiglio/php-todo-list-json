<?php

//leggo il contenuto del file e lo salvo sotto forma di stringa in una variabile
$elements = file_get_contents("../tasks.json");

//si imposta l'header per far capire al browser che il contenuto e in formato json
header("Content-Type: application/json");


//converte l'array in json e lo stampa sulla pagina 
//successivamente andremo a usare questo elements nella chiamata axios fetchlist
echo $elements

?>