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
                        <h6 class="">Мои заказы</h6>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Заголовок</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Владелец лота</th>
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
                                <td>{{ $order->users->name }} {{ $order->users->surname }}</td>
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
                                    <a href="{{ route('lot.show', ['id' => $order->lot_id]) }}" class="text-success">Открыть лот</a>
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
