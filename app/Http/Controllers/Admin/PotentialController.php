<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PotentialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $potentials = \App\Models\Potential::latest()->get();
        return view('admin.potentials.index', compact('potentials'));
    }

    public function create()
    {
        return view('admin.potentials.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:20480',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('potentials', 'public');
        }

        \App\Models\Potential::create($data);
        return redirect()->route('admin.potentials.index')->with('success', 'Potensi berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $potential = \App\Models\Potential::findOrFail($id);
        return view('admin.potentials.edit', compact('potential'));
    }

    public function update(Request $request, string $id)
    {
        $potential = \App\Models\Potential::findOrFail($id);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:20480',
        ]);

        if ($request->hasFile('image')) {
            if ($potential->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($potential->image);
            }
            $data['image'] = $request->file('image')->store('potentials', 'public');
        }

        $potential->update($data);
        return redirect()->route('admin.potentials.index')->with('success', 'Potensi berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $potential = \App\Models\Potential::findOrFail($id);
        if ($potential->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($potential->image);
        }
        $potential->delete();
        return redirect()->route('admin.potentials.index')->with('success', 'Potensi berhasil dihapus');
    }
}
