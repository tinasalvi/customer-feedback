<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a All review
     * GET /api/reviews
     */
    public function index()
    {
        $reviews = Review::with(['customer', 'product'])->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Review fetched successfully',
            'data' => $reviews
        ]);
    }
    /**
     * Store a review on product
     * POST /api/products/{id}/reviews
     */
    public function store(StoreReviewRequest $request)
    {
        $data = $request->all();
        $data['customer_id'] = auth()->id();
        $data['product_id'] = $request->id;

        $review = Review::create($data);
        return response()->json([
            'status' => 'success',
            'message' => 'Review added successfully',
            'data' => $review
        ]);
    }

    /**
     * Update a review status on product
     * PUT /api/products/{id}/reviews
     */
    public function update(Request $request)
    {
        $status = $request->all()['status'];

        $review = Review::find($request->id);
        $review->update(['status' => $status]);

        return response()->json([
            'status' => 'success',
            'message' => 'Review status updated successfully',
            'data' => $review
        ]);
    }

    /**
     * Count of reviews by status (Pending, Approved)
     * GET /api/reports/reviews
     */
    public function reviewsByStatusReport()
    {
        $review = DB::select('select count(*) as review_status, status from reviews group by status');
        return response()->json([
            'status' => 'success',
            'message' => '',
            'data' => $review
        ]);
    }
}
