<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $product_id = $request->product_id;
        $reviews = Review::find($product_id);
        if ($reviews) {
            $reviews = $reviews->get();
        } else {
            $reviews = new Collection();
        }
        return view("review.list", compact("reviews"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $product = Product::find($request->id);

        return view("review.create", compact("product"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request)
    {

        $data = $request->all();
        $data['customer_id'] = auth()->id();
        $data['product_id'] = $request->id;

        $review = Review::create($data);
        return redirect()->route("product.index")->with("success", "review added");
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return view("review.index", compact(""));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        $review = Review::find($review->id);
        return view("review.edit", compact("review"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        $review->update($request->all());
        return redirect()->route("review.index")->with("success", "review edited");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route("review.index")->with("success", "review deleted");
    }
}
