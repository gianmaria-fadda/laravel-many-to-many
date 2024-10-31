@extends('layouts.app')

@section('page-title', $type->title)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        {{ $type->title }}
                    </h1>
                    <h6 class="text-center">
                        Creato il: {{ $type->created_at }}
                    </h6>
                    <ul>
                        <li>
                            ID: {{ $type->id }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
