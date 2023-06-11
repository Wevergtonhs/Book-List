@extends('layout')

@section('title', 'Books List')
@section('content')
 
<div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-8 d-flex align-items-center justify-content-center" style="height: 20vh;">
            <span class="fs-1 fw-bold text-decoration-underline">Personal Development Books</span>
        </div>
    <div class="row align-items-center justify-content-center">
        <div class="col-md-8 col-md-offset-3 d-flex align-items-end justify-content-end">
            <a href="{{url('books/create')}}" class="btn btn-success">+ Add Book</a>
        </div>
    </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-7">
        <table class="table table-striped">
            <thead class="table-dark fs-5">
                <tr>
                    <th>Book</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider fs-6">
                @foreach ($books as $book)

                    @php
                        $author = $book->find($book->id)->relAuthors;
                    @endphp
                    
                <tr>
                    <td data-label="Book">{{ $book->title }}</td>
                    <td data-label="Author">{{ $author->name }}</td>
                    <td data-label="Price">€ {{ number_format($book->price, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{url("books/details/$book->id")}}" class="btn btn-outline-success ms-5">Details</a>
                        <a href="{{url("books/$book->id/edit")}}" class="btn btn-outline-primary">Edit</a>
                        <form action="{{ route('book.delete', $book->id)}}" method="POST" style="display: inline-block;" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection