@extends('layouts.app')



@section('content')
    @if (Auth::check())
    @php
        $user_role = auth()->user();
        $role = $user_role->role;
    @endphp
    @if($role == 'Администратор')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <a href="{{ route('home') }}" class="btn btn-outline-primary ms-1">На главную</a>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                                 class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ $worker->name }}</h5>
                            <h5 class="my-3">{{ $worker->middle_name }}</h5>
                            <h5 class="my-3">{{ $worker->surname }}</h5>
{{--                            <p class="text-muted mb-1">{{ $user->role }}</p>--}}
                            <p class="text-muted mb-4">{{ $worker->city }}</p>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fas fa-globe fa-lg text-warning"></i>
                                    <p class="mb-0">https://mdbootstrap.com</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                    <p class="mb-0">@mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Ф.И.О.</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $worker->name }}</p>

                                    <p class="text-muted mb-0">{{ $worker->middle_name }}</p>

                                    <p class="text-muted mb-0">{{ $worker->surname }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Телефон</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $worker->phone }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Город</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $worker->city }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <a href="{{ route('edit_worker', $worker->id) }}" class="btn btn-outline-primary ms-1">Редактировать</a>
                </div>
            </div>
        </div>
    </section>
    @elseif(!isset($role) || $role == null)
    @php
    redirect(route('home'));
    @endphp
    @endif
    @else
        @php
            back();
        @endphp
    @endif
@endsection

