require('./bootstrap');
import Vue from 'vue';
import Chart from 'chart.js/auto';
import axios from 'axios';



var chiamate = new Vue({
  el: '#app',
  data: {
    arrayPiatti: '',
    arrayRistoranti: '',
    search: '',
    piattiRistorante:[],
    ristorantiSelezionati: [],
    ristoranteScelto : [],
    id_ristorante: '',
    show: "",
    contatore: 0,
    carrello: [],
    carrelloSalvato: [],
    stored_datas: '',
    tipologie:[],
    array: []
  },
  mounted(){
    axios
      .get('http://127.0.0.1:8000/api/types')
      .then((result) => {
        this.tipologie = result.data.response;

      //   this.tipologie.forEach((element, index) => {
      //     if (!this.tipoScelto.includes(element.nome)) {
      //       this.tipoScelto.push(element);
      //     };
      // });
    });

    this.show = 'hide',
    axios
    .get('http://localhost:8000/api/plate')
    .then((result)=> {
      this.arrayPiatti = result.data.response;
      console.log(this.arrayPiatti);
      this.arrayPiatti.forEach((item) => {
        if(item.user_id == this.id_ristorante){
          this.piattiRistorante.push(item);
          item.contatore = 1;
        }
      });
      // console.log(this.id_ristorante);
      // console.log(this.piattiRistorante);

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
      // console.log(this.id_ristorante);
      // console.log(this.piattiRistorante);
      localStorage.id_ristorante = this.id_ristorante;
      // console.log(localStorage.id_ristorante);

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
      // console.log(this.ristorantiSelezionati);

        // console.log(item);
        this.ristoranteScelto = [];
        this.ristoranteScelto.push(this.ristorantiSelezionati[index]);
        this.ristorantiSelezionati = [];
        this.search = this.ristoranteScelto[0].nome;

        this.ristoranteScelto.forEach((item)=>{
          console.log(item.nome);
        });

      // console.log(this.ristoranteScelto);

    },
    // vedi(){
    //   console.log(this.piattiRistorante);
    // },
    // carrello
    
    showCarrello(){
      if(this.show == "hide"){
        this.show = "show"
      } else {
        this.show ="hide";
      }
      // console.log(this.show);
    },

    add_to_chart(index) {

      if (!this.carrello.includes(this.piattiRistorante[index].nome)) {
        this.carrello.push(this.piattiRistorante[index]);
        
      }
      
      localStorage.setItem(this.carrelloSalvato, JSON.stringify(this.carrello));
      this.carrelloSalvato = JSON.parse(localStorage.getItem(this.carrelloSalvato));


    },

  }

  // this.utenti[this.contatoreUtente].messaggio[index].menu = ( this.utenti[this.contatoreUtente].messaggio[index].menu == 'hidden' ) ?  'show' : 'hidden';


});  






let app = new Vue({
  el: "#myChart",
  data: {
      ordiniMese: [],
      ordini: ''
  },

  mounted() {
      axios
      .get('http://127.0.0.1:8000/api/orders/1')
      .then((response) => {
          this.ordini = response.data; 

          for (let i = 1; i <= 12; i++) {

              let ordiniSomma = 0;

              this.ordini.forEach((element) => {

                  if ( i == element.created_at.substr(5, 2) ) {
                      ordiniSomma++; 
                  }

              });

              this.ordiniMese.push(ordiniSomma);
            }
            console.log(this.ordiniMese);

          let ctx = document.getElementById('myChart');
          var myChart = new Chart(ctx, {
              type: 'doughnut',
              data: {
                  labels: ['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago', 'Set', 'Ott', 'Nov', 'Dic'],
                  datasets: [{
                      data: this.ordiniMese, 
                      backgroundColor: [
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(255, 159, 64, 0.8)',
                        'rgba(67, 97, 238, 0.8)',
                        'rgba(79, 119, 45, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(158, 42, 43, 0.8)',
                        'rgba(164, 44, 214, 0.8)',
                        'rgba(229, 56, 59, 0.8)',
                        'rgba(255, 195, 0, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                      ]
                  }]
              },
          });
      })
  }
});