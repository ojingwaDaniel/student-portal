<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function create()
    {
        return view('materials.upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'level' => 'required|in:100L,200L,300L,400L,500L',
            'category' => 'required|in:handout,textbook,past_question', // ✅ match DB values
            'file' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $filePath = $request->file('file')->store('materials', 'public');

        Material::create([
            'title' => $request->title,
            'level' => $request->level,
            'category' => $request->category, // ✅ same format
            'file_path' => $filePath,
            'uploaded_by' => auth()->id(),
        ]);

        return back()->with('success', 'Material uploaded successfully.');
    }

    public function index()
    {
        $level = auth()->user()->level;

        $handouts = Material::where('category', 'handout')
            ->where('level', $level)
            ->latest()
            ->get();

        $textbooks = Material::where('category', 'textbook')
            ->where('level', $level)
            ->latest()
            ->get();

        $pastQuestions = Material::where('category', 'past_question')
            ->where('level', $level)
            ->latest()
            ->get();

        return view('materials.index', compact('handouts', 'textbooks', 'pastQuestions'));
    }

    public function handouts()
    {
        $materials = Material::where('category', 'handout')
            ->where('level', auth()->user()->level)
            ->get();

        return view('materials.category', [
            'materials' => $materials,
            'title' => 'Handouts'
        ]);
    }

    public function textbooks()
    {
        $materials = Material::where('category', 'textbook')
            ->where('level', auth()->user()->level)
            ->get();

        return view('materials.category', [
            'materials' => $materials,
            'title' => 'Textbooks'
        ]);
    }

    public function pastQuestions()
    {
        $materials = Material::where('category', 'past_question')
            ->where('level', auth()->user()->level)
            ->get();

        return view('materials.category', [
            'materials' => $materials,
            'title' => 'Past Questions'
        ]);
    }
}
