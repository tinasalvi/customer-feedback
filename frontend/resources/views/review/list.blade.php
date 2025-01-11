@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Review list') }}
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
                                    <th scope="col">rating</th>
                                    <th scope="col">review_text</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($reviews->isEmpty())
                                    <tr>
                                        <td scope="row" colspan="7">no review found</td>
                                    </tr>
                                @else
                                    @foreach ($reviews as $review)
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>{{ $review->rating }}</td>
                                            <td>{{ $review->review_text }}</td>


                                            {{-- <td>
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <a href="{{ route('product.edit', $product->id) }}"
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
                                            </td> --}}
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
