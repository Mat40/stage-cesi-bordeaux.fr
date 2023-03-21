@extends("layout.master")

@section("contenu")

@include("layout.section_search_all_role")
<script src="{{asset('assets/js/script-etudiant.js')}}"></script>
<div class="display">
<button class ="add" type="button">+Ajouter pilote</button>

<div class="display-list_offer_min">

@foreach ($user as $users)
   
	<div class="annonce" id="{{ $users->id }}">
		<div class="title_offer">
			<img src="" alt="logo"> 
			<h3 class="name_entreprise">{{ $users->firstname}} {{ $users->lastname}}</h3>
		</div>
		<div class="description">
			<p class="email">{{ $users->email}}</p>
            <p class="grade_campus">{{ $users->grade}} {{ $users->campus}}</p>
            
		</div>
	</div>  
@endforeach

</div>         		


  <div class="position_student" > 

        <form class="form_creation" method="post" action="{{ route('register') }}">
            @csrf
                        <div class="">
                            

                            <div class="">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname')}}" required autocomplete="firstname" autofocus placeholder="Nom">

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">

                            <div class="">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus placeholder="Prénom">

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">

                            <div class="">
                                <input id="campus" type="text" class="form-control @error('campus') is-invalid @enderror" name="campus" value="{{ old('campus') }}" required autocomplete="campus" autofocus placeholder="Centre">

                                @error('campus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <div class="">
                                <input id="grade" type="text" class="form-control @error('grade') is-invalid @enderror" name="grade" value="{{ old('grade') }}" required autocomplete="grade" autofocus placeholder="promotion">

                                @error('grade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            <div class="button_delete_submit">
                                <button id="soumettre" type="submit" class="">
                                    {{ __('Soumettre') }}
                                </button>
                                <a href="Update/{{$users->id}}"  id="update" type="update" class="">
                                    {{ __('update') }}
                                </a>
                                <a href="SoftDelete/{{$users->id}}"  id="delete" type="delete" class="">
                                <i class="fa-solid fa-trash-can"></i>
                                </a>
                               
                            </div>
                        
        </form>

    </div>
</div>

@endsection