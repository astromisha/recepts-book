@extends('home')

@section('add-ingridient')
    <div class="card uper">
        <div class="card-header">
            Добавить ингридиент
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form method="post" action="{{ route('ingridienties.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Название</label>
                    <input type="text" class="form-control" name="ingridient_name"/>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection