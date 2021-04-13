require('./bootstrap');
import Vue from 'vue';

var chiamate = new Vue({
  el: '#app',
  data: {
    array: '',
    search: '',
    piattiSelezionati:[]
  },
  mounted(){
    axios
    .get('http://localhost:8000/api/plate')
    .then((result)=> {
      this.array = result.data.response;
      console.log(this.array);
    })
  },
  methods:{
    search_plate(){
      console.log(this.search);
      this.piattiSelezionati = [];
      this.array.forEach((item) => {
        if(item.nome == this.search){
          this.piattiSelezionati.push(item);
        }
      });
      console.log(this.piattiSelezionati);

    }
  }
});
