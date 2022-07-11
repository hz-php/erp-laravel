@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="buttons">
            <a href="{{route('home')}}" class="btn btn-primary ">На главную</a>
            <a href="{{route('index_city')}}" class="btn btn-primary ">Назад</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавление города в базу</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('city_store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="city" class="col-md-4 col-form-label text-md-end">Город</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control " name="city"
                                           value="{{ old('city') }}" required autocomplete="email">

                                </div>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Сохранить
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

