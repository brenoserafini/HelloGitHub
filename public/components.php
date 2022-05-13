<?php
// whitelist (referente às urls/endereços no ambiente localhost de desenvolvimento) para a Persora 2.0
$devzone = array( 'localhost:8000', 'localhost:8888', '::1' );
$prod = array( 'brenoserafini.com' );

global $baseUrl;

if ( in_array($_SERVER['HTTP_HOST'], $devzone) ) : 
   $baseUrl = "http://" . $_SERVER['HTTP_HOST'] . "/";
elseif ( in_array($_SERVER['HTTP_HOST'], $prod) ) : 
   $baseUrl = "https://brenoserafini.com/pokemons/";
endif;

?>
<?php function renderLoadingPage() { ?>
   <div id="loadingPage">
      <div class="dot-bricks dot-align"></div>
      <p class="description ds-color-azulNeutro"></p>
   </div>
<?php } ?>
<?php function renderLoadingContainerCard() { ?>
   <div id="loadingContainerCard">
      <div class="dot-bricks dot-align"></div>
      <p class="description ds-color-azulNeutro"></p>
   </div>
<?php } ?>
<?php function renderPokemonCardInner($data) { ?>
   <div class="pokemonContainerCover bg-pokemon-<?php echo ($data["type"]); ?>">
      <div class="pokemonCover text-center pt-4">
         <h2 class="pokemonName mb-4 text-capitalize"><?php echo ($data["name"]); ?></h2>
         <span class="badge rounded-pill badge-pokemonNumber mono mb-2">#<?php echo ($data["number"]); ?></span>
         <span class="shape"></span>
         <div class="pokemonImageContainer">
            <img src="<?php echo ($data["urlImage"]); ?>" alt="<?php echo ($data["name"]); ?>" width="100%">
         </div>
         <p class="mb-0 pokemonType"> <small>Type: <?php foreach( $data["types"] as $type) : echo "<span class='text-capitalize badgeType'> " .$type->type->name . "</span> "; endforeach; ?></small> </p>
      </div>
   </div>
   <div class="pokemonContainerInfo bg-pokemon-<?php echo ($data["type"]); ?>">
      <ul id="nav-pills" class="nav justify-content-center nav-pills mb-4" role="tablist">
         <li class="nav-item">
            <button onClick="scrollSmoothToBottom();" class="nav-link active" data-bs-toggle="pill" data-bs-target="#pills-sumamary" type="button" role="tab" aria-controls="pills-sumamary" aria-selected="true"><span>Summary</span></button>
         </li>
         <li class="nav-item">
            <button onClick="scrollSmoothToBottom();" class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-evolutions" type="button" role="tab" aria-controls="pills-evolutions" aria-selected="false"><span>Evolutions</span></button>
         </li>
      </ul>
      <div class="tab-content text-left pb-4">
         <div class="tab-pane fade show active text-center" id="pills-sumamary" role="tabpanel">
            <?php 
               echo "BaseXp: " . $data["baseXp"] . "<br/>";
               echo "Height: " . $data["height"] . "<br/>";
               echo "Weight: " . $data["weight"];
            ?>
         </div>
         <div class="tab-pane fade text-center" id="pills-evolutions" role="tabpanel">
            <div class="swiper pokemonEvolutionChaisSwiper">
               <div class="swiper-wrapper">
                  <?php foreach( $data["pokemonEvolutionChain"] as $pokemonStage) : ?>
                     <div class="swiper-slide">
                        <div>
                           <img src="<?php echo ($pokemonStage["urlImage"]); ?>" alt="<?php echo ($pokemonStage["name"]); ?>" width="100%" class="mb-1"><br/>
                           <h3 class="pokemonName mb-4 text-capitalize"><?php echo $pokemonStage["name"]; ?></h3>
                        </div>
                     </div>
                  <?php endforeach; ?>
               </div>
               <div class="swiper-pagination"></div>
            </div>
         </div>
      </div>
   </div>
   <!-- Inicializa o Swiper -->
   <script>
      var swiper = new Swiper(".pokemonEvolutionChaisSwiper", {
         effect: "cards",
            grabCursor: true,
         pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true,
         },
      });
   </script>
   <script>
      document.getElementById("pokemonCardContainer").className = "";
      document.getElementById("pokemonCardContainer").classList.add("pokemonCardContainer")
      document.getElementById("pokemonCardContainer").classList.add("bg-pokemon-<?php echo ($data["type"]); ?>")
   </script>
<?php } ?>