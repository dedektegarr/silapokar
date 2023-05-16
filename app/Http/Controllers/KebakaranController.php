<?php

namespace App\Http\Controllers;

use App\Models\Kebakaran;
use App\Models\Kerugian;
use App\Models\Keterangan;
use Illuminate\Http\Request;

class KebakaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kebakaran.index', [
            'page_title' => 'Data Kebakaran',
            'data_kebakaran' => Kebakaran::orderByDesc('created_at')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kebakaran.tambah', [
            'page_title' => 'Tambah Data Kebakaran',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'pelapor' => 'required',
            'jenis' => 'required',
            'pemilik' => 'required',
            'wilayah' => 'required',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date',
            'asal_api' => 'required',
            'alamat' => 'required',
            'hasil' => 'required',
            'korban_manusia' => 'required',
            'benda' => 'required',
            'anggota' => 'required',
            'armada' => 'required',
            'respon_time' => 'required',
            'spk_kembali' => 'required'
        ]);

        $stored = Kebakaran::create($validated);
        if ($stored->exists()) {
            $id_kebakaran = $stored->id;

            Kerugian::create([
                'id_kebakaran' => $id_kebakaran,
                'korban_manusia' => $request->korban_manusia,
                'benda' => $request->benda
            ]);

            Keterangan::create([
                'id_kebakaran' => $id_kebakaran,
                'anggota' => $request->anggota,
                'armada' => $request->armada,
                'respon_time' => $request->respon_time,
            ]);

            return redirect()->route('kebakaran.index')->with('success', 'Data kebakaran berhasil ditambah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kebakaran $kebakaran)
    {
        return view('kebakaran.show', [
            'page_title' => 'Data Kebakaran',
            'kebakaran' => $kebakaran
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kebakaran $kebakaran)
    {
        return view('kebakaran.edit', [
            'page_title' => 'Edit Data Kebakaran',
            'kebakaran' => $kebakaran
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kebakaran $kebakaran)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'pelapor' => 'required',
            'jenis' => 'required',
            'pemilik' => 'required',
            'wilayah' => 'required',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date',
            'asal_api' => 'required',
            'alamat' => 'required',
            'hasil' => 'required',
            'korban_manusia' => 'required',
            'benda' => 'required',
            'anggota' => 'required',
            'armada' => 'required',
            'respon_time' => 'required',
            'spk_kembali' => 'required'
        ]);

        $token_method = ['_token', '_method'];
        $kerugian_input = [
            'korban_manusia' => $request->korban_manusia,
            'benda' => $request->benda
        ];
        $keterangan_input = [
            'anggota' => $request->anggota,
            'armada' => $request->armada,
            'respon_time' => $request->respon_time
        ];


        $id_kerugian = $kebakaran->kerugian->id;
        $id_keterangan = $kebakaran->keterangan->id;

        Kebakaran::find($kebakaran->id)->update($request->except(
            array_merge($token_method, $kerugian_input, $keterangan_input)
        ));
        Kerugian::find($id_kerugian)->update($kerugian_input);
        Keterangan::find($id_keterangan)->update($keterangan_input);

        return redirect()->route('kebakaran.index')->with('success', 'Data kebakaran berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kebakaran::find($id)->delete();

        return redirect()->route('kebakaran.index')->with('success', 'Data kebakaran berhasil dihapus');
    }

    public function print(Kebakaran $kebakaran)
    {
        return view('kebakaran.print', [
            'page_title' => 'Data Kebakaran',
            'kebakaran' => $kebakaran
        ]);
    }
}