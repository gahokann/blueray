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
                <p class="main__item__info"><span class="bold">Жанр</span>:
                    @foreach ($lot->genre as $genre)
                        {{ $genre->name }},
                    @endforeach
                </p>
                <p class="main__item__info"><span class="bold">Актеры</span>:
                    @foreach ($lot->actor as $actor)
                        {{ $actor->name }} {{ $actor->surname }},
                    @endforeach
                </p>
                <p class="main__item__info"><span class="bold">Страна</span>:
                    @foreach ($lot->country as $country)
                        {{ $country->name }},
                    @endforeach</p>
                <p class="main__item__info"><span class="bold">Дата выхода</span>: {{ $lot->date }}</p>
            </div>
            <a href="#" class="main__item__link">Подробнее</a>
        </div>
        <div class="main__item">
            <p class="main__item__price">{{ $lot->price }} &#8381;</p>
            <p class="main__item__age">{{ $lot->age }}+ Возрастное ограничение</p>
            @if(Auth::user()->id != $lot->user_id)
            <a href="{{ route('lot.orderForm', ['id' => $lot->id]) }}" class="btn btn-outline-success btn-info-disk">Заказать лот</a><br>
            @endif
            @if(Auth::user()->id == $lot->user_id)
            <a href="{{ route('lot.destroy', ['id' => $lot->user_id]) }}" class="btn btn-outline-danger btn-info-disk">Удалить лот</a>
            @endif
            <div class="main__item__author__info">
                <a href="{{ route('profile.showUserOther', ['id' => $lot->user_id]) }}" class="badge text-bg-success author__info">{{ $lot->user[0]->name }} {{ $lot->user[0]->surname }}</a>
            </div>
            @if($lot->status->id == 1)
            <div class="main__item__author__info mt-1">
                <p class="badge text-bg-success author__info">
                    {{ $lot->status->name }}
                </p>
            </div>
            @elseif($lot->status->id == 2)
            <div class="main__item__author__info mt-1">
                <p class="badge text-bg-danger author__info">
                    {{ $lot->status->name }}
                </p>
            </div>
            @endif
        </div>
    </div>
    <div class="main__inner">
        <h1 class="main__inner__title">Описание</h1>
        <p class="main__inner__text text-break">{{ $lot->description }}</p>
        <h1 class="main__inner__title">Характеристики</h1>
        <div class="main__item__infos">
            <p class="main__item__info"><span class="bold">Жанр</span>:
                @foreach ($lot->genre as $genre)
                {{ $genre->name }} {{ $genre->surname }},
            @endforeach
        </p>
            <p class="main__item__info"><span class="bold">Возрастное ограничение</span>: {{ $lot->age }}+</p>
            <p class="main__item__info"><span class="bold">Актеры</span>: @foreach ($lot->actor as $actor)
                {{ $actor->name }} {{ $actor->surname }},
            @endforeach</p>
            <p class="main__item__info"><span class="bold">Страна</span>:
            @foreach ($lot->country as $country)
                {{ $country->name }},
            @endforeach</p>
            <p class="main__item__info"><span class="bold">Дата выхода</span>: {{ $lot->date }}</p>
        </div>
    </div>
</main>
@endsection
