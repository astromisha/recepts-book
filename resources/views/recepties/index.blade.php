@extends('home')

@section('all-recepties')
    <div class="d-flex align-items-center justify-content-between mb-20">
        <h3>Рецепты</h3>
        <a href="{{ route('recepties.create') }}" class="btn">Добавить рецецпт</a>
    </div>
    @if ($recepties->isEmpty())
        <h2 class="text-center">Данных нет</h2>
    @else
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Рецепт</td>
                <td>Описание</td>
                <td colspan="2">Действия</td>
            </tr>
            </thead>
            <tbody>
            @foreach($recepties as $recept)
                <tr>
                    <td>{{$recept->recept_name}}</td>
                    <td>{{$recept->recept_short_description}}</td>
                    <td><a href="{{ route('recepties.edit',$recept->id)}}"
                           class="btn btn-primary">Редактировать</a>
                    </td>
                    <td><a href="{{ route('recepties.show',$recept->id)}}"
                           class="btn btn-secondary">Посмотреть</a>
                    </td>
                    <td>
                        <form action="{{ route('recepties.destroy', $recept->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            @endif
        </table>
@endsection