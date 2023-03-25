@extends("layout.master")

@section("contenu")

@include("layout.section_search_all_role")
<script src="{{asset('assets/js/script_company.js')}}"></script>
<script src="//cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>

<div class="container-company">
    <div class="container-company-list">
        <button class ="company-add" type="button">+ Ajouter entrerise</button>

            <div class="company-list">
                @foreach ($companies as $company)
                    <div class="company-item" id="{{ $company->id}}">
                        <div class="title_company">
                            <img src="" alt="logo">
                            <h3 class="name_entreprise">{{ $company->name}}   {{ number_format($company->trust, 2, ',', ' ') }} <i class="fa-solid fa-star"></i> </h3>
                            <p class="company_name" style="display: none">{{ $company->name}} </p>
                             <p class="company_trust" data-description="{{ $company->trust }}"style="display: none">{{ number_format($company->trust, 2, ',', ' ') }} </p>
                        </div>
                        <div class="description">
                            @foreach ($company->address as $address)
                                <span class="place">{{ $address->city }}</span>
                                <span class="postal_code" style="display: none">{{ $address->postal_code }}</span>
                            @endforeach
                        </div>
                        @foreach ($company->area_activity as $area)
                            <span class="area">{{$area->name }}</span>
                         @endforeach
                        <p class="description_bdd">{!! $company->description !!}</p>
                        <p class="number_of_trainees" style="display: none">{{$company->number_of_trainees }}</p>
                    </div>
                @endforeach
            </div>
    </div>

        <div class="container-form-company" >
            <div class="card-form-company">
                    <form class="form_company" method="post" action="{{ route('register/company') }}">
                        @csrf
                            <div >
                                <div>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')}}" required autocomplete="name" autofocus placeholder="Nom de l'entreprise">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div >
                                <div>
                                    <input id="area_activity" type="text" class="form-control @error('area_activity') is-invalid @enderror" name="area_activity" value="{{ old('area_activity') }}" required autocomplete="area_activity" autofocus placeholder="Secteur d'activités">
                                    @error('area_activity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <div>
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus placeholder="Lieux">
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div>
                                <div>
                                    <input id="postal_code" type="number" class="form-control @error('city') is-invalid @enderror" name="postal_code" value="{{ old('city') }}" required autocomplete="postal_code" autofocus placeholder="Code postal">
                                    @error('postal_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div >
                                <div>
                                    <input id="number_of_trainees" type="number" class="form-control @error('number_of_trainees') is-invalid @enderror" name="number_of_trainees" value="{{ old('number_of_trainees') }}" required autocomplete="number_of_trainees" autofocus placeholder="Nombre de stage effectués par des étudiants">
                                    @error('number_of_trainees')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="stars">
                                <div class="center-satrs">
                                    <p>Confiance du pilote de formation </p>
                                    <i class="star" data-note="1">&#9733;</i>
                                    <i class="star" data-note="2">&#9733;</i>
                                    <i class="star" data-note="3">&#9733;</i>
                                    <i class="star" data-note="4">&#9733;</i>
                                    <i class="star" data-note="5">&#9733;</i>
                                    <span id="note"> a</span> 
                                </div>
                            </div>
                        <input type="hidden" name="trust" id="trust">
                        <div>
                            <div class="text_area">
                                <label for="description">Description:</label></br>
                                <textarea id="description" name="description" rows="10" cols="70"></textarea>
                            </div>
                        </div>
                        <div class="form-company-buttons">
                            <button id="submit" type="submit" >
                                {{ __('Soumettre') }}
                            </button>
                            <button href=""  id="delete" type="delete">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                </form>
            </div>    
        </div>
</div>

<script>
 const stars = document.querySelectorAll('.star');
let check=false;
stars.forEach(star => {
    star.addEventListener('mouseover', selectStars);
    star.addEventListener('mouseleave', unselectStars);
    star.addEventListener('click', activeSelect);

})

function selectStars(e) {
    const data=e.target;
    const etoiles=previousSiblings(data);
    if(!check){
        etoiles.forEach(etoiles=>{
            etoiles.classList.add('hover');
        })
    }
   
}

function unselectStars(e) {
    const data=e.target;
    const etoiles=previousSiblings(data);
    if(!check){
        etoiles.forEach(etoiles=>{
            etoiles.classList.remove('hover');
        })
    }  
}

function activeSelect(e){
    check=true;
    document.querySelector('#note').innerHTML = 'Note :' + e.target.dataset.note;
    document.querySelector('#trust').value = e.target.dataset.note;
    console.log(e.target.dataset.note);
}

function previousSiblings(data){
    let values=[data];
    while(data=data.previousSibling){
        if(data.nodeName==='I'){
            values.push(data);
        }
    }
    return values;
}
    CKEDITOR.replace( 'description' );
    CKEDITOR.instances['description'].setData(description);
</script>
@endsection
