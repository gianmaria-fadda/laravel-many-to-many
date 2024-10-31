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
                            Tecnologie: 
                                @foreach ($project->technologies as $technology)
                                    <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}" class="badge rounded-pill text-bg-primary"></a>
                                        {{ $technology->title }}
                                @endforeach
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
