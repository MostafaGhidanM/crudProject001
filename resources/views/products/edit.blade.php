@extends('products.productLayout')
@section("content")

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit A Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('products.update',$product->id) }}" method="POST">
    @csrf
    @method('PUT')
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Name:</strong>
                <input type="text" name="productName" class="form-control" placeholder="Product Name" value="{{ $product->productName }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Price:</strong>
                <input type="decimal" class="form-control" name="productPrice" placeholder="Product Price" value="{{ $product->productPrice }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Description:</strong>
                <textarea name="productDescription" cols="30" rows="3" class="form-control" placeholder="Product Description">{{ $product->productDescription}}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Producer:</strong>
                <input type="text" class="form-control" name="productProducer" placeholder="Product Producer" value="{{ $product->productProducer}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br>
                <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </div>
   
</form>
@endsection
