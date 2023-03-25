@extends("layout.master")

@section("contenu")
<form class="search_filter" type="get" action="">
		<section class="container">
  			<div>
  				<i class="fa-solid fa-magnifying-glass"></i>
    			<input type="search" name="" id="search" placeholder="Métier, mots-clés, entreprise, compétences...">
  			</div>
  			<button type="submit" value="Submit">Rechercher</button>
		</section>
		<div class="filter">
			<div class = "select">
				<select class="selecteur">
					<option value="">Type</option>
					<option value="">First</option>
					<option value="">First</option>
					<option value="">First</option>
				</select>
				<i class="fa-solid fa-play"></i>
			</div>

			<div class = "select">
				<select class="selecteur">
					<option value="">Date</option>
					<option value="">First</option>
					<option value="">First</option>
					<option value="">First</option>
				</select>
				<i class="fa-solid fa-play"></i>
			</div>

			<div class = select>
				<select class="selecteur">
					<option value="">Lieux</option>
					<option value="">First</option>
					<option value="">First</option>
					<option value="">First</option>
				</select>
				<i class="fa-solid fa-play"></i>
			</div>

			<div class = "select" id="Domaine">
				<select class="selecteur" id="Domaines">
					<option value="">Domaine</option>
					<option value="">First</option>
					<option value="">First</option>
					<option value="">First</option>
				</select>
				<i class="fa-solid fa-play"></i>
			</div>

			<div class = "select" id="Entreprise" >
				<select class="selecteur" id="Entreprises">>
					<option value="">Entreprise</option>
					<option value="">First</option>
					<option value="">First</option>
					<option value="">First</option>
				</select>
				<i class="fa-solid fa-play"></i>
			</div>
		</div>
</form>

<div class="display">
	<div class="display-list_offer">
		@foreach ($offers as $offer)
			@php
				{{$applied = in_array($offer->id, $appliedOffers);}}
				{{$followed = in_array($offer->id, $followedOffers);}}
            @endphp


			<div class="annonce" id="{{ $offer->id}}">
				<div class="title_offer">
					<img src="" alt="logo">
					<h3 class="name_entreprise">{{ $offer->title}}</h3>
				</div>
				<div class="description">
					<p class="petite_note"> {{ $offer->company->name}} {{ number_format($offer->company->trust, 2, ',', ' ') }} <i class="fa-solid fa-star"></i> </p>
					<p class ="lieu">{{ $offer->address->city}}</p>
					<p class="txtdescription" data-description="{{ $offer->description }}">{{ Str::limit($offer->description, 50) }}</p>
				</div>
			</div>
		@endforeach
	</div>
</div>

<div class="grande_offre">
        <h1 class="titre">

        </h1>
        <div class="entreprise">
                <div class="titreentreprise">

                </div>
                <div class="note">

                </div>
                	<i class="fa-solid fa-star"></i>
                </div>
                <br>
                <div >
                    <span class="lieux"></span>
                </div>
                <br>
				<form class="form-offer" method="post" action="">
					@csrf
					<div class="divbtns">
						<div class="divpostul">
							@if (!$applied)
								<button class="btnpostul" type="submit">Postuler</button>
							@endif
						</div>

						<div class="divfavoris">
							@if ($followed)
								<button class="btnfavoris clicked"><i class="fa-solid fa-heart"></i></button>
							@else
								<button class="btnfavoris"><i class="fa-solid fa-heart"></i></button>
							@endif
						</div>
					</div>
				</form>
    <div class="titredescription">
        <h2></h2>
    </div>
        <div class="description">

        </div>
    </div>
</div>

@endsection