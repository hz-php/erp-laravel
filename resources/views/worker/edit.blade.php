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
                    <div class="card-header"></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('worker_update', $worker->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Имя</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name"
                                           value="{{ $worker->name }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="middle_name" class="col-md-4 col-form-label text-md-end">Отчество</label>
                                <div class="col-md-6">
                                    <input id="middle_name" type="text" class="form-control " name="middle_name"
                                           value="{{ $worker->middle_name }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="surname" class="col-md-4 col-form-label text-md-end">Фамилия</label>
                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control " name="surname"
                                           value="{{ $worker->surname }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="birthday" class="col-md-4 col-form-label text-md-end">Дата рождения</label>
                                <div class="col-md-6">
                                    <input id="birthday" type="date" class="form-control " name="birthday"
                                           value="{{ $worker->birthday }}"  required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Пол</label>

                                <div class="col-md-6">
                                    <select class="form-select" id="city" aria-label="Default select example"
                                            name="male">
                                        <option value="{{ $worker->male }}" default>{{ $worker->male }}</option>
                                        <option value="Мужской">Мужской</option>
                                        <option value="Женский">Женский</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="specialization" class="col-md-4 col-form-label text-md-end">Специальность</label>
                                <div class="col-md-6">
                                    <input id="specialization" type="text" class="form-control " name="specialization"
                                           value="{{ $worker->specialization }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end">Телефон</label>
                                <div class="col-md-6">
                                    <input id="phone" type="tel" class="form-control " name="phone"
                                           value="{{ $worker->phone }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Город</label>

                                <div class="col-md-6">
                                    <select class="form-select" id="city" aria-label="Default select example"
                                            name="city">
                                        <option value="{{$worker->city}}" default>{{$worker->city}}</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->city }}">{{ $city->city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <h4 style="text-align: center; margin-bottom: 10px;"> <b>Паспортные данные</b> </h4>
                            <div class="col mb-3 " id="pasp_dn">
                                <div class="row mb-3">
                                    <label for="ser_pasp" class="col-md-4 col-form-label text-md-end">Серия паспорта: </label>
                                    <div class="col-md-6">
                                        <input id="ser_pasp" type="text" class="form-control " name="ser_pasp"
                                               value="{{ $worker->ser_pasp }}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="num_pasp" class="col-md-4 col-form-label text-md-end">Номер паспорта: </label>
                                    <div class="col-md-6">
                                        <input id="num_pasp" type="text" class="form-control " name="num_pasp"
                                               value="{{ $worker->num_pasp }}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="date_pasp" class="col-md-4 col-form-label text-md-end">Дата выдачи: </label>
                                    <div class="col-md-6">
                                        <input id="date_pasp" type="date" class="form-control " name="date_pasp"
                                               value="{{ $worker->date_pasp }}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nat_pasp" class="col-md-4 col-form-label text-md-end">Национальность: </label>
                                    <div class="col-md-6">
                                        <input id="nat_pasp" type="text" class="form-control " name="nat_pasp"
                                               value="{{ $worker->nat_pasp }}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="date_pasp" class="col-md-4 col-form-label text-md-end">Кем выдан: </label>
                                    <div class="col-md-6">
                                        <input id="who_pasp" type="text" class="form-control " name="who_pasp"
                                               value="{{ $worker->who_pasp }}" required>
                                    </div>
                                </div>
                                <div class="row-cols-md-3">
                                    <label for="file">Скан стр.1</label>
                                    <input type="file" name="image" id="file" class="form-control" >
                                </div>
                                <div class="row-cols-md-3">
                                    <label for="file">Скан стр.2</label>
                                    <input type="file" name="image_2" id="file" class="form-control" >
                                </div>
                                <div class="row-cols-md-3">
                                    <label for="file">Скан стр.3</label>
                                    <input type="file" name="image_3" id="file" class="form-control" >
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

