@extends("layout.master")

@section("contenu")

@include("layout.section_search_all_role")
<script src="{{asset('assets/js/script-etudiant.js')}}"></script>
<div class="container-student">
    <div class="container-student-list">
        <button class ="user-add" type="button">Ajouter etudiant</button>

        <div class="users-list">
            @foreach ($users as $user)
                <div class="user-item" id="{{ $user->id }}">
                    <div class="title-item">
                        <div class="pp-circle">
                            @if($user->pp_path)
                                <img src="profil-picture/{{ $user->pp_path }}" alt="Photo de profil">
                            @else
                                <div class="pp-initials"></div>
                                <!-- <div class="pp-initials">{{ substr($user->firstname, 0, 1) }}{{ substr($user->lastname, 0, 1) }}</div> -->
                            @endif
                        </div>
                        <h3 class="user-name">{{ $user->firstname}} {{ $user->lastname}}</h3>
                        <p class="user-firstname" style="display: none">{{ $user->firstname}}</p>
                        <p class="user-lastname" style="display: none">{{ $user->lastname}}</p>
                    </div>
                    <div class="description">
                        <p class="user-email">{{ $user->email}}</p>
                        <p>{{ $user->grade}} {{ $user->campus}}</p>
                        <p class="user-grade" style="display: none">{{ $user->grade}}</p>
                        <p class="user-campus" style="display: none">{{ $user->campus}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container-form-student">
        <div class="card-form-student" >
            <form class="form-student" method="post" action="{{ route('register') }}">
                @csrf
                <div class="">
                    <div class="">
                        <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" required autocomplete="firstname" autofocus placeholder="Nom">
                        @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" required autocomplete="lastname" autofocus placeholder="Prénom">
                        @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="">
                    <div class="">
                        <input id="campus" type="text" class="form-control @error('campus') is-invalid @enderror" name="campus" required autocomplete="campus" autofocus placeholder="Centre">
                        @error('campus')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="">
                    <div class="">
                        <input id="grade" type="text" class="form-control @error('grade') is-invalid @enderror" name="grade" required autocomplete="grade" autofocus placeholder="Promotion">
                        @error('grade')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="">
                    <div class="">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" placeholder="Mail">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-student-buttons">
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