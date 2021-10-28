<div class="container">
    <div class="mx-14">
      <div class="card mt-4 mx-5">
        <div class="justify-items-center">
            <img src="{{ '/storage/images/'.$car->image }}" class="card-img-top w-4/4 h-3/4" alt="my car image">
            </div>
          <div class="card-body">
            <h1 class="card-title">{{ $car->name }}</h1>
            <p class="card-text">{{ $car->cop }}</p>
          </div>
          <div>
            <hr />
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">제조년도: {{ $car->year }}</li>
            <li class="list-group-item">가격: {{ $car->price }} 원</li>
            <li class="list-group-item">차종: {{ $car->type }}</li>
            <li class="list-group-item">외형: {{ $car->form }}</li>
            <li class="list-group-item">등록일: {{ $car->created_at->diffForHumans() }}</li>
            <li class="list-group-item">변경일: {{ $car->updated_at->diffForHumans() }}</li>
          </ul>
          <div class="card-body flex">
            <button class="btn btn-primary">
                <a href="{{ route('cars.edit', ['car' => $car->id]) }}" class="card-link">수정하기</a>
            </button>
            <form id="form" class="ml-4" name="" method="post" 
              onsubmit="event.preventDefault(); confirmDelete(event)"
              action="{{ route('cars.destroy', ['car' => $car->id]) }}">
              @csrf
              @method('delete')
              {{-- <input type="hidden" name="_method" value="delete"> --}}
              <button class="btn btn-danger">삭제하기</button>
            </form>
          </div>
        </div>
        <div class="card mt-2 mb-5 mx-5">
          {{-- <comment-list :car="{{ $car }}" :loginuser="{{ auth()->user()->id }}"/> --}}
        </div>
    </div>
  </div>