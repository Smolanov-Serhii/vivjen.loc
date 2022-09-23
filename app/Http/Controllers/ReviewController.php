<?php

namespace App\Http\Controllers;

use App\Models\ModuleItem;
use App\Services\ReviewService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class ReviewController extends Controller
{

    public function store(Request $request, ReviewService $reviewService)
    {
        if (Auth::user()->client) {
            $id = $reviewService->createReview($request->all());

            if ($id) {
                return response()->json(['status' => true], 200, []);
            } else {
                return response()->json(['status' => false], 400, []);
            }
        }
        return response()->json(['status' => false], 400, []);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ModuleItem $review
     * @param Request $request
     * @return JsonResponse
     */
    public function moderate(ModuleItem $review, Request $request): JsonResponse
    {
        $attr = $review->module->attrs->where('key', 'is_approved')->first();
        $attr_fio = $review->module->attrs->where('key', 'fio')->first();

        $name = $review->props()->where('module_attribute_id', $attr_fio->id)->first()->value;

        $review->props()->where('module_attribute_id', $attr->id)->first()->update([
            'value' => request('is_approved'),
        ]);

        return response()->json([
            'message' => "Review '{$name}' status {$request->get('is_approved')}"
        ]);
    }

}
