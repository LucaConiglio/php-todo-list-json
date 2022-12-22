<?php
$elements = file_get_contents("../tasks.json");

  $elements = json_decode($elements , true);

  $newElement = [
    "newElement" => $_POST["newElement"],
  ];

  $elements [] = $newElement;

  $tasksjson = json_encode($elements, JSON_PRETTY_PRINT);

  file_put_contents("../tasks.json" , $tasksjson);

  header("Content-Type:application/json");
  echo json_encode($newElement);

  ?>