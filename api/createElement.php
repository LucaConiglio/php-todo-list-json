<?php

if(empty($_POST["newElement"])) {

http_response_code(400);

exit("non é stato inserito alcun dato");




}



//leggo il contenuto del file json di task.json 
  $elements = file_get_contents("../tasks.json");

//converto la stringa ricevuta in un array associativo
  $elements = json_decode($elements , true);

  //aggiungiamo il nuovo elemento all'array
  $newElement = [
    "newElement" => $_POST["newElement"],
    //tramite date una funzione che ci ritorna la data ora minuti e secondi
    "createdAt" => date('Y-m-d H:i:s'),
    //ci ritorna un id univoco
    "id" => uniqid(),
  ];


  $elements [] = $newElement;

  //riconverto l'array in una stringa json con il primo elemento
  //passo proprio la stringa, con il secondo dico che deve mantere
  //l'indentazione
  $tasksjson = json_encode($elements, JSON_PRETTY_PRINT);

  //poso la stringa in tasks.json e passo la variabile convertita prima
  file_put_contents("../tasks.json" , $tasksjson);


  header("Content-Type:application/json");
  //converto l array in una stringa
  echo json_encode($newElement);


  ?>