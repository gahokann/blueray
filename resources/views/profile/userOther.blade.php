@extends('layouts.profile')

@section('content')
<div class="container">
    <div class="main-body">

          <div class="row gutters-sm">
            @include('layouts.dev.infoUserOther')
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $user->name }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Surname</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $user->surname }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $user->email }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-2 d-flex justify-content-between align-items-center">
                        <h6 class="">Лоты пользователя: {{ $user->name }}</h6>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Заголовок</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Жанры</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Дата выхода</th>
                            <th scope="col">Дата создания лота</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($lots as $lot)
                            <tr>
                                <th scope="row">{{ $lot->id }}</th>
                                <td>{{ $lot->name }}</td>
                                <td>{{ $lot->price }}</td>
                                <td>
                                    @foreach ($lot->genre as $genre)
                                        {{ $genre->name }}
                                    @endforeach
                                </td>
                                <td>
                                    {{ $lot->date }}
                                </td>
                                <td>
                                    {{ $lot->status->name }}
                                </td>
                                <td>
                                    {{ $lot->created_at }}
                                </td>
                                <td>
                                    <a href="{{ route('lot.show', ['id' => $lot->id]) }}" class="text-success">Открыть</a>
                                </td>
                              </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
          </div>

        </div>
    </div>
@endsection
