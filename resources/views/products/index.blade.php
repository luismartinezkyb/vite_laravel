@extends('layouts.header')
@section('content')
<h1>Listado de productos</h1>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Listado de productos
          <a href="{{route('products.create')}}" class="btn btn-success btn-sm float-right">New Product</a> 
        </div>
        <div class="card-body">
          @if(session('info'))
          <div class="alert alert-success">
              {{session('info')}}    
          </div>
          
          @endif
            
          <table class="table table-hover table-sm">
              <thead>

                <th>Description</th>
                <th>Price</th>
                <th>accion</th>
              </thead>
              <tbody>
                  @foreach($products as $prod)
                  <tr>
                      <td>{{$prod->description}}</td>
                      <td>{{$prod->price}}</td>
                      <td>
                        {{-- <a 
                          href="javascript: document.getElementById('delete-{{$prod->id}}').submit()" 
                          class="btn btn-danger btn-sm">Eliminar</a> --}}
                        <a href="{{route('products.edit', $prod->id)}}" class="btn btn-warning btn-sm">Editar</a>
                        <form 
                          id="delete-{{$prod->id}}" 
                          action="{{route('products.destroy', $prod->id)}}" 
                          method="POST"
                        >
                        @method('delete')
                        @csrf
                        <button
                          class="btn btn-danger btn-sm"
                          type="submit"
                        >Eliminar</button>
                        </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
            
        </div>    
        <div class="card-footer">Bienvenido {{auth()->user()->name}} - {{auth()->user()->email}}
          <a href="javascript: document.getElementById('logout').submit()" class="float-right btn btn-danger btn-sm">Log Out</a>
          <form action="{{route('logout')}}" method="POST" id="logout" style="display: none;">
            @method('post')
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
