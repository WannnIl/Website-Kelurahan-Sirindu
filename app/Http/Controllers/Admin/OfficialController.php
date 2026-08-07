<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfficialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $officials = \App\Models\Official::orderBy('order_number')->get();
        return view('admin.officials.index', compact('officials'));
    }

    public function create()
    {
        return view('admin.officials.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'order_number' => 'nullable|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:20480',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('officials', 'public');
        }

        \App\Models\Official::create($data);
        return redirect()->route('admin.officials.index')->with('success', 'Perangkat kelurahan berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $official = \App\Models\Official::findOrFail($id);
        return view('admin.officials.edit', compact('official'));
    }

    public function update(Request $request, string $id)
    {
        $official = \App\Models\Official::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'order_number' => 'nullable|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:20480',
        ]);

        if ($request->hasFile('photo')) {
            if ($official->photo) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($official->photo);
            }
            $data['photo'] = $request->file('photo')->store('officials', 'public');
        }

        $official->update($data);
        return redirect()->route('admin.officials.index')->with('success', 'Perangkat kelurahan berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $official = \App\Models\Official::findOrFail($id);
        if ($official->photo) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($official->photo);
        }
        $official->delete();
        return redirect()->route('admin.officials.index')->with('success', 'Perangkat kelurahan berhasil dihapus');
    }
}
