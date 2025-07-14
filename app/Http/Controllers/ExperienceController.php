<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::where('user_id', Auth::id())
            ->orderBy('order')
            ->get();
        return view('experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('experiences.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'company'     => 'nullable|string|max:255',
            'start_year'  => 'nullable|digits:4|integer',
            'end_year'    => 'nullable|digits:4|integer|gte:start_year',
            'description' => 'nullable|string',
            'order'       => 'nullable|integer',
        ]);

        $data['user_id'] = Auth::id();
        Experience::create($data);

        return redirect()->route('experiences.index')
            ->with('success', 'Experience added.');
    }

    public function edit(Experience $experience)
    {
        return view('experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'company'     => 'nullable|string|max:255',
            'start_year'  => 'nullable|digits:4|integer',
            'end_year'    => 'nullable|digits:4|integer|gte:start_year',
            'description' => 'nullable|string',
            'order'       => 'nullable|integer',
        ]);

        $experience->update($data);
        return redirect()->route('experiences.index')
            ->with('success', 'Experience updated.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('experiences.index')
            ->with('success', 'Experience removed.');
    }
}
