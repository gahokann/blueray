@extends('layouts.lots');

@section('content')
<main class="container">
    <h4>Заказать blu-ray диск {{ $lot->name }}</h4>
    <p>Для того чтоб заказать blu-ray диск нужно указать неободимую информацию</p>
    <form action="{{ route('lot.orderCreate', ['id' => $lot->id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Введите адрес доставки</label>
            <input type="text" name="address" class="form-control" id="exampleInputPassword1">
        </div>
        <button class="btn btn-outline-success">Заказать</button>
    </form>
</main>
@endsection
