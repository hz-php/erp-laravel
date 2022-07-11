@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="buttons">
            <a href="{{route('home')}}" class="btn btn-primary ">На главную</a>
            <a href="{{route('worker_show')}}" class="btn btn-primary ">Назад</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавление рабочего в базу</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('worker_store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Имя</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name"
                                           value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="middle_name" class="col-md-4 col-form-label text-md-end">Отчество</label>
                                <div class="col-md-6">
                                    <input id="middle_name" type="text" class="form-control " name="middle_name"
                                           value="{{ old('middle_name') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="surname" class="col-md-4 col-form-label text-md-end">Фамилия</label>
                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control " name="surname"
                                           value="{{ old('surname') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end">Телефон</label>
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control " name="phone"
                                           value="{{ old('phone') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Город</label>

                                <div class="col-md-6">
                                    <select class="form-select" id="city" aria-label="Default select example"
                                            name="city">
                                        <option value="" default>Выберите город</option>
                                        @foreach($city as $city)
                                            <option value="{{ $city->city }}">{{ $city->city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col mb-3 ">
                                <div class="row-cols-md-3">
                                    <label for="file">Скан стр.1</label>
                                    <input type="file" name="image" id="file" class="form-control" required>
                                </div>
                                <div class="row-cols-md-3">
                                    <label for="file">Скан стр.2</label>
                                    <input type="file" name="image_2" id="file" class="form-control" required>
                                </div>
                                <div class="row-cols-md-3">
                                    <label for="file">Скан стр.3</label>
                                    <input type="file" name="image_3" id="file" class="form-control" required>
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

