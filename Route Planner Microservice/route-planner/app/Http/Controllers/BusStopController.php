<?php

namespace App\Http\Controllers;

use App\Models\bus_stop;
use Illuminate\Http\Request;

class BusStopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = bus_stop::orderby('bus_stop_name', 'asc')->paginate(10);
        return view('bus_stop.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bus_stop.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bus_stop_name' => 'required|string',
        ]);
        try {
            bus_stop::create([
                'bus_stop_name' => $request->bus_stop_name,
            ]);
            return redirect()->route('bus-stop.index')->with(['success' => 'Berhasil nambah data!']);
        } catch (\Throwable $th) {
            return redirect()->route('bus-stop.create')->with(['fail' => 'Gagal menambah data '.$th]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(bus_stop $bus_stop)
    {
        return view('bus-stop.show', compact('bus_stop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bus_stop $bus_stop)
    {
        return view('bus-stop.edit', compact('bus_stop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bus_stop $bus_stop)
    {
        $request->validate([
            'bus_stop_name' => 'required|string',
        ]);
        try {
            $bus_stop->update([
                'bus_stop_name' => $request->bus_stop_name,
            ]);
            return redirect()->route('bus-stop.index')->with(['success' => 'Berhasil update data!']);
        } catch (\Throwable $th) {
            return redirect()->route('bus-stop.edit', $bus_stop)->with(['fail' => 'Gagal menambah data '.$th]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bus_stop $bus_stop)
    {
        $bus_stop->delete();
        return redirect()->route('bus-stop.index')->with(['success' => 'Berhasil menghapus data']);
    }
}
