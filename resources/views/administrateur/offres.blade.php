@extends("layout.master")

@section("contenu")

@include("layout.section_search_all_role")
<script src="{{asset('assets/js/script-etudiant.js')}}"></script>
<div class="display">
<button class ="add" type="button">+Ajouter offre</button>

<div class="display-list_offer_min">

@foreach ($offer as $offers)
	<div class="annonce" id="{{ $offers->id}}">
		<div class="title_offer">
			<img src="" alt="logo">
			<h3 class="name_entreprise">{{ $offers->title}}</h3>
		</div>
		<div class="description">
			<p> {{ $offers->company->name}} {{ number_format($offers->company->trust, 2, ',', ' ') }} <i class="fa-solid fa-star"></i> </p>
			<p>{{ $offers->address->city}}</p>
			<p>{{ Str::limit($offers->description, 50) }}</p>
		</div>
	</div>
@endforeach

</div>


  <div class="position_offer" >

        <form class="form_creation" method="post" action="{{ route('register') }}">
            @csrf
                        <div class="">


                            <div class="">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title')}}" required autocomplete="title" autofocus placeholder="Titre de l'offre">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">

                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nom de l'entreprise">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">

                            <div class="">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus placeholder="Lieux">

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <div class="">
                                <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" required autocomplete="type" autofocus placeholder="Type de poste">

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">

                            <div class="">
                                <input id="release_date" type="date" class="form-control @error('release_date') is-invalid @enderror" name="release_date" value="{{ old('release_date') }}" required autocomplete="release_date" placeholder="Durée">

                                @error('release_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                          <div class="">

                            <div class="">
                                <input id="skills" type="text" class="form-control @error('skills') is-invalid @enderror" name="skills" value="{{ old('skills') }}" required autocomplete="skills" placeholder="Compétences">

                                @error('skills')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                          <div class="">

                            <div class="">
                                <input id="salary" type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}" required autocomplete="salary" placeholder="Rémunérations">

                                @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                          <div class="">

                            <div class="">
                                <input id="number_of_places" type="number" class="form-control @error('number_of_places') is-invalid @enderror" name="number_of_places" value="{{ old('number_of_places') }}" required autocomplete="number_of_places" placeholder="Nombre de place">

                                @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                           <div class="">

                            <div class="text_area">
                            <label for="description">Description:</label></br>
                            <textarea id="description" name="descriptions" rows="10" cols="70"></textarea>

                            </div>
                        </div>

                            <div class="button_delete_submit">
                                <button id="soumettre" type="submit" class="">
                                    {{ __('Soumettre') }}
                                </button>
                                <a href=""  id="update" type="update" class="">
                                    {{ __('Mettre a jour') }}
                                </a>
                                <a href=""  id="delete" type="delete" class="">
                                <i class="fa-solid fa-trash-can"></i>
                                </a>

                            </div>

        </form>

    </div>
</div>
@endsection