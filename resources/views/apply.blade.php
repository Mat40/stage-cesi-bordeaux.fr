@extends("layout.master")

@section("contenu")

@include("layout.section_search_all_follow")

<div class="display">
	<div class="display-list_offer">
		@foreach ($offers as $offer)
			@php
				{{$applied = in_array($offer->id, $appliedJobs);}}
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
					<p class="txtdescription" data-description="{{ $offer->description }}">{!! Str::limit($offer->description, 50) !!}</p>
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
