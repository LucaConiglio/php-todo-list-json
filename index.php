<?php 
  

  

?>

<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo-list</title>
		
		<!-- librerie terze parti -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="style.css">

		<!-- Bootstrap e mio css -->
    
</head>
<body>
    <div id="app">
      <section>
        <div class="container">
          <h1 class="text-center py-5 mt-5 text-warning">TODO-LIST-PHP</h1>
          <form @submit.prevent="onFormSubmit" class="text-center" >
            <input type="text" name="newElement" v-model="formData.newElement">
            <button class="ms-2 btn btn-dark">Aggiungi</button>
          </form>
          <div class="d-flex justify-content-center">
            <ul class="list-group">
              <li class="list-group-item" v-for="(elemento, i) in elements"> 
                <div class="d-flex justify-content-between">
                  {{elemento.newElement}} 
                  <div>
                    <button class="btn btn-dark"><i @click="onDeleteTask(elemento.id)" class="fa-solid fa-trash"></i></button>
                    <button class="ms-2 btn btn-warning"><i @click="editElement(elemento)" class="fas fa-pencil"></i></button>
                  </div>
                </div>
                <div>{{elemento.createdAt}} - {{elemento.id}}</div>
              </li>

            </ul>
          </div>
          <form v-if="edit" @submit.prevent="onFormEdit" class="mt-3 text-center" >
            <input type="text" name="newElement" v-model="editPostData.newElement">
            <button class="ms-2 btn btn-dark">Salva</button>
            
            <button class="ms-2 btn btn-warning" @click="resetEditForm">Annulla</button>
              
            
          </form>
        </div>
        <div class="slider-thumb"></div>
      </section>
      




    </div>
    <script src="main.js"></script>
</body>
</html>