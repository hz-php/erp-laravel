@extends('layouts.app')

@section('content')
    @php
        $user_role = auth()->user();
        $role = $user_role->role;
    @endphp
    @if($role == 'Администратор')

        <div class="container">
            <div class="buttons">
                <a href="{{route('home')}}" class="btn btn-primary ">На главную</a>
                <a href="{{route('form_city')}}" class="btn btn-primary ">Добавить город</a>
            </div>
            <br>
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Название города</th>
                                <th scope="col">Удалить</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($paginator as $city)
                                <tr>
                                    <th scope="row">{{ $city->id }}</th>
                                    <td>{{ $city->city }}</td>
                                    <td>
                                        <form action="{{ route('delete_city', $city->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"><img src="{{asset('img/del.png')}}" alt="Удалить" title="Удалить" width="20px"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            @if($paginator->total() > $paginator->count())
                <br>
                <div>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    {{ $paginator }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>


            @else
                <h1>olol</h1>
            @endif
        </div>
@endsection
