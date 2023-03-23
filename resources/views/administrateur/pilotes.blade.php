@extends("layout.master")

@section("contenu")

@include("layout.section_search_all_role")
<script src="{{asset('assets/js/script-pilote.js')}}"></script>
<div class="container-pilote">
    <div class="container-pilote-list">
        <button class ="pilote-add" type="button">Ajouter pilote</button>

        <div class="users-list">
            @foreach ($pilotes as $pilote)
                <div class="pilote-item" id="{{ $pilote->id }}">
                    <div class="title-item">
                        <div class="pp-circle">
                            @if($pilote->pp_path)
                                <img src="/profil-picture/{{ $pilote->pp_path }}" alt="Photo de profil">
                            @else
                                <div class="pp-initials"></div>
                                <!-- <div class="pp-initials">{{ substr($pilote->firstname, 0, 1) }}{{ substr($pilote->lastname, 0, 1) }}</div> -->
                            @endif
                        </div>
                        <h3 class="pilote-name">{{ $pilote->firstname}} {{ $pilote->lastname}}</h3>
                        <p class="pilote-firstname" style="display: none">{{ $pilote->firstname}}</p>
                        <p class="pilote-lastname" style="display: none">{{ $pilote->lastname}}</p>
                    </div>
                    <div class="description">
                        <p class="pilote-email">{{ $pilote->email}}</p>
                        <p>{{ $pilote->grade}} {{ $pilote->campus}}</p>
                        <p class="pilote-grade" style="display: none">{{ $pilote->grade}}</p>
                        <p class="pilote-campus" style="display: none">{{ $pilote->campus}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container-form-pilote">
        <div class="card-form-pilote" >
            <form class="form-pilote" method="post" action="{{ route('register') }}">
                @csrf

                <div class="">
                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" required autofocus placeholder="Nom">
                    @error('firstname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="">
                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" required placeholder="Prénom">
                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>



                <div class="">
                    <input id="campus" type="text" class="form-control @error('campus') is-invalid @enderror" name="campus" required placeholder="Centre">
                    @error('campus')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="">
                    <input id="grade" type="text" class="form-control @error('grade') is-invalid @enderror" name="grade" required placeholder="Promotion">
                    @error('grade')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required placeholder="Mail">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <input id="permission" type="hidden" value="pilote" name="permission">

                <div class="form-pilote-buttons">
                    <button id="submit" type="submit" class="">
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