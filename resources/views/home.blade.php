@extends('layouts.app')

@section('content')
    @php
        $user_role = auth()->user();
        $role = $user_role->role;
    @endphp
    @if($role == 'Администратор')

        <div class="container">
            <div class="buttons">
                <a href="{{route('formregister')}}" class="btn btn-primary ">Создать пользователя</a>
                <a href="{{route('index_city')}}" class="btn btn-primary ">Смотреть города</a>
                <a href="{{ route('worker_show')}}" class="btn btn-primary ">Смотреть рабочих</a>
                <a href="{{ route('clients_show')}}" class="btn btn-primary ">Смотреть клиентов</a>
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
                                <th scope="col">Ф.И.О</th>
                                <th scope="col">Email</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">Город</th>
                                <th scope="col">Уровень</th>
                                <th scope="col">Создан</th>
                                <th scope="col">Обновлён</th>
                                <th scope="col">Изменить</th>
                                <th scope="col">Удалить</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($paginator as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td><a href="{{ route('show', $user->id) }}"><b>{{ $user->name }}</b></a></td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->city }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('edit', $user->id) }}">
                                        <img src="{{asset('img/edit.png')}}"
                                        alt="Изменить" title="Изменить" width="20px"></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('delete', $user->id) }}" method="POST">
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
