<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('percentage', 'desc')->paginate(10);
        return view('skills.index', compact('skills'));
    }

    public function create()
    {
        return view('skills.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'percentage' => 'required|integer|min:0|max:100',
        ]);

        $data['created_by'] = Auth::id();
        Skill::create($data);

        return redirect()->route('skills.index')
            ->with('success', 'Skill added successfully.');
    }

    public function edit(Skill $skill)
    {
        return view('skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'percentage' => 'required|integer|min:0|max:100',
        ]);

        $data['updated_by'] = Auth::id();
        $skill->update($data);

        return redirect()->route('skills.index')
            ->with('success', 'Skill updated successfully.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skills.index')
            ->with('success', 'Skill removed successfully.');
    }
}
