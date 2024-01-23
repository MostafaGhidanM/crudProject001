@extends('products.productLayout')
@section("content")

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
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
   
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Name:</strong>
                <input type="text" name="productName" class="form-control" placeholder="Product Name" value="{{ old('productName') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Price:</strong>
                <input type="decimal" class="form-control" name="productPrice" placeholder="Product Price" value="{{ old('productPrice') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Description:</strong>
                <textarea name="productDescription" cols="30" rows="3" class="form-control" placeholder="Product Description">{{ old('productDescription') }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Producer:</strong>
                <input type="text" class="form-control" name="productProducer" placeholder="Product Producer" value="{{ old('productProducer') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Image:</strong>
                <input type="file" id="photo" class="form-control" name="photo" value="{{ old('photo') }}" onchange="photoPreviewFn(this);">
            </div>
            <img id="imagePreview" style="max-width: 150px; max-height:100px;" src="" alt="Photo Preview">

            @if ($errors->has('photo'))
            <div class="error">{{ $errors->First('photo') }}</div>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br>
                <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </div>
   
</form>
<script>
    function photoPreviewFn(inputFile){
        var file = inputFile.files[0];
        if(file){
            var reader = new FileReader()
            reader.onload = function(){
                document.getElementById('imagePreview').setAttribute('src',reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection
