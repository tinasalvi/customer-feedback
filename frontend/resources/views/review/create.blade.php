@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Add review') }}
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('store.review', $product->id) }}" method="post">
                            @csrf
                            <!-- TODO: This is for server side, there is another version for browser defaults -->
                            <div class="mb-3">
                                <label for="rating" class="form-label">rating</label>
                                <input type="text" class="form-control @error('rating') is-invalid @enderror"
                                    name="rating" id="rating" aria-describedby="rating" placeholder=""
                                    value="{{ old('rating') }}" />

                                @error('rating')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="review_text" class="form-label">review_text</label>
                                <input type="text" class="form-control @error('review_text') is-invalid @enderror"
                                    name="review_text" id="review_text" aria-describedby="review_text" placeholder=""
                                    value="{{ old('review_text') }}" />

                                @error('review_text')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="mb-3">
                                <label for="status"
                                    class="form-label @error('status') is-invalid @enderror">status</label>
                                <select class="form-select form-select-lg" name="status" id="status">
                                    <option @selected(old('status') == 'Pending') value="Pending">Pending</option>
                                    <option @selected(old('status') == 'Approved') value="Approved">Approved</option>
                                </select>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> --}}

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
