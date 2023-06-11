@extends('layout')

@section('title', 'Details')
@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-12 d-flex align-items-center justify-content-center" style="height: 30vh;">
            <span class="fs-1 fw-bold text-decoration-underline">Book Details</span>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-8">
        @php
            $author = $book->find($book->id)->relAuthors ?? null;
        @endphp
<h3>Title: {{ $book->title }}</h3>
<p class="fs-5">Author: {{$author->name }}</p><p class="text-end fs-5">Price: {{ number_format($book->price, 2, ',', '.') }}</p>
<h4>synopsis: {{ $book->description }}</h4>
    </div>
<div class="col-8 d-flex align-items-end justify-content-end">
<a href="{{ route('book.index')}}" class="btn btn-outline-dark mt-5">Voltar</a>
</div>
</div>






@endsection