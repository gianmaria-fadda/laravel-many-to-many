@extends('layouts.app')

@section('page-title', 'Crea il Progetto')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-info">
                        Crea il Progetti
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
                    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" id="title" required minlength="3" maxlength="255" placeholder="Inserisci qui il Titolo...">
                          </div>

                          <div class="mb-3">
                            <label for="content" class="form-label">Contenuto <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="content" id="content" rows="3" required minlength="3" maxlength="4096" placeholder="Inserisci qui il tuo Contenuto..."></textarea>
                          </div>

                          <div class="mb-3">
                            <label for="cover" class="form-label">Cover</label>
                            <input type="file" class="form-control" name="cover" id="cover" placeholder="Inserisci qui l'Immagine della tua Copertina...">
                          </div>                          
                        <div>
                            <button type="submit" class="btn btn-success w-100 mt-2">
                                + Aggiungi
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
