@extends('layouts.app')

@section('page-title', $project->title)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        {{ $project->title }}
                    </h1>
                    <h6 class="text-center">
                        Creato il: {{ $project->created_at }}
                    </h6>
                    <ul>
                        <li>
                            ID: {{ $project->id }}
                        </li>
                        <li>
                            Slug: {{ $project->slug }}
                        </li>
                        <li>
                            Contenuto: {{ $project->content }}
                        </li>
                        <li>
                            Cover:
                            @if ($project->cover)
                                <img src="{{ asset("/storage/".$project->cover) }}" alt="{{ $project->title }}" class="card-img-bottom">
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
