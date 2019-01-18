@extends('home')

@section('show-recipe')
    <div class="card uper">
        <div class="card-header">
            {{$recept->recept_name}}
        </div>
        <div class="card-body">
            <div class="form-group">
                <p>{{$recept->recept_description}}</p>
            </div>
            <h3>Ингридиенты</h3>
            <form method="post" action="{{ route('recepties.update', $recept->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <div class="border-bottom pb-2">
                        <div id="all-recept-ingridients-from">
                            @foreach($receptIngridient as $receptIngridientDependence)
                                <div class="row new-ingridient-recept-template">
                                    <div class="col-9">
                                        <div class="form-group">
                                            <span>{{$receptIngridientDependence->ingridient_name}}</span>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control text-center"
                                                   value="{{$receptIngridientDependence->ingridient_count}}"
                                                   name="ingridient_count[]"/>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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