@extends('layouts.app')

@section('page-title', 'Modifica' .$type->title)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-info">
                        Modifica {{ $type->title }}
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
                    <form action="{{ route('admin.types.update', ['type' => $type->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" id="title" required minlength="3" maxlength="255" value="{{ old('title', $type->title) }}" placeholder="Inserisci qui il Titolo...">
                          </div>

                          <div class="mb-3">
                            <label for="content" class="form-label">Contenuto <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="content" id="content" rows="3" required minlength="3" maxlength="4096" value="{{ old('title', $type->content) }}" placeholder="Inserisci qui il tuo Contenuto..."></textarea>
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
