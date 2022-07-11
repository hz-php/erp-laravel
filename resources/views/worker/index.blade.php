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
                <a href="{{route('worker_form')}}" class="btn btn-primary ">Создать рабочего</a>
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
                                <th scope="col">Имя</th>
                                <th scope="col">Отчество</th>
                                <th scope="col">Фамилия</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">Город</th>
                                <th scope="col">Кем создан</th>
                                <th scope="col">Изменить</th>
                                <th scope="col">Удалить</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($paginator as $worker)
                                <tr>
                                    <th scope="row">{{ $worker->id }}</th>
                                    <td><a href="/worker_show/{{ $worker->id}}"><b>{{ $worker->name }}</b></a></td>
                                    <td>{{ $worker->middle_name }}</td>
                                    <td>{{ $worker->surname }}</td>
                                    <td><a href="tel:{{ $worker->phone }}">{{ $worker->phone }}</a></td>
                                    <td>{{ $worker->city }}</td>
                                    <td>{{ $worker->created_by_whom }}</td>
                                    <td><a href={{ route('edit_worker', $worker->id) }}"><img src="{{asset('img/edit.png')}}"
                                        alt="Изменить" title="Изменить" width="20px"></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('delete_worker', $worker->id) }}" method="POST">
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
{{--            @if($paginator->total() > $paginator->count())--}}
{{--                <br>--}}
{{--                <div>--}}
{{--                    <div class="row justify-content-center">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-body">--}}
{{--                                    {{ $paginator }}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @endif--}}
                </div>


            @else
                <h1>olol</h1>
            @endif
        </div>
@endsection
