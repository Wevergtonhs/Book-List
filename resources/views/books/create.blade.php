@extends('layout')

@section('title', 'New Book')
@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-12 d-flex align-items-center justify-content-center" style="height: 20vh;">
            <span class="fs-1 fw-bold text-decoration-underline">
                   @if (isset($books))
                   Edit Book
                   @else
                   Add a New Book
                   @endif
            </span>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="d-flex align-items-center justify-content-center">

        @if (isset($books))
            <form class="col-6" name="editBook" id="editBook" action="{{ route('book.update', $books->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
        @else
            <form class="col-6" name="addBook" id="addBook" action="{{ route('book.store')}}" method="POST" enctype="multipart/form-data">
        @endif

@csrf
    <label for="title" class="form-label fs-5 fw-semibold">Title</label>
    <input type="text" name="title" id="title" value="{{ $books->title ?? '' }}" class="form-control fs-6 border border-black" autocomplete="off" required>

    <label for="author" class="form-label fs-5 fw-semibold">Author</label>
    <select type="text" name="author" id="author" class="form-control fs-6 border border-black" required>
        <option value="{{ $books->relAuthors->id ?? '' }}"> {{ $books->relAuthors->name ?? '' }} </option>
        @foreach ($authors as $author)

        <option value="{{ $author->id }}">{{ $author->name }}</option>
            
        @endforeach
    </select>

    <label for="description" class="form-label fs-5 fw-semibold">Description</label>
    <input type="text" name="description" id="description" value="{{ $books->description ?? '' }}" class="form-control fs-6 border border-black" required>

    <label for="pages" class="form-label fs-5 fw-semibold">Pages</label>
    <input type="number" name="pages" id="pages" value="{{ $books->pages ?? '' }}"  class="form-control fs-6 border border-black" required>

    <label for="genre" class="form-label fs-5 fw-semibold">Genre</label>
    <input type="text" name="genre" id="genre" value="{{ $books->genre ?? '' }}"  class="form-control fs-6 border border-black" required>

    <label for="price" class="form-label fs-5 fw-semibold">Price</label>
    <input type="number" step="any"  name="price" id="price" value="{{ $books->price ?? '' }}" class="form-control fs-6 border border-black mb-4">

    <div class="row">
    <div class="d-flex align-items-center justify-content-center">
        <button class="btn btn-success me-4" type="submit">Save</button>
        <a href="{{ route('book.index')}}" class="btn btn-secondary ms-4">Back</a>
    </div>
</div>

</form>
</div>
    </div>
</div>
@endsection