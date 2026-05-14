<?php

namespace App\Http\Controllers;

use App\Models\PortfolioCredit;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PortfolioCreditController
{
    public function index()
    {
        $portfolioCredit = PortfolioCredit::first();

        return Inertia::render('PortfolioCredit/Edit', [
            'portfolioCredit' => $portfolioCredit,

        ]);
    }

    public function update(Request $request)
    {
        $request->validate([

            'title' => 'required',
            'description' => 'required',
            'item_one_number' => 'required',
            'item_one_text' => 'required',
            'item_two_number' => 'required',
            'item_two_text' => 'required',
            'item_three_number' => 'required',
            'item_three_text' => 'required',
            'asset_classes_one_title' => 'required',
            'asset_classes_one_icon' => 'required',
            'asset_classes_two_title' => 'required',
            'asset_classes_two_icon' => 'required',
            'asset_classes_three_title' => 'required',
            'asset_classes_three_icon' => 'required',
            'asset_classes_four_title' => 'required',
            'asset_classes_four_icon' => 'required',

        ]);

        $portfolioCredit = PortfolioCredit::first();

        $portfolioCredit->title = $request->title;
        $portfolioCredit->description = $request->description;
        $portfolioCredit->item_one_number = $request->item_one_number;
        $portfolioCredit->item_one_text = $request->item_one_text;
        $portfolioCredit->item_two_number = $request->item_two_number;
        $portfolioCredit->item_two_text = $request->item_two_text;
        $portfolioCredit->item_three_number = $request->item_three_number;
        $portfolioCredit->item_three_text = $request->item_three_text;
        $portfolioCredit->asset_classes_one_title = $request->asset_classes_one_title;
        $portfolioCredit->asset_classes_one_icon = $request->asset_classes_one_icon;
        $portfolioCredit->asset_classes_two_title = $request->asset_classes_two_title;
        $portfolioCredit->asset_classes_two_icon = $request->asset_classes_two_icon;
        $portfolioCredit->asset_classes_three_title = $request->asset_classes_three_title;
        $portfolioCredit->asset_classes_three_icon = $request->asset_classes_three_icon;
        $portfolioCredit->asset_classes_four_title = $request->asset_classes_four_title;
        $portfolioCredit->asset_classes_four_icon = $request->asset_classes_four_icon;
        $portfolioCredit->save();

        return back()->with('message', 'Portfolio Credit updated successfully');
    }
}
