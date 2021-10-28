<div class="m-6 p-6">
    <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th scope="col">제조회사</th>
            <th scope="col">자동차명</th>
            <th scope="col">제조년도</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($cars as $car)
          <tr>
            <th><a href="{{ route('cars.show', ['car' => $car->id]) }}">{{ $car->cop }}</a></th>
            <td>{{ $car->name }}</td>
            <td>{{ $car->year }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{  $cars->links() }}
</div>