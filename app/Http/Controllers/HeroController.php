<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        $heroes = Hero::orderBy('order')->get();
        return view('heroes.index', compact('heroes'));
    }

    public function create()
    {
        return view('heroes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'background_image' => 'required|image|max:2048',
            'heading'          => 'required|string|max:255',
            'subheading'       => 'nullable|string|max:255',
            'button_text'      => 'nullable|string|max:100',
            'button_url'       => 'nullable|url|max:255',
            'order'            => 'nullable|integer|min:0',
        ]);

        // Handle file upload
        if ($request->hasFile('background_image')) {
            $data['background_image'] = $request->file('background_image')
                ->store('heroes', 'public');
        }

        Hero::create($data);
        return redirect()->route('heroes.index')->with('success', 'Slide added.');
        return redirect()->route('heroes.index')->with('success', 'Slide added.');
    }


    public function edit(Hero $hero)
    {
        return view('heroes.edit', compact('hero'));
    }

    public function update(Request $request, Hero $hero)
    {
        $data = $request->validate([
            'background_image' => 'nullable|image|max:2048',
            'heading'          => 'required|string|max:255',
            'subheading'       => 'nullable|string|max:255',
            'button_text'      => 'nullable|string|max:100',
            'button_url'       => 'nullable|url|max:255',
            'order'            => 'nullable|integer|min:0',
        ]);

        // Handle file upload if new file provided
        if ($request->hasFile('background_image')) {
            $data['background_image'] = $request->file('background_image')
                ->store('heroes', 'public');
        }

        $hero->update($data);
        return redirect()->route('heroes.index')->with('success', 'Slide updated.');
        ($data);
        return redirect()->route('heroes.index')->with('success', 'Slide updated.');
    }
    public function destroy(Hero $hero)
    {
        $hero->delete();
        return redirect()->route('heroes.index')->with('success', 'Slide removed.');
    }
}
