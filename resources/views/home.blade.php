@extends('layouts.app')

@section('content')
    @if(!Auth::user())
        <script>window.location = "/login"</script>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-4">
                <ul class="list-group list-group-flush" id="menu-tabs" role="tablist">
                    <li class="list-group-item">
                        <a href="{{route('recepties.index')}}">Мои рецепты</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('ingridienties.index')}}">Ингридиенты</a>
                    </li>
                </ul>
            </div>
            <div class="col-8">
                @if (Route::current()->getName() === 'ingridienties.create')
                    @yield('add-ingridient')
                @elseif (Route::current()->getName() === 'recepties.create')
                    @yield('add-recept')
                @elseif (Route::current()->getName() === 'ingridienties.index')
                    @yield('all-ingridients')
                @elseif (Route::current()->getName() === 'ingridienties.edit')
                    @yield('edit-ingridient')
                @elseif (Route::current()->getName() === 'recepties.index')
                    @yield('all-recepties')
                @elseif (Route::current()->getName() === 'recepties.edit')
                    @yield('edit-recipe')
                @elseif(Route::current()->getName() === 'recepties.show')
                    @yield('show-recipe')
                @else
                    <h1 class="text-center">Для работы с книгой рецептов, выберите, пожалуйста, пункт рецептов илиингридиентов</h1>
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade" id="newIngridientModal" tabindex="-1" role="dialog" aria-labelledby="newIngridientModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('ingridienties.store', 'receptCreate') }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить новйы ингридиент</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            @csrf
                            <label for="name">Название</label>
                            <input type="text" class="form-control" name="ingridient_name"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection