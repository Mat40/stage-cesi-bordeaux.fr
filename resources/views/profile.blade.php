@extends("layout.master")

@section("contenu")
<div>

    <div>

      <div>
      </div>

      <div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if($hasCv)
            <p>Vous avez déjà téléchargé un CV.</p>
        @else

            <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div>
                    <label class="form-label" for="inputFile">File:</label>
                    <input
                        type="file"
                        name="file"
                        id="inputFile"
                        class="form-control @error('file') is-invalid @enderror">

                    @error('file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>

            </form>
        @endif
      </div>
    </div>
</div>
@endsection