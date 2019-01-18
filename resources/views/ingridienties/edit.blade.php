@extends('home')

@section('edit-ingridient')
    <div class="card uper">
        <div class="card-header">
            Редактировать Ингриент
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('ingridienties.update', $ingridient->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Название ингридиента</label>
                    <input type="text" class="form-control" name="ingridient_name" value={{ $ingridient->ingridient_name }} />
                </div>
                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>
    </div>
@endsection