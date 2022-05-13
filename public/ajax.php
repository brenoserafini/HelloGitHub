<?php

   include("./components.php");
   
   if (isset($_POST['action'])) {
      switch ($_POST['action']) {
         case 'renderPokemonCard':
               renderPokemonCard();
               break;
      }
   }

   // Função para retornar o id do pokémon com base em seu nome
   function returnPokemonId($pokemonName) {
      $requestUrl = "https://pokeapi.co/api/v2/pokemon/$pokemonName";
      $ch = curl_init($requestUrl);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
      $result = curl_exec($ch);
      curl_close($ch);
      $resultDecode = json_decode($result);
      return $resultDecode->id;
      exit;
   }

   // Função que retorna a url para obter a chave de evolução do pokémon com base em sua espécie
   // https://github.com/PokeAPI/pokeapi/issues/337
   function returnEvolutionChainUrl($id) {
      $requestUrl = "https://pokeapi.co/api/v2/pokemon-species/$id";
      $ch = curl_init($requestUrl);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
      $result = curl_exec($ch);
      curl_close($ch);
      $resultDecode = json_decode($result);
      return $resultDecode->evolution_chain->url;
      exit;
   }

   // Função para retornar a chave de evolução do pokémon
   // https://localcoder.org/pokeapi-angular-how-to-get-pokemons-evolution-chain – para investigar solução para pokémons com múltiplas evoluções
   function returnEvolutionChain($evolutionChainUrl) {
      $requestUrl = $evolutionChainUrl;
      $ch = curl_init($requestUrl);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
      $result = curl_exec($ch);
      curl_close($ch);
      $resultDecode = json_decode($result);

      $pokemonEvolutionChain = Array();
      if(!empty($resultDecode->chain->species->name)) :
         $pokemonId = returnPokemonId($resultDecode->chain->species->name);
         $urlCover = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/$pokemonId.png";
         $arrayToPush = Array(
            "id" => $pokemonId,
            "name" => $resultDecode->chain->species->name,
            "urlImage" => $urlCover
         );
         array_push($pokemonEvolutionChain, $arrayToPush);
      endif;
      if(!empty($resultDecode->chain->evolves_to[0]->species->name)) :
         $pokemonId = returnPokemonId($resultDecode->chain->evolves_to[0]->species->name);
         $urlCover = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/$pokemonId.png";
         $arrayToPush = Array(
            "id" => $pokemonId,
            "name" => $resultDecode->chain->evolves_to[0]->species->name,
            "urlImage" => $urlCover
         );
         array_push($pokemonEvolutionChain, $arrayToPush);
      endif;
      if(!empty($resultDecode->chain->evolves_to[0]->evolves_to[0]->species->name)) :
         $pokemonId = returnPokemonId($resultDecode->chain->evolves_to[0]->evolves_to[0]->species->name);
         $urlCover = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/$pokemonId.png";
         $arrayToPush = Array(
            "id" => $pokemonId,
            "name" => $resultDecode->chain->evolves_to[0]->evolves_to[0]->species->name,
            "urlImage" => $urlCover
         );
         array_push($pokemonEvolutionChain, $arrayToPush);
      endif;
      return $pokemonEvolutionChain;
      exit;
   }
         
   function renderPokemonCard() {

      $requestUrl = "https://pokeapi.co/api/v2/pokemon/" . strtolower($_POST['pokemonNameOrNumberInput']);
      $ch = curl_init($requestUrl);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
      $result = curl_exec($ch);
      curl_close($ch);
      $resultDecode = json_decode($result); 

      $urlCover = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/" . $resultDecode->id . ".png";

      $i = 0;
      $pokemonTypes = Array();
      foreach ($resultDecode->types as $type) {
         $i++;
         array_push($pokemonTypes, $type);
         if ($i == 1) : $pokemonType = $type->type->name; endif;
      }

      $pokemonEvolutionChain = returnEvolutionChain(returnEvolutionChainUrl($resultDecode->id));
      $data = array(
         "name" => $resultDecode->name,
         "number" => $resultDecode->id,
         "id" => $resultDecode->id,
         "height" => $resultDecode->height*10 . " cm", // height*10 => dm to cm
         "weight" => $resultDecode->weight/10 . " kg", // weight/10 => hg para kg
         "baseXp" => $resultDecode->base_experience,
         "type" => $pokemonType,
         "types" => $pokemonTypes,
         "urlImage" => $urlCover,
         "pokemonEvolutionChain" => $pokemonEvolutionChain
      );
      renderPokemonCardInner($data);
      exit;
   }

?>