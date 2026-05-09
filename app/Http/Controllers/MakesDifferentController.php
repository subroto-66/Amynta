<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\MakesDifferent;
use App\Traits\HandlesImageUpload;

class MakesDifferentController
{

    public function index()
    {
        $makesDifferents = MakesDifferent::all();
        return Inertia::render('MakesDifferent/Index', [
            'makesDifferents' => $makesDifferents,
        ]);
    }

    public function create()
    {
        return Inertia::render('MakesDifferent/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
        ]);
        
        $make_different = new MakesDifferent();
        $make_different->title = $request->title;
        $make_different->type = $request->type;
        $make_different->save();

        return redirect()->route('makesDifferent.index')->with('success', 'Makes Different created successfully');
    }

    public function edit($id)
    {
        $makesDifferent = MakesDifferent::find($id);
        return Inertia::render('MakesDifferent/Edit', [
            'makesDifferent' => $makesDifferent,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
        ]);

        $make_different = MakesDifferent::find($id);
        $make_different->title = $request->title;
        $make_different->type = $request->type;
        $make_different->save();
        
        return redirect()->route('makesDifferent.index')->with('success', 'Makes Different updated successfully');
    }

    public function destroy($id)
    {
        $make_different = MakesDifferent::find($id);
        $make_different->delete();

        return redirect()->route('makesDifferent.index')->with('success', 'Makes Different deleted successfully');
    }
}
