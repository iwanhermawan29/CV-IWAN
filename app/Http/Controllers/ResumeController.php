<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function index()
    {
        $resumes = Resume::latest()->paginate(10);
        return view('resumes.index', compact('resumes'));
    }

    public function create()
    {
        return view('resumes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image_resume' => 'nullable|image|max:2048',
            'nama'         => 'required|string|max:255',
            'posisi'       => 'required|string|max:255',
            'negara'       => 'required|string|max:100',
        ]);

        if ($request->hasFile('image_resume')) {
            $data['image_resume'] = $request->file('image_resume')
                ->store('resumes', 'public');
        }

        $data['created_by'] = Auth::id();
        Resume::create($data);

        return redirect()->route('resumes.index')
            ->with('success', 'Resume berhasil dibuat.');
    }

    public function show(Resume $resume)
    {
        return view('resumes.show', compact('resume'));
    }

    public function edit(Resume $resume)
    {
        return view('resumes.edit', compact('resume'));
    }

    public function update(Request $request, Resume $resume)
    {
        $data = $request->validate([
            'image_resume' => 'nullable|image|max:2048',
            'nama'         => 'required|string|max:255',
            'posisi'       => 'required|string|max:255',
            'negara'       => 'required|string|max:100',
        ]);

        if ($request->hasFile('image_resume')) {
            if ($resume->image_resume) {
                Storage::disk('public')->delete($resume->image_resume);
            }
            $data['image_resume'] = $request->file('image_resume')
                ->store('resumes', 'public');
        }

        $data['updated_by'] = Auth::id();
        $resume->update($data);

        return redirect()->route('resumes.index')
            ->with('success', 'Resume berhasil diperbarui.');
    }

    public function destroy(Resume $resume)
    {
        if ($resume->image_resume) {
            Storage::disk('public')->delete($resume->image_resume);
        }
        $resume->delete();

        return redirect()->route('resumes.index')
            ->with('success', 'Resume berhasil dihapus.');
    }
}
