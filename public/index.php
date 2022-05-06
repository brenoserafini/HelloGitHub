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
				<link href="./resources/css/bootstrap.min.css" rel="stylesheet">
				<!-- Fontawesome minified CSS -->
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
				<!-- My Custom CSS -->
				<link href="./resources/css/custom.css" rel="stylesheet">
				<!-- Bootstrap Bundle JavaScript -->
				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/fontawesome.min.js" integrity="sha512-5qbIAL4qJ/FSsWfIq5Pd0qbqoZpk5NcUVeAAREV2Li4EKzyJDEGlADHhHOSSCw0tHP7z3Q4hNHJXa81P92borQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body>

		<div class="container h-100">
			<a href="https://github.com/brenoserafini/HelloGitHub/" target="_blank"><span class="githubBadge"><i class="fa-brands fa-github"></i></span></a>
			<img src="./resources/img/gengar.png" class="gengar-fixed" alt="">
				<div class="d-flex justify-content-center align-items-center vh-100">
					<div class="row">
						<div class="col-md-12">
							<div class="pokemonCardContainer">
								<div class="pokemonContainerCover bg-pokemon-fire">
									<div class="pokemonCover text-center">
										<h2 class="pokemonName mb-4">Charmeleon</h2>
										<span class="shape"></span>
										<img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/005.png" alt="Charmeleon" width="100%">
										<span class="badge rounded-pill badge-pokemonNumber">#002</span>
										<p><small>Tipo: Fogo</small></p>
									</div>
								</div>
								<div class="pokemonContainerInfo bg-pokemon-fire">
									<ul class="nav justify-content-center nav-pills mb-3" id="pills-tab" role="tablist">
										<li class="nav-item" role="presentation">
											<button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
										</li>
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
										</li>
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
										</li>
									</ul>
									<div class="tab-content text-center" id="pills-tabContent">
										<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">...Home</div>
										<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...Profile</div>
										<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...Contact</div>
									</div>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="input-group input-group-lg">
				<input type="text" class="form-control" aria-label="Sizing example input" size="35" aria-describedby="inputGroup-sizing-lg" placeholder="just type a pokémon name...">
			</div> -->
		</body>
    <footer>
			<!-- reservado para o footer -->
		</footer>
</html>