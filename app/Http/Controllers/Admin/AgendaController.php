<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::orderBy('date', 'desc')->get();
        return view('admin.agendas.index', compact('agendas'));
    }

    public function create()
    {
        return view('admin.agendas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'nullable|date_format:H:i',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Agenda::create($data);
        return redirect()->route('admin.agendas.index')->with('success', 'Agenda berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('admin.agendas.edit', compact('agenda'));
    }

    public function update(Request $request, string $id)
    {
        $agenda = Agenda::findOrFail($id);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'nullable|date_format:H:i',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $agenda->update($data);
        return redirect()->route('admin.agendas.index')->with('success', 'Agenda berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();
        return redirect()->route('admin.agendas.index')->with('success', 'Agenda berhasil dihapus');
    }
}
