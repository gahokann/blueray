<div class="col-md-4 mb-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-column align-items-center text-center">
          <img src="{{ asset('img/imgUser/' . Auth::user()->img) }}" alt="Admin" class="rounded-circle img-user" width="150">
          <div class="mt-3">
            <h4>{{ Auth::user()->name }}</h4>
          </div>
          @if (session('status'))
                <div class="alert alert-success alert-info" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
      </div>
    </div>
    <div class="card mt-3">
      <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
          <a href="{{ route('profile.index') }}" class="btn btn-outline-primary" style="width: 100%">Главная</a>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
          <a href="{{ route('profile.settings') }}" class="btn btn-outline-primary" style="width: 100%">Настройки</a>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
          <a href="#" class="btn btn-outline-primary" style="width: 100%">Мои заказы</a>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
          <a href="#" class="btn btn-outline-primary" style="width: 100%">Каталог</a>
        </li>
      </ul>
    </div>
  </div>
