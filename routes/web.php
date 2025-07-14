<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HeroController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Resume;
use App\Models\About;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Hero;

Route::get('/', function () {
    // ambil record About (misal yang pertama)
    $about = About::first();
    $resume = Resume::first();
    $skills = Skill::orderBy('percentage', 'desc')->get();
    $educations = Education::where('user_id', Auth::id())
        ->orderBy('order')
        ->get();
    $experiences = Experience::where('user_id', Auth::id())
        ->orderBy('order')
        ->get();
    $heroes = Hero::first();
    return view('welcome', compact('about', 'resume', 'skills', 'educations', 'experiences', 'heroes'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('abouts', AboutController::class);
    Route::resource('resumes', ResumeController::class);
    Route::resource('skills', SkillController::class)
        ->except(['show']);



    Route::resource('educations', EducationController::class)->except(['show']);
    Route::resource('experiences', ExperienceController::class)->except(['show']);
    Route::resource('contacts', ContactController::class);
    Route::resource('heroes', HeroController::class)->except(['show']);
});

require __DIR__ . '/auth.php';
