@extends('layouts.app')

@section('show-recept')
    <a href="#" onclick=" window.history.back();" class="btn btn-secondary mb-3">Назад</a>
    <div class="card uper">
        <div class="card-header">
            {{$recept->recept_name}}
        </div>
        <div class="card-body">
            <div class="form-group">
                <p>{{$recept->recept_description}}</p>
            </div>
            <h3>Ингридиенты</h3>
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
                                        <span>{{$receptIngridientDependence->ingridient_count}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection