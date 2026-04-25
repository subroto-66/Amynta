<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController
{
    public function index()
    {
        $faqs = Faq::orderBy('id', 'desc')->get();

        return Inertia('Faq/Index', ['faqs' => $faqs]);
    }

    public function create()
    {
        return Inertia('Faq/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'page' => 'required',
        ]);

        $faq = new Faq;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->page = $request->page;
        $faq->status = $request->status;
        $faq->save();

        return redirect()->route('faqs.index')->with('success', 'FAQ created successfully.');
    }

    public function edit(Faq $faq)
    {
        return Inertia('Faq/Edit', ['faq' => $faq]);
    }

    public function update(Request $request, $faq)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'page' => 'required',
            'status' => 'required',
        ]);

        $faq = Faq::find($faq);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->page = $request->page;
        $faq->status = $request->status;
        $faq->save();

        return redirect()->route('faqs.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}
