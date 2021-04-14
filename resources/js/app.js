require('./bootstrap');
import Vue from 'vue';

var chiamate = new Vue({
  el: '#app',
  data: {
    arrayPiatti: '',
    arrayRistoranti: '',
    search: '',
    piattiSelezionati:[],
    ristorantiSelezionati: []
  },
  mounted(){
    axios
    .get('http://localhost:8000/api/plate')
    .then((result)=> {
      this.arrayPiatti = result.data.response;
      console.log(this.arrayPiatti);
    })
    axios
    .get('http://localhost:8000/api/restaurant')
    .then((result)=> {
      this.arrayRistoranti = result.data.response;
      console.log(this.arrayRistoranti);
    })
  },
  methods:{
    search_plate(){
      console.log(this.search);
      this.piattiSelezionati = [];
      this.arrayPiatti.forEach((item) => {
        if(item.nome == this.search){
          this.piattiSelezionati.push(item);
        }
      });
      console.log(this.piattiSelezionati);

    },
    search_restaurant(){
      console.log(this.search);
      this.ristorantiSelezionati = [];
      this.arrayRistoranti.forEach((item) => {
      //   if(item.nome == this.search){
      //     this.ristorantiSelezionati.push(item);
      //   }
      // });
        if(item.nome.indexOf(this.search)> -1){
          this.ristorantiSelezionati.push(item);
        }
      });
      // console.log(this.ristorantiSelezionati);

    },
    div_restaurants(){
      if(this.search == ""){
        this.ristorantiSelezionati = [];
      }
    }
  }
});
