@extends('layouts.app')

@section('content')
    <h2>Edit Product</h2>
    @include('products.form', ['product' => $product])
@endsection
