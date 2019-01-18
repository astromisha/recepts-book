@extends('home')

@section('all-ingridients')
    <div class="d-flex align-items-center justify-content-between mb-20">
        <h3>Ингридиенты</h3>
        <a href="{{ route('ingridienties.create') }}" class="btn">Добавить ингридиент</a>
    </div>
    @if ($ingridients->isEmpty())
        <h2 class="text-center">Данных нет</h2>
    @else
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Название ингридиента</td>
                <td colspan="2">Действия</td>
            </tr>
            </thead>
            <tbody>
            @foreach($ingridients as $ingridient)
                <tr>
                    <td>{{$ingridient->ingridient_name}}</td>
                    <td><a href="{{ route('ingridienties.edit',$ingridient->id)}}"
                           class="btn btn-primary">Редактировать</a>
                    </td>
                    <td>
                        <form action="{{ route('ingridienties.destroy', $ingridient->id)}}" method="post">
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