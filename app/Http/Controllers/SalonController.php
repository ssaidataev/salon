<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use Illuminate\Http\Request;

class SalonController extends Controller
{
    public function index()
    {
        $salons = Salon::all();
        return view('salons.index', compact('salons'));
    }

    public function create()
    {
        return view('salons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'hours' => 'required|string|max:255',
        ]);

        Salon::create($request->all());

        return redirect()->route('salons.index')
            ->with('success', 'Salon created successfully.');
    }

    public function edit(Salon $salon)
    {
        return view('salons.edit', compact('salon'));
    }

    public function update(Request $request, Salon $salon)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'hours' => 'required|string|max:255',
        ]);

        $salon->update($request->all());

        return redirect()->route('salons.index')
            ->with('success', 'Salon updated successfully.');
    }

    public function destroy(Salon $salon)
    {
        $salon->delete();

        return redirect()->route('salons.index')
            ->with('success', 'Salon deleted successfully.');
    }
}
