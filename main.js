const { createApp } = Vue;


createApp({
  data() {
    return {
      elements : [],
      formData : {},
    };
  },
  methods: {
    //al submitdelform inviamo all'array il nuovo elemento
    onFormSubmit() {
      axios.post("api/createElement.php", this.formData, {
        headers: { "Content-Type": "multipart/form-data" }

      }).then((resp) => {
        this.fetchlist();
      });
      this.formData.newElement = "";
    },
    //prendere l elemento da api/element
    fetchlist() {
        axios.get("api/element.php").then((resp) => {
          this.elements = resp.data;
        });
    },
    

  },
  mounted() {
    this.fetchlist();

  },
  computed: {

  },
}).mount("#app")