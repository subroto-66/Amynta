<?php

namespace App\Http\Controllers;

use App\Models\ReachOut;
use Illuminate\Http\Request;

class ReachOutController
{
    public function index()
    {
        $reachOut = ReachOut::orderBy('id', 'desc')->get();

        return inertia('ReachOut/Index', [
            'reachOut' => $reachOut,
        ]);
    }

    public function create(Request $request)
    {
        return inertia('ReachOut/Create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,svg,webp,gif|max:2048',
            'title' => 'required',
            'address_one' => 'nullable',
            'address_two' => 'nullable',
        ]);

        $reachOut = new ReachOut;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('reachOut'), $imageName);
            $reachOut->image = $imageName;
        }

        $reachOut->title = $request->title;
        $reachOut->address_one = $request->address_one;
        $reachOut->address_two = $request->address_two;
        $reachOut->save();

        return redirect()->route('reachOut.index')->with('message', 'Reach Out updated successfully.');
    }

    public function edit($id)
    {
        $reachOut = ReachOut::find($id);

        return inertia('ReachOut/Edit', [
            'reachOut' => $reachOut,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg,svg,webp,gif|max:2048',
            'title' => 'required',
            'address_one' => 'nullable',
            'address_two' => 'nullable',
        ]);

        $reachOut = ReachOut::find($id);

        if ($request->hasFile('image')) {

            if ($reachOut->image) {

                $imagePath = public_path('reachOut/'.$reachOut->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('reachOut'), $imageName);
                $reachOut->image = $imageName;

            } else {

                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('reachOut'), $imageName);
                $reachOut->image = $imageName;

            }
        }

        $reachOut->title = $request->title;
        $reachOut->address_one = $request->address_one;
        $reachOut->address_two = $request->address_two;
        $reachOut->save();

        return redirect()->route('reachOut.index')->with('message', 'Reach Out updated successfully.');
    }

    public function destroy($id)
    {
        $reachOut = ReachOut::find($id);

        $imagePath = public_path('reachOut/'.$reachOut->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $reachOut->delete();

        return redirect()->route('reachOut.index')->with('message', 'Reach Out deleted successfully.');
    }
}
