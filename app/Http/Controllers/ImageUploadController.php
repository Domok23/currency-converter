<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function index() {
        return view('image-upload');  // This renders the Blade view
    }

    public function upload(Request $request) {
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);

        return response()->json([
            'success' => 'Gambar berhasil di-upload',
            'filename' => $filename  // Kembalikan nama file untuk frontend
        ]);
    }

    return response()->json(['error' => 'Tidak ada file yang di-upload'], 400);
}
}