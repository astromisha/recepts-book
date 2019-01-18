@extends('layouts.app')

@section('all-recepts-users')
    <div class="container">
        @if ($recepties->isEmpty())
            <h2 class="text-center">Станьте первым, кто сделает первый рецепт!</h2>
            <div class="text-center">
                <a href="{{ route('register') }}" class="btn btn-primary">Зарегестрировться</a>
            </div>
        @else
            <div class="row">
                <div class="col-12 mb-2">
                    <h2 class="text-center">Все рецепты пользователей</h2>
                </div>
                @foreach($recepties as $recept)
                    <div class="col-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{$recept->recept_name}}</h5>
                                <p class="card-text">{{$recept->recept_short_description}}</p>
                                <a href="{{route('all-recepts.show', $recept->id)}}" class="btn btn-secondary">Посмотреть рецепт</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection