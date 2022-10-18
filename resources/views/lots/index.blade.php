@extends('layouts.lots');

@section('content')
<main class="container">
    <h1 class="main__title">{{ $lot->name }}</h1>

    <div class="main__items">
        <div class="main__item">
            <img class="main__item__img" src="{{ asset('img/img-lots/' . $lot->img) }}" alt="">
        </div>
        <div class="main__item">
            <h3 class="main__item__title">Описание</h3>
            <p class="main__item__desc text-break">{{ $lot->description }}</p>
            <h3 class="main__item__title">Коротко о товаре</h3>
            <div class="main__item__infos">
                <p class="main__item__info"><span class="bold">Жанр</span>: {{ $lot->genres->name }}</p>
                <p class="main__item__info"><span class="bold">Актеры</span>: Lorem, ipsum., Lorem, ipsum., Lorem, ipsum.</p>
                <p class="main__item__info"><span class="bold">Страна</span>: <a class="item__info__link" href="#">Россия</a></p>
                <p class="main__item__info"><span class="bold">Год выхода</span>: <a class="item__info__link" href="#">1918</a></p>
            </div>
            <a href="#" class="main__item__link">Подробнее</a>
        </div>
        <div class="main__item">
            <p class="main__item__price">{{ $lot->price }} &#8381;</p>
            <p class="main__item__age">18+ Возрастное ограничение</p>
            <a href="#" class="btn btn-outline-success btn-info-disk">Добавить в корзину</a>
            <div class="main__item__author__info">
                <a href="#" class="badge text-bg-success author__info">{{ $lot->user[0]->name }}</a>
            </div>
        </div>
    </div>
    <div class="main__inner">
        <h1 class="main__inner__title">Описание</h1>
        <p class="main__inner__text text-break">{{ $lot->description }}</p>
        <h1 class="main__inner__title">Характеристики</h1>
        <div class="main__item__infos">
            <p class="main__item__info"><span class="bold">Жанр</span>: {{ $lot->genres->name }}</p>
            <p class="main__item__info"><span class="bold">Актеры</span>: 16+</p>
            <p class="main__item__info"><span class="bold">Актеры</span>: Lorem, ipsum., Lorem, ipsum., Lorem, ipsum.</p>
            <p class="main__item__info"><span class="bold">Страна</span>: <a class="item__info__link" href="#">Россия</a></p>
            <p class="main__item__info"><span class="bold">Год выхода</span>: <a class="item__info__link" href="#">1918</a></p>
        </div>
    </div>
</main>
@endsection
