@extends("layout.master")

@section("contenu")
<script src="{{asset('assets/js/script-profile.js')}}"></script>
<div class="profile-container">
    <div class="title-and-circle">
        <h1>{{ $user->lastname }} {{ $user->firstname }}</h1>
        <!-- <div class="circle">
            @if($user->pp_path)
                <img src="chemin/vers/image.jpg" alt="Photo de profil">
            @endif
            <form action="{{ route('pp.upload') }}" method="POST" enctype="multipart/form-data" id="pp-update-form">
                @csrf
                @method('PATCH')
                <div>
                    <input type="file" name="file" id="inputPPUpload" class="form-control @error('file') is-invalid @enderror" style="">
                </div>
            </form>
        </div> -->
        <div class="circle">
            @if($user->pp_path)
                <img src="profil-picture/{{ $user->pp_path }}" alt="Photo de profil">
            @else
                <div class="initials">{{ substr($user->firstname, 0, 1) }}{{ substr($user->lastname, 0, 1) }}</div>
            @endif
            <form action="{{ route('pp.upload') }}" method="POST" enctype="multipart/form-data" id="pp-upload-form">
                @csrf
                @method('PATCH')
                <label for="inputPPUpload" id="pp-upload-btn"></label>
                <input type="file" name="file" id="inputPPUpload" class="form-control @error('file') is-invalid @enderror" style="display:none">
            </form>
        </div>
    </div>
    <div class="info">
        <h3>Email : {{ $user->email }}</h3>
        <h3>Campus : {{ $user->campus }}</h3>
        <h3>Promotion : {{ $user->grade }}</h3>
    </div>

    @error('file')
        <span class="text-danger">{{ $message }}</span>
    @enderror

    @if (auth()->user()->permission == "user")
    <div class="cv">
        <h2>CV</h2>
        <div class="cv-rect">
            <i class="fa-regular fa-file-pdf fa-3x"></i>
            <div class="cv-info">
                @if($hasCv)
                    <p>Votre CV a été ajouté le {{$cv->updated_at}}.</p>
                @else
                    <p>Veuillez ajouter votre CV.</p>
                @endif
            </div>
            <button class="options-btn"><i class="fa-solid fa-ellipsis-vertical fa-2x"></i></button>
            <div class="dropdown-menu">
                @if($hasCv)
                    <a href="#" class="update-cv-option">Mettre a jour votre CV</a>
                    <form action="{{ route('cv.update') }}" method="POST" enctype="multipart/form-data" id="file-update-form">
                        @csrf
                        @method('PUT')
                        <div>
                            <input type="file" name="file" id="inputFileUpdate" class="form-control @error('file') is-invalid @enderror" style="display: none">
                        </div>
                    </form>

                    <a href="/cv/{{$cv->file_name}}" target="_blank">Consulter votre CV</a>

                    <!-- <a href="{{ route('cv.download') }}" class="download-cv-option">Télécharger votre CV</a>
                    <form action="{{ route('cv.download') }}" method="POST" enctype="multipart/form-data" id="file-download-form">
                        @csrf

                    </form> -->

                    <a href="#" class="delete-cv-option">Supprimer votre CV</a>
                    <form action="{{ route('cv.delete') }}" method="POST" enctype="multipart/form-data" id="file-delete-form">
                        @csrf
                        @method('DELETE')
                        <div>
                            <!-- @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror -->
                        </div>
                    </form>
                @else
                    <a href="#" class="upload-cv-option">Ajouter votre CV</a>
                    <form action="{{ route('cv.upload') }}" method="POST" enctype="multipart/form-data" id="file-upload-form">
                        @csrf
                        <div>
                            <input type="file" name="file" id="inputFileUpload" class="form-control @error('file') is-invalid @enderror" style="display: none">

                            <!-- @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror -->
                        </div>

                    </form>
                @endif
            </div>
        </select>
        </div>
    </div>
    @endif
</div>
@endsection