@extends('layouts.app')

@section('content')

<div class="p-4 p-md-5 mb-4 rounded text-bg-dark main__one">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">World</strong>
          <h3 class="mb-0">Featured post</h3>
          <div class="mb-1 text-muted">Nov 12</div>
          <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
            <img class="img-index" src="{{ asset('img/img.png') }}" alt="">

        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Design</strong>
          <h3 class="mb-0">Post title</h3>
          <div class="mb-1 text-muted">Nov 11</div>
          <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
            <img class="img-index" src="{{ asset('img/img.png') }}" alt="">

        </div>
      </div>
    </div>
  </div>

  <div class="row g-5">
    <div class="col-md-8">

    <h3 class="pb-4 mb-4 fst-italic border-bottom d-flex  justify-content-between">

    <p>Все товары</p>
    <form action="{{ route('searchLot') }}" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 d-flex search-form"  role="search" method="GET">
        <input name="search" type="search" class="form-control search" placeholder="Search..." aria-label="Search">
        <button type="submit" class="btn btn-outline-success btn-sm btn-search">Найти</button>
      </form>
    </h3>


    <div class="card__items">
        @foreach ($lots as $lot)
        <div class="card" style="width: 18rem; background-color: transparent; box-shadow: none;">
            <img class="img-tovar" src="{{ asset('img/img-lots/' . $lot->img) }}" alt="">
            <div class="card-body">
              <h5 class="card-title">{{ $lot->name }}</h5>
              <p class="card-text">{{ $lot->price }} рублей</p>
              <a href="{{ route('lot.show', ['id' => $lot->id]) }}" class="btn btn-primary">Открыть</a>
            </div>
        </div>
        @endforeach

    </div>






    </div>

    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4">
            <h3 class="filter__catalog__title">Категории</h3>
            <div class="filter__links">
                <a href="#" class="filter__link">Lorem, ipsum.</a>
                <a href="#" class="filter__link">Lorem, ipsum.</a>
                <a href="#" class="filter__link">Lorem, ipsum.</a>
                <a href="#" class="filter__link">Lorem, ipsum.</a>
                <a href="#" class="filter__link">Lorem, ipsum.</a>
                <a href="#" class="filter__link">Lorem, ipsum.</a>
            </div>

        </div>
        <div class="p-4">
            <form action="" method="GET" class="filter__catalog__form">
                <h3 class="filter__catalog__title">Цена</h3>
                <div class="filter__overflow">
                    <input type="range" class="form-range" min="0" max="5" id="customRange2">
                </div>
                <h3 class="filter__catalog__title">Жанры</h3>
                <div class="filter__overflow">
                    <div class="form-check">
                        <input class="form-check-input" name="tag[]" type="checkbox" value="" id="flexCheckBoevik">
                        <label class="form-check-label" for="flexCheckDefault">
                        Боевики
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="tag[]" type="checkbox" value="" id="flexCheckBoevik">
                        <label class="form-check-label" for="flexCheckDefault">
                        Боевики
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="tag[]" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        Боевики
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="tag[]" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        Боевики
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="tag[]" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        Боевики
                        </label>
                    </div>
                </div>
                <h3 class="filter__catalog__title">Формат</h3>
                <div class="filter__overflow">
                    <div class="form-check">
                        <input class="form-check-input" name="tag[]" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        Full HD
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="tag[]" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        4K
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="tag[]" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        3D
                        </label>
                    </div>
                </div>
                <h3 class="filter__catalog__title">Перевод</h3>
                <div class="filter__overflow">
                    <div class="form-check">
                        <input class="form-check-input" name="tag[]" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        дублированный
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="tag[]" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        закадровый
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="tag[]" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        дублированный и закадровый
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="tag[]" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        дублированный и русские субтитры на диске с бонусами
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="tag[]" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        без перевода (перевод не требуется)
                        </label>
                    </div>
                </div>
                <h3 class="filter__catalog__title">Возрастные ограничения</h3>
                <div class="filter__overflow">
                    <div class="form-check">
                        <input class="form-check-input" name="tag[]" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        +6
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="tag[]" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        +12
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="tag[]" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        +16
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="tag[]" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        +18
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-success" style="margin-top: 15px">Найти</button>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection
