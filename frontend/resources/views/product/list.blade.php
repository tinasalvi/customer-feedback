@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('product.create') }}">{{ __('Create New product') }}</a>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">category</th>
                                    <th scope="col">price</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($products->isEmpty())
                                    <tr>
                                        <td scope="row" colspan="7">no product found</td>
                                    </tr>
                                @else
                                    @foreach ($products as $product)
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->customer->name }}</td>

                                            <td>
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <a href="{{ route('view.review', $product->id) }}"
                                                            class="btn btn-primary btn-sm">View Review</a>
                                                    </div>
                                                    <div class="col-sm">
                                                        <a href="{{ route('add.review', $product->id) }}"
                                                            class="btn btn-primary btn-sm">Give Review</a>
                                                    </div>
                                                    <div class="col-sm">
                                                        <a href="{{ route('product.edit', $product->id) }}"
                                                            class="btn btn-primary btn-sm">Edit</a>
                                                    </div>
                                                    <div class="col-sm">
                                                        <form action="{{ route('product.destroy', $product->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
