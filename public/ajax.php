<?php

   include("./components.php");
   
   if (isset($_POST['action'])) {
      switch ($_POST['action']) {
         case 'renderPokemonCard':
               renderPokemonCard();
               break;
      }
   }
         
   function renderPokemonCard() {

      $requestUrl = "https://pokeapi.co/api/v2/pokemon/" . $_POST['pokemonNameOrNumberInput'];
      $ch = curl_init($requestUrl);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
      $result = curl_exec($ch);
      curl_close($ch);
      $resultDecode = json_decode($result); 

      $urlCover = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/" . $resultDecode->id . ".png";

      $i = 0;
      foreach ($resultDecode->types as $type) {
         $i++;
         if ($i == 1) : $pokemonType = $type->type->name; endif;
      }

      $data = array(
         "name" => $resultDecode->name,
         "number" => $resultDecode->id,
         "id" => $resultDecode->id,
         "height" => $resultDecode->height,
         "weight" => $resultDecode->weight,
         "baseXp" => $resultDecode->base_experience,
         "type" => $pokemonType,
         "types" => "",
         "urlImage" => $urlCover
      );
      renderPokemonCardInner($data);
      
      //   echo "Nome: $resultDecode->name <br/>";
      //   echo "Numero: $resultDecode->id <br/>";
      //   echo "Altura: $resultDecode->height <br/>";
      //   echo "Peso: $resultDecode->weight <br/>";
      //   echo "Base XP: $resultDecode->base_experience <br/>";
      //   echo "Tipo: ";
      //   foreach ($resultDecode->types as $type) {
      //      echo $type->type->name . " ";
      //   }
      //   echo "<br/>";
      //   echo "Image: <img src='$urlCover' width='140px'><br/>";
      
      exit;

   }

?>