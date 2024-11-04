@extends('layouts.app')

@section('page-title', 'Laravel Boolfolio - Base')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-info">
                        Tutti i Progetti
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-success w-100">
                + Aggiungi
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Tecnologie</th>
                            <th scope="col">Contenuto</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <th scope="row">{{ $project->id }}</th>
                                    <td class="text-center">{{ $project->title }}</td>
                                    <td class="text-center">
                                        @if (isset($project->type))
                                            <a href="{{ route('admin.types.show', ['type' => $project->type_id]) }}"></a>
                                                {{ $project->type->title }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center">
                                    </td>
                                    <td class="text-center">{{ $project->content }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}" class="btn btn-primary btn-sm">
                                            Vedi
                                        </a>
                                        <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}" class="btn btn-warning btn-sm">
                                            Modifica
                                        </a>
                                        <form action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}" method="post" class="d-inline-block"
                                            onsubmit="return confirm('Sei sicur* di voler cancellare Definitivamente il tuo Progetto???')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Elimina
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection
