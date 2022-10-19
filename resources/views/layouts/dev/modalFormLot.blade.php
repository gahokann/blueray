<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('profile.lotCreate') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-3">
                <label for="text" class="form-label">Заголовок</label>
                <input type="text" class="form-control" name="title" id="text" placeholder="Введите заголовок">
            </div>
            <div class="mb-3 mt-3">
                <label for="img" class="form-label">Картинка</label>
                <input type="file" name="img" class="form-control" id="img" placeholder="Выберите картинку">
            </div>
            <div class="mb-3 mt-3">
                <label for="desc" class="form-label">Описание</label>
                <input type="text" name="description" class="form-control" id="desc" placeholder="Введите описание">
            </div>
            <div class="mb-3 mt-3">
                <label for="age" class="form-label">Возрастное ограничение</label>
                <input type="number" max="18" min="0" name="age" class="form-control" id="age" placeholder="Введите ограничение по возрасту">
            </div>
            <div class="mb-3 mt-3">
                <label for="price" class="form-label">Цена</label>
                <input type="number" name="price" class="form-control" id="price" placeholder="Введите цену">
            </div>
            <div class="mb-3 mt-3">
                <label for="year" class="form-label">Дата выхода</label>
                <input type="date" name="date" class="form-control" id="year" placeholder="Введите дату выхода">
            </div>
            <div class="mb-3 mt-3">
                <label for="actors" class="form-label">Актёры</label>
                <select class="form-select" name="actors[]" id="actors" multiple aria-label="multiple select example">
                    @foreach ($actors as $actor)
                        <option value="{{ $actor->id }}">{{ $actor->name }} {{ $actor->surname }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="country" class="form-label">Страны</label>
                <select class="form-select" name="country[]" id="country" multiple aria-label="multiple select example">
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="genres" class="form-label">Жанры</label>
                <select class="form-select" name="genres[]" id="genres" multiple aria-label="multiple select example">
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="genres" class="form-label">Статус</label>
                <select name="status" class="form-select" aria-label="Default select example">
                    @foreach ($statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
                  </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Добавить лот</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
