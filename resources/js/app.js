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
    sommaPrezzo: 0,
    tipologie:[],
    array: [],
    finalPrice: 0,
    finalPriceSaved: 0,
    userid: 0,
    userProva: 0,
    userFinale: 0,
  },
  mounted(){
    axios
      .get('http://127.0.0.1:8000/api/types')
      .then((result) => {
        this.tipologie = result.data.response;
    });

    // this.userFinale = localStorage.getItem(this.userProva);
    this.finalPriceSaved = JSON.parse(localStorage.getItem(this.carrelloSalvato));

    for(var h in this.finalPriceSaved){
      this.sommaPrezzo +=this.finalPriceSaved[h].prezzo;
      this.userid = this.finalPriceSaved[h].user_id;
    }

    console.log(this.userid);

    // console.log(this.userFinale);
    console.log(this.finalPriceSaved);

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
      console.log(this.arrayRistoranti);
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
      // this.carrelloSalvato = JSON.parse(localStorage.getItem(this.carrelloSalvato));

      // console.log(this.carrelloSalvato);
      
      // ottengo il prezzo totale
      
      // for(var k in this.carrelloSalvato){
      //   // console.log(this.carrelloSalvato[k].prezzo);
        
      //   localStorage.setItem(this.sommaPrezzo, JSON.stringify(this.carrelloSalvato[k].prezzo));
      // }
      // this.sommaPrezzo += JSON.parse(localStorage.getItem(this.sommaPrezzo));
      
      // localStorage.setItem(this.finalPrice, JSON.stringify(this.sommaPrezzo));
      
      // console.log(this.sommaPrezzo);

      // user id
      // for(var h in this.carrelloSalvato){

      //   this.userid= this.carrelloSalvato[h].user_id;
      // }
      // localStorage.setItem(this.userProva, this.userid);
      
      // console.log(this.userid);
    },

  }
});  


var app = new Vue({
  el: '#myChart',
  data: {
    arrayOrdini: '',
    nomi: [],
    quantita: [],
    mese: [],

  },
  mounted(){
    axios
    .get('http://localhost:8000/api/orders')
    .then((result)=> {
      this.arrayOrdini = result.data.response;
      console.log(this.arrayOrdini);
            this.arrayOrdini.forEach(element => {

                if(element.pagamento_avvenuto == 1 && element.created_at.slice(0,7) == '2021-04'){
                  this.quantita.push(element);
                }
                
              })
              // console.log(this.quantita.length);
            });

            var tot = this.quantita.length;
            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
              type: 'doughnut',
              data: {
                    labels: ['Gen','Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago', 'Set', 'Ott','Nov','Dic'],
                    datasets: [{
                        data: [2,5,6,7,4,5,6,7,5,3,2,2],
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