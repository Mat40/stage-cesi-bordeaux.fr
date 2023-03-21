@extends("layout.master")

@section("contenu")

@include("layout.section_search_all_role")
<script src="{{asset('assets/js/script-etudiant.js')}}"></script>
<div class="display">
<button class ="add" type="button">+Ajouter entrerise</button>

<div class="display-list_offer_min">

@foreach ($companies as $company)
	<div class="annonce" id="{{ $company->id}}">
		<div class="title_offer">
			<img src="" alt="logo"> 
			<h3 class="name_entreprise">{{ $company->name}}   {{ number_format($company->trust, 2, ',', ' ') }} <i class="fa-solid fa-star"></i> </h3>
		</div>
		<div class="description">
			@foreach ($company->address as $address)
                <span class="place">{{ $address->city }}</span>
            @endforeach
		</div>
        <p>{{ $company->description}}</p>
	</div>  
@endforeach

</div>         		


  <div class="position_entreprise" > 

        <form class="form_creation" method="post" action="{{ route('register') }}">
            @csrf
                        <div class="">
                            

                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')}}" required autocomplete="name" autofocus placeholder="Nom de l'entreprise">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">

                            <div class="">
                                <input id="area_activity" type="text" class="form-control @error('area_activity') is-invalid @enderror" name="area_activity" value="{{ old('area_activity') }}" required autocomplete="area_activity" autofocus placeholder="Secteur d'activités">

                                @error('area_activity')
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
                                <input id="number_of_trainees" type="text" class="form-control @error('number_of_trainees') is-invalid @enderror" name="number_of_trainees" value="{{ old('number_of_trainees') }}" required autocomplete="number_of_trainees" autofocus placeholder="Nombre de stage effectués par des étudiants">

                                @error('number_of_trainees')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="stars">
                            <div class="">
                               <!-- <input id="trust" type="text" class="form-control @error('trust') is-invalid @enderror" name="trust" value="{{ old('trust') }}" required autocomplete="trust" placeholder="confiance du pilote de formation ">

                                @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror!-->
                                <p>confiance du pilote de formation </p>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
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
                                    {{ __('update') }}
                                </a>
                                <a href=""  id="delete" type="delete" class="">
                                <i class="fa-solid fa-trash-can"></i>
                                </a>
                               
                            </div>
                        
        </form>

    </div>
</div>
@endsection