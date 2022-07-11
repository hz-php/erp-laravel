@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('home')}}" class="btn btn-primary ">Назад</a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактирование пользователя</div>

                    <div class="card-body">
                        <form method="POST" action="update/{{ $user->id }}">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Ф.И.О.</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ $user->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ $user->email }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Телефон</label>

                                <div class="col-md-6">
                                    <input id="email" type="tel" class="form-control " name="phone"
                                           value="{{ $user->phone }}" required autocomplete="email">

                                    {{--                                @error('email')--}}
                                    {{--                                <span class="invalid-feedback" role="alert">--}}
                                    {{--                                        <strong>{{ $message }}</strong>--}}
                                    {{--                                    </span>--}}
                                    {{--                                @enderror--}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="city" class="col-md-4 col-form-label text-md-end">Город</label>

                                <div class="col-md-6">
{{--                                    <input id="email" type="text" class="form-control " name="city"--}}
{{--                                           value="{{ $user->city }}" required>--}}
                                    <select class="form-select" id="city" aria-label="Default select example"
                                            name="city">

                                        @foreach($cities as $city)
                                            <option value="{{ $city->city }}">{{ $city->city }}</option>
                                        @endforeach
                                    </select>

                                    {{--                                @error('email')--}}
                                    {{--                                <span class="invalid-feedback" role="alert">--}}
                                    {{--                                        <strong>{{ $message }}</strong>--}}
                                    {{--                                    </span>--}}
                                    {{--                                @enderror--}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="role" class="col-md-4 col-form-label text-md-end">Статус</label>

                                <div class="col-md-6">
                                    <select class="form-select" id="role" aria-label="Default select example"
                                            name="role">
                                        <option value="" default>Выберите статус</option>
                                        @foreach($role_us as $role)
                                            <option value="{{ $role->role_name }}">{{ $role->role_name }}</option>
                                        @endforeach
                                    </select>

                                    {{--                                @error('email')--}}
                                    {{--                                <span class="invalid-feedback" role="alert">--}}
                                    {{--                                        <strong>{{ $message }}</strong>--}}
                                    {{--                                    </span>--}}
                                    {{--                                @enderror--}}
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Сохранить
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="display: flex; justify-content: space-around;">
                                <div class="form-group">
                                    <label for="title">Создан</label>
                                    <input type="text" value="{{ $user->created_at }}" id="title" disabled>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="title_at">Изменен</label>
                                    <input type="text" value="{{ $user->updated_at }}" id="title_at" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
