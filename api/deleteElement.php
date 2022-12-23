<?php

if(empty($_POST["elementoid"])) {

http_response_code(400);

exit("id mancante");




}



//leggo il contenuto del file json di task.json 
  $elements = file_get_contents("../tasks.json");

//converto la stringa ricevuta in un array associativo
  $elements = json_decode($elements , true);

  //recupere l'indice dell'elemento identico a quello ricevuto

  $indice;

  //per ogni elemento della lista controllo se il suo id corrisponde a quello richiesto
  //se lo trova salva su variabile $indice
  foreach($elements as $i => $post) {
    if($post["id"] === $_POST["elementoid"]) {

      $indice = $i;
    }
    
  }
  //elimino dall'array elements l indice selezionato!
  array_splice($elements, $indice, 1);

  $tasksjson = json_encode($elements, JSON_PRETTY_PRINT);

  //poso la stringa in tasks.json e passo la variabile convertita prima
  file_put_contents("../tasks.json" , $tasksjson);


  


  ?>