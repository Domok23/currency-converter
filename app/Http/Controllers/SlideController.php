<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    // Tampilkan semua slides
    public function index()
    {
        $slides = Slide::all();
        return view('slides.index', compact('slides'));
    }

    // Form untuk menambahkan slide baru
    public function create()
    {
        return view('slides.create');
    }

    // Simpan slide baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'embed_link' => 'required'
        ]);

        Slide::create($request->all());
        return redirect()->route('slides.index')->with('success', 'Slide berhasil ditambahkan.');
    }

    // Form untuk edit slide
    public function edit(Slide $slide)
    {
        return view('slides.edit', compact('slide'));
    }

    // Update slide
    public function update(Request $request, Slide $slide)
    {
        $request->validate([
            'title' => 'required',
            'embed_link' => 'required'
        ]);

        $slide->update($request->all());
        return redirect()->route('slides.index')->with('success', 'Slide berhasil diperbarui.');
    }

    // Hapus slide
    public function destroy(Slide $slide)
    {
        $slide->delete();
        return redirect()->route('slides.index')->with('success', 'Slide berhasil dihapus.');
    }
}