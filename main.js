const { createApp } = Vue;


createApp({
  data() {
    return {
      elements : [],
      formData : {},
      edit : false,
      editPostData: null,
    };
  },
  methods: {
    //al submitdelform inviamo all'array il nuovo elemento
    onFormSubmit() {
      axios.post("api/createElement.php", this.formData, {
        headers: { "Content-Type": "multipart/form-data" }

      }).then((resp) => {
        this.fetchlist();
      })
      .catch(error => {
        console.log(error.message);
      })
      this.formData.newElement = "";
      

      
    },
    //prendere l elemento da api/element
    fetchlist() {
      //faccio la chiamata axios vs api/element.php e ad 
      //elements dove avevo fatto l' echo assegno il 
      // valore di resp data, andrò a stampare su index l'elements
        axios.get("api/element.php").then((resp) => {
          this.elements = resp.data;
        });
    },

    onDeleteTask (elementoid) {
      axios.post("api/deleteElement.php", {elementoid}, {
        headers:{"Content-Type": "multipart/form-data"},
      }
      )
      .then((resp) => {
        this.fetchlist();
      });

    },
    
    editElement(elemento) {
      this.edit = true,
      this.editPostData = elemento
    },

    resetEditForm() {
      this.edit = false,
      this.editPostData = null
    }

  },
  mounted() {
    this.fetchlist();

  },
  computed: {

  },
}).mount("#app")