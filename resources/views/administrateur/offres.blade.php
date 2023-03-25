@extends("layout.master")

@section("contenu")

@include("layout.section_search_all_role")
<script src="{{asset('assets/js/script-offer.js')}}"></script>
<script src="//cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<div class="container-offer">
    <div class="container-offer-list">
        <button class ="offer-add" type="button">Ajouter une offre</button>

        <div class="offer-list">
            @foreach ($offers as $offer)
                <div class="offer-item" id="{{ $offer->id}}">
                    <div class="title-item">
                        <img src="" alt="logo">
                        <h3 class="offer-title">{{ $offer->title}}</h3>
                    </div>
                    <div class="description">
                        <p> {{ $offer->company->name}} {{ number_format($offer->company->trust, 2, ',', ' ') }} <i class="fa-solid fa-star"></i> </p>
                        <p>{{ $offer->address->city}}</p>
                        <p>{{ Str::limit($offer->description, 50) }}</p>
                        <p class="offer-company" style="display: none">{{ $offer->company->name}}</p>
                        <p class="offer-address" style="display: none">{{ $offer->address->city}}</p>
                        <p class="offer-type" style="display: none">{{ $offer->type}}</p>
                        <p class="offer-date" style="display: none">{{ $offer->release_date}}</p>
                        <p class="offer-skills" style="display: none">{{ $offer->skills}}</p>
                        <p class="offer-salary" style="display: none">{{ $offer->salary}}</p>
                        <p class="offer-numberofplaces" style="display: none">{{ $offer->number_of_places}}</p>
                        <p class="offer-description" style="display: none">{{ $offer->description}}</p>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container-form-offer">
        <div class="card-form-offer" >
            <form class="form-offer" method="post" action="{{ route('register/offre') }}">
                @csrf
                <div class="">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title')}}" required autocomplete="title" autofocus placeholder="Titre de l'offre">

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nom de l'entreprise">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="">
                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus placeholder="Lieux">

                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="">
                    <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" required autocomplete="type" autofocus placeholder="Type de poste">

                    @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="">
                    <input id="release_date" type="date" class="form-control @error('release_date') is-invalid @enderror" name="release_date" value="{{ old('release_date') }}" required autocomplete="release_date" placeholder="Durée">

                    @error('release_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="">
                    <input id="skills" type="text" class="form-control @error('skills') is-invalid @enderror" name="skills" value="{{ old('skills') }}" required autocomplete="skills" placeholder="Compétences">

                    @error('skills')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="">
                    <input id="salary" type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}" required autocomplete="salary" placeholder="Rémunérations">

                    @error('salary')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="">
                    <input id="number_of_places" type="number" class="form-control @error('number_of_places') is-invalid @enderror" name="number_of_places" value="{{ old('number_of_places') }}" required autocomplete="number_of_places" placeholder="Nombre de place">

                    @error('salary')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="">
                    <input id="duration" type="number" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{ old('duration') }}" required autocomplete="duration" placeholder="duration">

                    @error('duration')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="text_area">
                <label for="description">Description:</label></br>
                <textarea id="description" name="descriptions" rows="10" cols="70"></textarea>

                </div>

                <div class="form-offer-buttons">
                    <button id="submit" type="submit">
                        {{ __('Soumettre') }}
                    </button>
                    <button href=""  id="delete" type="delete" class="">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection