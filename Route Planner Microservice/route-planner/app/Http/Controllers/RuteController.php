<?php

namespace App\Http\Controllers;

use App\Models\bus_stop;
use App\Models\rute;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = rute::orderby('id', 'asc')->paginate(10);
        return view('rute.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bis_datas = bus_stop::orderby('bus_stop_name', 'asc')->get();
        return view('rute.create', compact('bis_datas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'stop_1' => 'required|string',
            'stop_2' => 'required|string',
            'distance' => 'required|numeric',
        ]);
        if ($request->stop_1 == $request->stop_2) {
            return redirect()->route('rute.create')->with(['fail' => 'Halte 1 dan Halte 2 tidak boleh sama']);
        }
        try {
            rute::create([
                'stop_1' => $request->stop_1,
                'stop_2' => $request->stop_2,
                'distance' => $request->distance,
            ]);
            return redirect()->route('rute.index')->with(['success' => 'Berhasil nambah data!']);
        } catch (\Throwable $th) {
            return redirect()->route('rute.create')->with(['fail' => 'Gagal menambah data '.$th]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(rute $rute)
    {
        return view('rute.show', compact('rute'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rute $rute)
    {
        return view('rute.edit', compact('rute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rute $rute)
    {
        $request->validate([
            'stop_1' => 'required|string',
            'stop_2' => 'required|string',
            'distance' => 'required|numeric',
        ]);
        try {
            $rute->update([
                'stop_1' => $request->stop_1,
                'stop_2' => $request->stop_2,
                'distance' => $request->distance,
            ]);
            return redirect()->route('rute.index')->with(['success' => 'Berhasil update data!']);
        } catch (\Throwable $th) {
            return redirect()->route('rute.edit', $rute)->with(['fail' => 'Gagal menambah data '.$th]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rute $rute)
    {
        $rute->delete();
        return redirect()->route('rute.index')->with(['success' => 'Berhasil menghapus data']);
    }
}
