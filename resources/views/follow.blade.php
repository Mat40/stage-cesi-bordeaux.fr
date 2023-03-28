@extends("layout.master")

@section("contenu")

@include("layout.section_search_all_follow")
<script src="{{asset('assets/js/script-welcome.js')}}"></script>

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



@endsection
