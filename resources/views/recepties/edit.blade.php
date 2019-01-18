@extends('home')

@section('edit-recipe')
    <div class="card uper">
        <div class="card-header">
            Редактировать Рецепт
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
            <form method="post" action="{{ route('recepties.update', $recept->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Название</label>
                    <input type="text" class="form-control" value="{{$recept->recept_name}}" name="recept_name">
                </div>
                <div class="form-group">
                    <label for="description">Краткое описание</label>
                    <input class="form-control" value="{{$recept->recept_short_description}}" name="recept_short_description">
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" rows="3" value="{{$recept->recept_description}}" name="recept_description">{{$recept->recept_description}}</textarea>
                </div>
                <h3>Ингридиенты</h3>
                <div class="form-group">
                    <div class="border-bottom pb-2">
                        <div id="all-recept-ingridients-from">
                            @foreach($receptIngridient as $receptIngridientDependence)
                                <div class="row new-ingridient-recept-template">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="ingridients">Название</label>
                                            <select class="form-control select-ingridients" name="ingridients[]">
                                                @foreach($ingridients as $ingridient)
                                                    <option name="ingridient_name"
                                                            {!! $ingridient->ingridient_name ===  $receptIngridientDependence->ingridient_name? "selected" : "" !!}
                                                            value="{{$ingridient->ingridient_name}}">{{$ingridient->ingridient_name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="name">Количество</label>
                                            <input type="text" class="form-control count-ingridient" value="{{$receptIngridientDependence->ingridient_count}}" name="ingridient_count[]"/>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <label for="">Удалить</label>
                                        <button class="btn btn-danger remove-ingridient-recept">Х</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-between">
                            <button id="add-new-ingrdient-recept" class="btn btn-primary">Добавить</button>
                            <div class="add-new-ingridient">
                                Нет в списке?
                                <button type="button" class="ml-2 btn btn-primary" data-toggle="modal"
                                        data-target="#newIngridientModal">Добавить новый ингридиент
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="mt-2 btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection