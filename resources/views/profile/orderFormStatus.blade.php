@extends('layouts.lots');

@section('content')
<main class="container">
    <h4>Изменение статуса заказа: {{ $order->id }}</h4>
    <p>Для того чтоб заказать blu-ray диск нужно указать неободимую информацию</p>
    <form action="{{ route('lot.orderChangeStatus', ['id' => $order->id]) }}" method="POST">
        @csrf
        <select name="status_id" style="margin-left: 0; margin-bottom: 15px " class="form-select" aria-label="Default select example">
            <option selected>Выберите статус</option>
            @foreach ($statusesOrder as $status)
            <option value="{{ $status->id }}">{{ $status->name }}</option>
            @endforeach
          </select>
        <button class="btn btn-outline-success">Заказать</button>
    </form>
</main>
@endsection
