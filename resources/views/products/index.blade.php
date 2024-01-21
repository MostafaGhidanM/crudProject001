@extends('products.productLayout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Home Page for Products</h2>
        </div>
        <div class="pull-right mb-4">
            <a class="btn btn-success" href="{{ route('products.create') }}">Create New Product 
            </a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
@if (count($products) > 0)
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Price</th>
        <th width="280px">Action</th>
    </tr>
@foreach ($products as $product)
<tr>
    <td>{{ ++$i }}</td>
    <td>{{ $product->productName }}</td>
    <td>{{ $product->productPrice }}</td>
    <td>
        <form action="{{ route('products.destroy',$product->id) }}"method="POST">
            <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a> 
            @csrf
            @method('DELETE') 
            <button type="submit" class="btn btn-danger" onclick="return confirmDelete()">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
@else
<div class="pull-left">
    <h2>No Products Found</h2>
</div>
    
@endif

    {!! $products->links('pagination::bootstrap-4') !!} 
<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this item?');
    }
</script>
@endsection
