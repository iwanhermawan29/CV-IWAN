<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::where('user_id', Auth::id())
            ->orderBy('order')
            ->get();
        return view('educations.index', compact('educations'));
    }

    public function create()
    {
        return view('educations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'degree'      => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'start_year'  => 'nullable|digits:4|integer',
            'end_year'    => 'nullable|digits:4|integer|gte:start_year',
            'description' => 'nullable|string',
            'order'       => 'nullable|integer',
        ]);

        $data['user_id'] = Auth::id();
        Education::create($data);

        return redirect()->route('educations.index')
            ->with('success', 'Education entry added.');
    }

    public function edit(Education $education)
    {
        //$this->authorize('update', $education);
        return view('educations.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        // $this->authorize('update', $education);
        $data = $request->validate([
            'degree'      => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'start_year'  => 'nullable|digits:4|integer',
            'end_year'    => 'nullable|digits:4|integer|gte:start_year',
            'description' => 'nullable|string',
            'order'       => 'nullable|integer',
        ]);

        $education->update($data);
        return redirect()->route('educations.index')
            ->with('success', 'Education entry updated.');
    }

    public function destroy(Education $education)
    {
        //  $this->authorize('delete', $education);
        $education->delete();
        return redirect()->route('educations.index')
            ->with('success', 'Education entry removed.');
    }
}
