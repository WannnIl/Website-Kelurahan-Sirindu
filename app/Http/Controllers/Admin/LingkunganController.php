<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lingkungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LingkunganController extends Controller
{
    public function index()
    {
        $lingkungans = Lingkungan::all();
        return view('admin.lingkungan.index', compact('lingkungans'));
    }

    public function create()
    {
        return view('admin.lingkungan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'area_size' => 'nullable|string|max:255',
            'population' => 'nullable|string|max:255',
            'livelihood' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('lingkungan', 'public');
        }

        Lingkungan::create($data);

        return redirect()->route('admin.lingkungan.index')->with('success', 'Data Lingkungan berhasil ditambahkan.');
    }

    public function edit(Lingkungan $lingkungan)
    {
        return view('admin.lingkungan.edit', compact('lingkungan'));
    }

    public function update(Request $request, Lingkungan $lingkungan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'area_size' => 'nullable|string|max:255',
            'population' => 'nullable|string|max:255',
            'livelihood' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            if ($lingkungan->image) {
                Storage::disk('public')->delete($lingkungan->image);
            }
            $data['image'] = $request->file('image')->store('lingkungan', 'public');
        }

        $lingkungan->update($data);

        return redirect()->route('admin.lingkungan.index')->with('success', 'Data Lingkungan berhasil diperbarui.');
    }

    public function destroy(Lingkungan $lingkungan)
    {
        if ($lingkungan->image) {
            Storage::disk('public')->delete($lingkungan->image);
        }
        $lingkungan->delete();

        return redirect()->route('admin.lingkungan.index')->with('success', 'Data Lingkungan berhasil dihapus.');
    }
}
