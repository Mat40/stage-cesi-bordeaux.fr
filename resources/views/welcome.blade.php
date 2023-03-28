@extends("layout.master")



@section("contenu")
<script src="{{asset('assets/js/script-welcome.js')}}"></script>
<form class="search_filter" type="get" action="{{route('offer/search')}}">
		<section class="container">
  			<div>
  				<i class="fa-solid fa-magnifying-glass"></i>
    			<input type="search" name="q" id="search" placeholder="Métier, mots-clés, entreprise, compétences...">
  			</div>
  			<button type="submit" value="Submit">Rechercher</button>
		</section>
		<div class="filter">
			<div class = "select">
				<select class="selecteur">
				<option value="">Type</option>
					@foreach(\App\Models\Offer::pluck('type')->unique() as $type)
						<option value="{{ $type }}">{{ $type }}</option>
					@endforeach
				</select>
				<i class="fa-solid fa-play"></i>
			</div>

			<div class = "select">
				<select class="selecteur">
					<option value="">Date</option>
					@foreach(\App\Models\Offer::pluck('release_date')->unique() as $release_date)
						<option value="{{ $release_date }}">{{ $release_date }}</option>
					@endforeach
				</select>
				<i class="fa-solid fa-play"></i>
			</div>

			<div class = select>
				<select class="selecteur">
					<option value="">Lieux</option>
					@foreach(\App\Models\Address::pluck('city')->unique() as $city)
						<option value="{{ $city }}">{{ $city }}</option>
					@endforeach
				</select>
				<i class="fa-solid fa-play"></i>
			</div>

			<div class = "select" id="Domaine">
				<select class="selecteur" id="Domaines">
				<option value="">Domaine</option>
					@foreach(\App\Models\area_activity::pluck('name')->unique() as $name)
						<option value="{{ $name }}">{{ $name }}</option>
					@endforeach
				</select>
				<i class="fa-solid fa-play"></i>
			</div>

			<div class = "select" id="Entreprise" >
				<select class="selecteur" id="Entreprises">>
				<option value="">Entreprise</option>
					@foreach(\App\Models\Company::pluck('name')->unique() as $name)
						<option value="{{ $name }}">{{ $name }}</option>
					@endforeach
				</select>
				<i class="fa-solid fa-play"></i>
			</div>
		</div>
</form>

<div class="container-offer">
	<div class="container-offer-list">
		<div class="offer-list">
			@foreach ($offers as $offer)
				@php
					{{$applied = in_array($offer->id, $appliedJobs);}}
					{{$followed = in_array($offer->id, $followedOffers);}}
				@endphp


				<div class="offer-item" id="{{ $offer->id}}">
					<div class="title-item">
						<!-- <img src="" alt="logo"> -->
						<h3 class="offer-title">{{ $offer->title }}</h3>
					</div>
					<div class="description">
						<p class="company-trust"> {{ $offer->company->name}} {{ number_format($offer->company->trust, 2, ',', ' ') }} <i class="fa-solid fa-star"></i> </p>
						<p class ="offer-city">{{ $offer->address->city}}</p>
						<p class="offer-description" data-description="{{ $offer->description }}">{!! Str::limit($offer->description, 50) !!}</p>
					</div>
				</div>
			@endforeach
		</div>
	</div>

    <div class="container-form-offer2">
        <div class="card-form-offer">
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
						@if($hasCv)
							<button class="btnpostul" type="submit">Postuler</button>
						@else
							<button class="btnpostul" type="submit" style="font-size: 15px" disabled>Veuillez ajouter un CV</button>
						@endif
					</div>

					<div class="divfavoris">
						<button class="btnfavoris @if($followed) clicked @endif">
							<i class="fa-solid fa-heart"></i>
						</button>
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
</div>

@endsection