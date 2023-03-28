@extends("layout.master")



@section("contenu")
<script src="{{asset('assets/js/script-welcome.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-offerresponsive.css')}}">

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
					@foreach(\App\Models\Offer::pluck('type') as $type)
						<option value="{{ $type }}">{{ $type }}</option>
					@endforeach
				</select>
				<i class="fa-solid fa-play"></i>
			</div>

			<div class = "select">
				<select class="selecteur">
					<option value="">Date</option>
					@foreach(\App\Models\Offer::pluck('release_date') as $release_date)
						<option value="{{ $release_date }}">{{ $release_date }}</option>
					@endforeach
				</select>
				<i class="fa-solid fa-play"></i>
			</div>

			<div class = select>
				<select class="selecteur">
					<option value="">Lieux</option>
					@foreach(\App\Models\Address::pluck('city') as $city)
						<option value="{{ $city }}">{{ $city }}</option>
					@endforeach
				</select>
				<i class="fa-solid fa-play"></i>
			</div>

			<div class = "select" id="Domaine">
				<select class="selecteur" id="Domaines">
				<option value="">Domaine</option>
					@foreach(\App\Models\area_activity::pluck('name') as $name)
						<option value="{{ $name }}">{{ $name }}</option>
					@endforeach
				</select>
				<i class="fa-solid fa-play"></i>
			</div>

			<div class = "select" id="Entreprise" >
				<select class="selecteur" id="Entreprises">>
				<option value="">Entreprise</option>
					@foreach(\App\Models\Company::pluck('name') as $name)
						<option value="{{$name }}">{{ $name }}</option>
					@endforeach
				</select>
				<i class="fa-solid fa-play"></i>
			</div>
		</div>
    </form>

<div class="container-offer">


    <div class="container-form-offer2">
        <div class="card-form-offer">

			<h1 class="titre">
                {{ $offer->title }}
			</h1>
			<div class="entreprise">
					<div class="titreentreprise">
                        {{ $offer->company->name}}
					</div>
					<div class="note">
                        {{ number_format($offer->company->trust, 2, ',', ' ') }}
					</div>
					<i class="fa-solid fa-star"></i>
			</div>
			<br>
			<div >
				<span class="lieux">{{ $offer->address->city}}</span>
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
				<h2>{!! Str::limit($offer->description, 50) !!}</h2>
			</div>
			<div class="description">
			</div>
		</div>

	</div>
    </div>
@endsection
