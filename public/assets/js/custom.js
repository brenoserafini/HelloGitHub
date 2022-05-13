// Função para retornar um número randômico
function getRandomInt(min, max) {
   min = Math.ceil(min);
   max = Math.floor(max);
   return Math.floor(Math.random() * (max - min)) + min;
}
// Função para ocultar o elemento #loadingPage após a página carregar
$(window).load(function() {
   ajaxPokemonRandom();
   setTimeout(function() { $('#loadingPage').hide(); }, 800);
});

// Inicializa o recurso tooltip do Bootstrap
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
   return new bootstrap.Tooltip(tooltipTriggerEl)
})

// Inicializa a biblioteca typed.js no elemento #pokemonNameOrNumberInput
var typed = new Typed('#pokemonNameOrNumberInput', {
   strings: ['just type a pokémon name...', 'like "Ditto"...', 'or "Gengar"...', 'or maybe a pokémon number...', "like #025...", 'try-it!', 'type a pokémon name...'],
   typeSpeed: 5,
   backSpeed: 10,
   backDelay: 800,
   startDelay: 800,
   attr: 'placeholder',
   bindInputFocusEvents: true,
   loop: false,
   smartBackspace: true
});

// chama função ajaxPokemonSearch() quando o elemento #btnSearch é clicado 
$('#btnSearch').click(function() {
   ajaxPokemonSearch();
});
$('#pokemonNameOrNumberInput').keydown(function (e){
   if(e.keyCode == 13){
      ajaxPokemonSearch();
   }
})
// chama função ajaxPokemonSearch("gengar") quando o elemento #btnSearchGengar é clicado
$('#btnSearchGengar').click(function() {
   ajaxPokemonSearch("gengar");
});

// $(document).ready(function() {
//     if(window.location.hash) {
//         var hash = window.location.hash.substring(1);
//         if (hash == "pokemonName/") {
//             ajaxProspeccao();
//         }
//     }
// });


var delayInMilliseconds = 800;
// Função Ajax que realiza a requição GET na API PokéAPI
function ajaxPokemonSearch(pokemonNameOrNumber) {
   var baseUrl = document.getElementById('baseUrlInput').value;
   if  (pokemonNameOrNumber) {
      var pokemonNameOrNumberInput = pokemonNameOrNumber;
   } else {
      var pokemonNameOrNumberInput = document.getElementById('pokemonNameOrNumberInput').value;
   }
   $("#loadingContainerCard").show();
   $.ajax({
      type: "POST",
      url: baseUrl + "ajax.php",
      data: { action: "renderPokemonCard", pokemonNameOrNumberInput: pokemonNameOrNumberInput}
   }).done(function(msg) {
      $("#ajaxPokemonCardResult").html(msg);
      setTimeout(function() { $("#loadingContainerCard").hide(); }, delayInMilliseconds);
   }).fail(function(jqXHR, textStatus, msg){
      alert("error");
      setTimeout(function() { $("#loadingContainerCard").hide(); }, delayInMilliseconds);
   });
}
// Função Ajax que realiza a requição GET na API PokéAPI (com um valor aleatório, referente ao número – que pode ir de 1 à 898 – do pokémon)
function ajaxPokemonRandom() {
   var baseUrl = document.getElementById('baseUrlInput').value;
   var pokemonNameOrNumberInput = getRandomInt(1,898);
   $("#loadingPage").show();
   $.ajax({
      type: "POST",
      url: baseUrl + "ajax.php",
      data: { action: "renderPokemonCard", pokemonNameOrNumberInput: pokemonNameOrNumberInput}
   }).done(function(msg) {
      $("#ajaxPokemonCardResult").html(msg);
      setTimeout(function() { $("#loadingPage").hide(); }, delayInMilliseconds);
   }).fail(function(jqXHR, textStatus, msg){
      alert("error");
      setTimeout(function() { $("#loadingPage").hide(); }, delayInMilliseconds);
   });
}

function scrollSmoothToBottom() {
   setTimeout(function() { window.scrollTo(0,document.body.scrollHeight); }, 250);
}