require('./bootstrap');
import Vue from 'vue';
import Chart from 'chart.js/auto';
import axios from 'axios';
import { includes } from 'lodash';



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
    arrayAppoggio: [],
    arrayMostrato: [],
    elementoSelezionato: 0,
    sommaCarrello: 0,
    sommaCarrelloFinale: 0,
    differenzaCarrello: 0,
  },
  mounted(){

    axios
      .get('http://127.0.0.1:8000/api/types')
      .then((result) => {
        this.tipologie = result.data.response;
    });

    // this.userFinale = localStorage.getItem(this.userProva);
    this.finalPriceSaved = JSON.parse(localStorage.getItem(this.carrelloSalvato));
    // console.log(this.carrelloSalvato);
    for(var h in this.finalPriceSaved){
      this.sommaPrezzo +=this.finalPriceSaved[h].prezzo;
      this.finalPrice = this.sommaPrezzo.toFixed(2);
      this.userid = this.finalPriceSaved[h].user_id;
    }

    // console.log(this.userid);

    // // console.log(this.userFinale);
    // console.log(this.finalPriceSaved);
    this.show = 'hide',
    axios
    .get('http://localhost:8000/api/plate')
    .then((result)=> {
      this.arrayPiatti = result.data.response;
      // console.log(this.arrayPiatti);
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
      for(var k in this.arrayRistoranti){
        for(var h in this.tipologie){
          if(this.arrayRistoranti[k].tipologia.includes(this.tipologie[h].id)){
            this.arrayRistoranti[k].tipologia += " " + this.tipologie[h].nome;
          } else if(this.arrayRistoranti[k].tipologia == "null"){
            this.arrayRistoranti[k].tipologia = [];
          }
          
        }
      }
      this.arrayMostrato = this.arrayRistoranti;
    },
    this.id_ristorante= localStorage.id_ristorante,
    // console.log(this.id_ristorante),
    this.restaurant_plates
    )
  },
  

  methods:{
    ristorante_id(id){
        this.id_ristorante = id;
        // console.log(this.id_ristorante);
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
        if(item.nome.indexOf(this.search) > -1){
          this.ristorantiSelezionati.push(item);
        };
        if(this.search == '' || this.search != this.ristoranteScelto.nome){
          this.ristoranteScelto = [];
        }
      });

    },
    div_restaurants(){
      if(this.search == ''){
        this.ristorantiSelezionati = [];
      }

    },
    click_restaurant_choice(index){
        this.ristoranteScelto = [];
        this.ristoranteScelto.push(this.ristorantiSelezionati[index]);
        this.ristorantiSelezionati = [];
        this.search = this.ristoranteScelto[0].nome;

        this.ristoranteScelto.forEach((item)=>{
          console.log(item.nome);
        });
    },
  
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
      this.carrello.push(this.piattiRistorante[index]);
      this.differenzaCarrello= 0;
      this.carrello.forEach(element=>{
       
        this.differenzaCarrello += element.prezzo;
      });

        
      this.sommaCarrelloFinale = this.differenzaCarrello.toFixed(2);
      localStorage.setItem(this.carrelloSalvato, JSON.stringify(this.carrello));
    },

    delete_to_chart(index){
        this.carrello.splice(index,1);
        this.differenzaCarrello= 0;
          this.carrello.forEach(element=>{
           
            this.differenzaCarrello += element.prezzo;
          });


        this.sommaCarrelloFinale = this.differenzaCarrello.toFixed(2);
        localStorage.setItem(this.carrelloSalvato, JSON.stringify(this.carrello));
      },

    filterPlate(index){
      this.arrayAppoggio = [];
      this.elementoSelezionato = this.tipologie[index];
      for(var k in this.arrayRistoranti){
        this.arrayAppoggio.push(this.arrayRistoranti[k].tipologia);
        // if(this.arrayRistoranti[k].tipologia.includes(this.elementoSelezionato.nome)){
        //   this.arrayMostrato = this.arrayRistoranti[k];
        // }
        
      }
      
      this.arrayMostrato = [];
      this.arrayRistoranti.forEach(element=>{
        console.log(element.tipologia.includes(this.elementoSelezionato.nome));
        if(element.tipologia.includes(this.elementoSelezionato.nome)){
          this.arrayMostrato.push(element);
        }
      })
      console.log(this.arrayMostrato);
      


      // console.log(this.arrayAppoggio);
      // console.log(this.arrayMostrato);
    },

    showAll(){
      console.log(this.arrayRistoranti);
      this.arrayMostrato = [];
      this.arrayMostrato = this.arrayRistoranti;
      console.log(this.arrayMostrato);
    }
  }
});   


let app = new Vue({
  el: "#myChart",
  data: {
      ordiniMese: [],
      ordini: ''
  },

  mounted() {
      axios
      .get(`http://127.0.0.1:8000/api/orders/${orderid}`)
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

            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
              type: 'pie',
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
  },
});
