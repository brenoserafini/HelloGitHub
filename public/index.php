<?php include("./components.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">

   <head>
      <title>Pokédex</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Pokédex">
      <meta name="keywords" content="pokédex, pokémon">
      <meta name="author" content="Breno Serafini">
      <!-- Bootstrap minified CSS -->
      <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
      <!-- Fontawesome minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
      <!-- https://nzbin.github.io/three-dots/ -->
      <link href="./assets/css/three-dots.css" rel="stylesheet">
      <!-- My Custom CSS -->
      <link href="./assets/css/custom.css" rel="stylesheet">
      <!-- Bootstrap Bundle JavaScript -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   </head>

   <body>
      <!-- Loading para o body -->
      <?php renderLoadingPage(); ?>
      <div class="container h-100 containerBlockResponsive">
         <!-- Link para o repositório no GitHub -->
         <a href="https://github.com/brenoserafini/HelloGitHub/" target="_blank">
            <span class="githubBadge" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title="brenoserafini/HelloGitHub/"><i class="fa-brands fa-github"></i></span>
         </a>
         <!-- Search Gengar -->
         <img id="btnSearchGengar" src="./assets/img/gengar.png" class="gengar-fixed cursor-pointer" alt="">
         <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="row rowBlockResponsive bg-pokemon-fyre">
               <div class="col-12 p-0">
                  <div id="pokemonCardContainer">
                     <!-- Loading para o pokemonCardContainer -->
                     <?php renderLoadingContainerCard(); ?>
                     <!-- Form para digitar o nome ou número do pokémon -->
                     <div class="formHeader">
                        <input id="baseUrlInput" type="hidden" value="<?php echo $baseUrl; ?>">
                        <input id="pokemonNameOrNumberInput" type="text" class="form-control pokemonNameOrNumberInput" spellcheck="false"> 
                        <button id="btnSearch" class="btn btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                     </div>
                     <!-- Elemento no qual o será renderizado o card do pokémon -->
                     <div id="ajaxPokemonCardResult"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>

   <footer>
      <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src="./assets/js/custom.js"></script>
   </footer>

</html>