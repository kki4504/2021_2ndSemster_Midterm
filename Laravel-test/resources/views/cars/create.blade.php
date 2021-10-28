<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create CarInfo') }}
            </h2>
            <button onclick=location.href="{{ route('cars.index') }}" 
                    type="button" 
                    class="btn btn-info hover:bg-blue-700 font-bold text-white"
                    >
                    목록보기
            </button>
        </div>
    </x-slot>
    <div class="m-3 mx-12 p-6">
        <div class="card mx-12">
        <form class="row g-3 mx-12 mt-3" 
              action="{{ route('cars.store') }}"
              method="post" 
              enctype="multipart/form-data">    
            @csrf
            <div class="col-12 m-2">
                <label for="cop" class="form-label">제조회사</label>
                <input type="text" name="cop" class="form-control" id="cop" placeholder="제조회사" value="{{ old('cop') }}"/>
                @error('cop')
                    <div class="text-red-800">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="col-12 m-2">
                <label for="name" class="form-label">자동차 명</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="자동차 명" value="{{ old('name') }}"/>
                @error('name')
                    <div class="text-red-800">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="col-12 m-2">
                <label for="year" class="form-label">제조년도</label>
                <input type="text" name="year" class="form-control" id="year" placeholder="제조년도" value="{{ old('year') }}"/>
                @error('year')
                    <div class="text-red-800">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="col-12 m-2">
                <label for="price" class="form-label">가격</label>
                <input type="text" name="price" class="form-control" id="price" placeholder="가격" value="{{ old('price') }}"/>
                @error('price')
                    <div class="text-red-800">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="col-12 m-2">
                <label for="type" class="form-label">차종</label>
                <input type="text" name="type" class="form-control" id="type" placeholder="차종" value="{{ old('type') }}"/>
                @error('type')
                    <div class="text-red-800">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="col-12 m-2">
                <label for="form" class="form-label">외형</label>
                <input type="text" name="form" class="form-control" id="form" placeholder="외형" value="{{ old('form') }}"/>
                @error('form')
                    <div class="text-red-800">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="col-12 m-2">
                <label for="image" class="form-label">자동차 이미지</label>
                <input type="file" name="image" class="form-control" id="image">
                @error('image')
                    <div class="text-red-800">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="col-12 m-2">
              <button type="submit" class="btn btn-primary">차량정보저장</button>
            </div>
            </div>
        </form>
    </div>
    </div>
</x-app-layout>
