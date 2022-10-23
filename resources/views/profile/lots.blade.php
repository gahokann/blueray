@extends('layouts.profile')

@section('content')
<div class="container">
    <div class="main-body">

          <div class="row gutters-sm">
            @include('layouts.dev.infoUser')
            <div class="col-md-8">


            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-2 d-flex justify-content-between align-items-center">
                        <h6 class="">Мои лоты</h6>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Добавить лот</button>
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
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-2 d-flex justify-content-between align-items-center">
                        <h6 class="">Заказанные лоты</h6>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Заголовок</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Заказчик лота</th>
                            <th scope="col">Дата создания заказа</th>
                            <th scope="col">Адрес</th>
                            <th scope="col">Статус</th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach ($orders as $order)
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <td>{{ $order->lots->name }}</td>
                                <td>{{ $order->lots->price }} руб.</td>
                                <td>{{ $order->usersClient->name }} {{ $order->usersClient->surname }}</td>
                                <td>
                                    {{ $order->created_at }}
                                </td>
                                <td>
                                    {{ $order->address }}
                                </td>
                                <td>
                                    {{ $order->status->name }}
                                </td>
                                <td>
                                    <a href="{{ route('lot.orderFormChange', ['id' => $order->id]) }}" class="text-success">Изменить статус лота</a>
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

    @include('layouts.dev.modalFormLot')
@endsection
