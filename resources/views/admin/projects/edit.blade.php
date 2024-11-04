@extends('layouts.app')

@section('page-title', 'Modifica' .$project->title)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-info">
                        Modifica {{ $project->title }}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" id="title" required minlength="3" maxlength="255" value="{{ old('title', $project->title) }}" placeholder="Inserisci qui il Titolo...">
                          </div>

                          <div class="mb-3">
                            <label for="content" class="form-label">Contenuto <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="content" id="content" rows="3" required minlength="3" maxlength="4096" value="{{ old('title', $project->content) }}" placeholder="Inserisci qui il tuo Contenuto..."></textarea>
                          </div>

                          <div class="mb-3">
                            <label for="cover" class="form-label">Cover</label>
                            <input type="file" class="form-control" name="cover" id="cover" placeholder="Inserisci qui l'Immagine della tua Copertina...">
                          
                            @if ($project->cover)
                                <div class="mt-2">
                                    <h5>
                                        Copertina Attuale:
                                    </h5>
                                    <img src="{{ asset("/storage/".$project->cover) }}" alt="{{ $project->title }}" class="card-img-bottom" style="height: 150px;">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="remove-cover" name="remove-cover">
                                        <label class="form-check-label" for="remove_cover">
                                            Rimuovi l'attuale Copertina
                                        </label>
                                      </div>
                                </div>
                            @endif

                          </div>

                        <div>
                            <button type="submit" class="btn btn-success w-100">
                                + Aggiungi
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
