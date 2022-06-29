@extends('layouts.app')

@section('content')
    @php
        $user_role = auth()->user();
        $role = $user_role->role;
    @endphp
    @if($role == 'admin' || $role == 'Директор')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}
                    {{--                <div class="card-body">--}}
                    {{--                    @if (session('status'))--}}
                    {{--                        <div class="alert alert-success" role="alert">--}}
                    {{--                            {{ session('status') }}--}}
                    {{--                        </div>--}}
                    {{--                    @endif--}}

                    {{--                    {{ __('You are logged in!') }}--}}
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Ф.И.О</th>
                            <th scope="col">Email</th>
                            <th scope="col">Телефон</th>
                            <th scope="col">Город</th>
                            <th scope="col">Уровень</th>
                            <th scope="col">Создан</th>
                            <th scope="col">Обновлён</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($users as $user)
                                <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->city }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    @else
    <h1>olol</h1>
    @endif
@endsection
