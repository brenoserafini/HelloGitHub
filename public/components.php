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
         <span class="shape"></span>
         <div class="pokemonImageContainer">
            <img src="<?php echo ($data["urlImage"]); ?>" alt="<?php echo ($data["name"]); ?>" width="100%">
         </div>
         <span class="badge rounded-pill badge-pokemonNumber mono mb-2">#<?php echo ($data["number"]); ?></span>
         <p class="mb-0 pokemonType"> <small>Type: <?php echo ($data["type"]); ?></small> </p>
      </div>
   </div>
   <div class="pokemonContainerInfo bg-pokemon-<?php echo ($data["type"]); ?>">
      <ul id="nav-pills" class="nav justify-content-center nav-pills mb-4" role="tablist">
         <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#pills-sumamary" type="button" role="tab" aria-controls="pills-sumamary" aria-selected="true"><span>Summary</span></button>
         </li>
         <li class="nav-item">
            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-evolutions" type="button" role="tab" aria-controls="pills-evolutions" aria-selected="false"><span>Evolutions</span></button>
         </li>
      </ul>
      <div class="tab-content text-left">
         <div class="tab-pane fade show active text-center" id="pills-sumamary" role="tabpanel">Summary</div>
         <div class="tab-pane fade text-center" id="pills-evolutions" role="tabpanel">Evolutions</div>
      </div>
   </div>
<?php } ?>