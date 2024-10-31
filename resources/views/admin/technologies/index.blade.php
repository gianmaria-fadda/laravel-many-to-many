@extends('layouts.app')

@section('page-title', 'Laravel Boolfolio - technology Technology')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-info">
                        Tutti le Tecnologie
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ route('admin.technologys.create') }}" class="btn btn-success w-100">
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
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($technologys as $technology)
                                <tr>
                                    <th scope="row">{{ $technology->id }}</th>
                                    <td class="text-center">{{ $technology->title }}</td>
                                    <td class="text-center">
                                        @if (isset($technology->type))
                                            <a href="{{ route('admin.types.show', ['type' => $technology->type_id]) }}"></a>
                                                {{ $technology->type->title }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $technology->content }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.technologys.show', ['technology' => $technology->id]) }}" class="btn btn-primary btn-sm">
                                            Vedi
                                        </a>
                                        <a href="{{ route('admin.technologys.edit', ['technology' => $technology->id]) }}" class="btn btn-warning btn-sm">
                                            Modifica
                                        </a>
                                        <form action="{{ route('admin.technologys.destroy', ['technology' => $technology->id]) }}" method="post" class="d-inline-block"
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
