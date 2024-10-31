@extends('layouts.app')

@section('page-title', $technology->title)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        {{ $technology->title }}
                    </h1>
                    <h6 class="text-center">
                        Creato il: {{ $technology->created_at }}
                    </h6>
                    <ul>
                        <li>
                            ID: {{ $technology->id }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
