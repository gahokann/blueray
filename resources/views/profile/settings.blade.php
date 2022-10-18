@extends('layouts.profile')

@section('content')
<div class="container">
    <div class="main-body">

          <div class="row gutters-sm">
            @include('layouts.dev.infoUser')
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <h6 class="mb-0">Изменить пароль</h6>
                        <form action="{{ route('profile.changePassword') }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="mb-3 mt-3">
                                <label for="old_password" class="form-label">Введите старый пароль</label>
                                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="qwerty123">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="new_password" class="form-label">Введите новый пароль</label>
                                <input type="password" class="form-control" id="new_password" name="password" placeholder="qwerty123">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="password_confirmation" class="form-label">Введите новый пароль</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="qwerty123">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button class="btn btn-success">Изменить</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h6 class="mb-0">Добавить/изменить картинку</h6>
                        <form action="{{ route('profile.changeImage') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="mb-3 mt-3">
                                <label for="file" class="form-label">Выберите картинку</label>
                                <input type="file" class="form-control" id="file" name="file" placeholder="qwerty123">
                                @error('file')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button class="btn btn-success">Изменить</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h6 class="mb-0">Изменить Личную Информацию</h6>
                        <form action="#">
                            <div class="mb-3 mt-3">
                                <label for="password" class="form-label">Введите пароль</label>
                                <input type="password" class="form-control" id="password" placeholder="qwerty123">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="surname" class="form-label">Введите Фамилию</label>
                                <input type="name" class="form-control" id="surname" placeholder="Иванов">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Введите Имя</label>
                                <input type="name" class="form-control" id="name" placeholder="Иван">
                            </div>
                            <button class="btn btn-success">Изменить</button>
                        </form>
                    </div>
                </div>
            </div>
          </div>

        </div>
    </div>
@endsection
