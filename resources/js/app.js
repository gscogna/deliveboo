require('./bootstrap');
import Vue from 'vue';
import Chart from 'chart.js/auto';


var chiamate = new Vue({
  el: '#app',
  data: {
    arrayPiatti: '',
    arrayRistoranti: '',
    search: '',
    piattiRistorante:[],
    ristorantiSelezionati: [],
    ristoranteScelto : [],
    id_ristorante: ''
  },
  mounted(){
    axios
    .get('http://localhost:8000/api/plate')
    .then((result)=> {
      this.arrayPiatti = result.data.response;
      console.log(this.arrayPiatti);
      this.arrayPiatti.forEach((item) => {
        if(item.user_id == this.id_ristorante){
          this.piattiRistorante.push(item);
        }
      });
      console.log(this.id_ristorante);
      console.log(this.piattiRistorante);

    })
    axios
    .get('http://localhost:8000/api/restaurant')
    .then((result)=> {
      this.arrayRistoranti = result.data.response;
      // console.log(this.arrayRistoranti);
    })
    this.id_ristorante= localStorage.id_ristorante,
    // console.log(this.id_ristorante),
    this.restaurant_plates

  },
  methods:{
    ristorante_id(id){
        this.id_ristorante = id;
        console.log(this.id_ristorante);
    },

    restaurant_plates(id){
      this.id_ristorante = id;

      this.arrayPiatti.forEach((item) => {
        if(item.user_id == this.id_ristorante){
          this.piattiRistorante.push(item);
        }
      });
      console.log(this.id_ristorante);
      console.log(this.piattiRistorante);
      localStorage.id_ristorante = this.id_ristorante;
      console.log(localStorage.id_ristorante);

    },
    search_restaurant(){
      // console.log(this.search);
      this.ristorantiSelezionati = [];
      this.arrayRistoranti.forEach((item) => {
      //   if(item.nome == this.search){
      //     this.ristorantiSelezionati.push(item);
      //   }
      // });
        if(item.nome.indexOf(this.search) > -1){
          this.ristorantiSelezionati.push(item);
        };
        if(this.search == '' || this.search != this.ristoranteScelto.nome){
          this.ristoranteScelto = [];
        }
      });
      // console.log(this.ristorantiSelezionati);

    },
    div_restaurants(){
      if(this.search == ''){
        this.ristorantiSelezionati = [];
      }

    },
    click_restaurant_choice(index){
      // this.ristorantiSelezionati = [];
      console.log(this.ristorantiSelezionati);

        // console.log(item);
        this.ristoranteScelto = [];
        this.ristoranteScelto.push(this.ristorantiSelezionati[index]);
        this.ristorantiSelezionati = [];
        this.search = this.ristoranteScelto[0].nome;

        this.ristoranteScelto.forEach((item)=>{
          console.log(item.nome);
        });

      console.log(this.ristoranteScelto);

    },
    vedi(){
      console.log(this.piattiRistorante);
    }
  }
});







var app = new Vue({
  el: '#myChart',
  data: {
    arrayOrdini: ''

  },
  mounted(){
    axios
    .get('http://localhost:8000/api/orders')
    .then((result)=> {
            this.arrayOrdini = result.data.response;
            // console.log(this.arrayOrdini);
            this.arrayOrdini.forEach(element => {
                
            })
      });
    
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['pizza', 'hamburger', 'patatine', 'supplì'],
                datasets: [{
                    data: [12, 19, 3, 5],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.4)',
                        'rgba(255, 206, 86, 0.4)',
                        'rgba(54, 162, 235, 0.4)',
                        'rgba(75, 192, 192, 0.4)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            // options: {
            //     scales: {
            //         y: {
            //             beginAtZero: true
            //         }
            //     }
            // }
        });

  }
});