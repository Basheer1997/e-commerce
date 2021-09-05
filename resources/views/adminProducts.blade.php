@extends('layout.app')
@section('content')
        <hr />
        @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
        <h1 style="display: inline-block;">Products</h1>
        <a href="{{route('product.create')}}" type="button" class="btn btn-success float-right">
            Add Product
        </a>
        <hr />
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Title</th>
                    <th scope="col">SubTitle</th>
                    <th scope="col">Price</th>
                    <th scope="col" style="width: 350px;">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->title}}</td>
                <td>{{$product->subTitle}}</td>
                <td>${{$product->price}}</td>
                <td>{{$product->description}}</td>
               <td>



                          <a href="{{route('product.edit',$product->id)}}" class="btn btn-outline-primary">Edit</a> |
                        <form action="{{route('product.destroy',$product->id)}}" method="post" style="display: inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    @endsection
