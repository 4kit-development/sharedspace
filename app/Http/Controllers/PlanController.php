<?php

namespace App\Http\Controllers;

use App\Category;
use App\Plan;

class PlanController extends Controller
{
    /**
     * Display a plan for a specific category.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function find(Category $category)
    {
        $plans = Plan::findByCategory($category->id)
            ->with('type')
            ->get()
            ->groupBy('type_id');

        return collect($plans)->transform(function ($plan) {
            return [
                'title' => $plan->first()->type->title,
                'options' => $plan,
                'optionSelected' => 0,
                'pricePerDay' => 0,
                'price' => 0,
                'selected' => false
            ];
        });
    }
}
