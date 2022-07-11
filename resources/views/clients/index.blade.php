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
                <a href="{{route('create_client')}}" class="btn btn-primary ">Создать клиента</a>
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
                                <th scope="col">Название</th>
                                <th scope="col">Адресс</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">Email</th>
                                <th scope="col">Город</th>
                                <th scope="col">Создан</th>
                                <th scope="col">Кем создан</th>
                                <th scope="col">Обновлён</th>
                                <th scope="col">Изменить</th>
                                <th scope="col">Удалить</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($paginator as $client)
                                <tr>
                                    <th scope="row">{{ $client->id }}</th>
                                    <td><a href="{{ route('show_client', $client->id) }}"><b>{{ $client->name }}</b></a></td>
                                    <td>{{ $client->adress }}</td>
                                    <td><a href="tel:{{ $client->phone }}"><b>{{ $client->phone }}</b></a></td>
                                    <td><a href="mailto:{{ $client->email }}"><b>{{ $client->email }}</b></a></td>
                                    <td>{{ $client->city }}</td>
                                    <td>{{ $client->created_at }}</td>
                                    <td>{{ $client->updated_at }}</td>
                                    <td>
                                        <a href={{ route('edit', $client->id) }}"><img src="{{asset('img/edit.png')}}"
                                        alt="Изменить" title="Изменить" width="20px"></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('delete', $client->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"><img src="{{asset('img/del.png')}}" alt="Удалить"
                                                                       title="Удалить" width="20px"></button>
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
