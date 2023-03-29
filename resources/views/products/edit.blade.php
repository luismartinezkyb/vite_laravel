@extends('layouts.header')
@section('content')
<h1>Editar producto</h1>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Editar producto
                    
                </div>
                <div class="card-body">
                    <form action="{{route('products.update', $product->id)}}" method="POST" accept-charset="utf-8">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label>Description</label>
                            <input value="{{$product->description}}" required type="text" class="form-control" name="description">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input value="{{$product->price}}" required type="number" class="form-control" name="price">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{route('products.index')}}" class="btn btn-danger">Cancelar</a>
                    </form>
                </div>    
            </div>
        </div>
    </div>
    
</div>
