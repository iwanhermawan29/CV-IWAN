<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::latest()->paginate(10);
        return view('about.index', compact('abouts'));
    }

    public function create()
    {
        return view('about.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'nullable|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('about', 'public');
        }

        About::create($data);

        return redirect()->route('abouts.index')
            ->with('success', 'About entry created.');
    }

    public function show(About $about)
    {
        return view('about.show', compact('about'));
    }

    public function edit(About $about)
    {
        return view('about.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $data = $request->validate([
            'title'       => 'nullable|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // hapus file lama jika ada
            if ($about->image_path) {
                Storage::disk('public')->delete($about->image_path);
            }
            $data['image_path'] = $request->file('image')->store('about', 'public');
        }

        $about->update($data);

        return redirect()->route('abouts.index')
            ->with('success', 'About entry updated.');
    }

    public function destroy(About $about)
    {
        if ($about->image_path) {
            Storage::disk('public')->delete($about->image_path);
        }
        $about->delete();

        return redirect()->route('abouts.index')
            ->with('success', 'About entry deleted.');
    }
}
