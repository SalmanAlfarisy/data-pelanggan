<?php

namespace App\Http\Controllers;

use App\Http\Requests\PelangganCreateRequest;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        //Igger Loading
        $pelanggan = Pelanggan::where('name', 'LIKE', '%' . $keyword . '%')
                                 ->orWhere('nik', 'LIKE', '%' . $keyword . '%')
                                ->paginate(15);
        return view('pelanggan', ['pelanggan' => $pelanggan]);

    }

    public function show($id)
    {
        $pelanggan = Pelanggan::with('merkMobil','typeMobil')->findOrFail($id);
        return view('pelanggan-detail', ['pelanggan' => $pelanggan]);
    }

    public function create()
    {
        return view('pelanggan-create');
    }

    public function store(PelangganCreateRequest $request)
    {

        $newName = '';
        $newName2 = '';
        $newName3 = '';
        $newName4 = '';

        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name . '-NPWP-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('photo NPWP', $newName);
        }

        $request['img_npwp'] = $newName;

        if ($request->file('photo2')) {
            $extension = $request->file('photo2')->getClientOriginalExtension();
            $newName2 = $request->name . '-KTP-' . now()->timestamp . '.' . $extension;
            $request->file('photo2')->storeAs('photo KTP', $newName2);
        }

        $request['img_ktp'] = $newName2;

        if ($request->file('photo3')) {
            $extension = $request->file('photo3')->getClientOriginalExtension();
            $newName3 = $request->name . '-KK-' . now()->timestamp . '.' . $extension;
            $request->file('photo3')->storeAs('photo KK', $newName3);
        }

        $request['img_kk'] = $newName3;

        if ($request->file('photo4')) {
            $extension = $request->file('photo4')->getClientOriginalExtension();
            $newName4 = $request->name . '-KK-' . now()->timestamp . '.' . $extension;
            $request->file('photo4')->storeAs('photo buku nikah', $newName4);
        }

        $request['buku_nikah'] = $newName4;

        $pelanggan = Pelanggan::create($request->all());

        if ($pelanggan) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Pelanggan Sukses!');
        }

        return redirect('/pelanggan');
    }

    public function simpan(PelangganCreateRequest $request)
    {

        $newName = '';
        $newName2 = '';
        $newName3 = '';
        $newName4 = '';

        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name . '-NPWP-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('photo KTP', $newName);
        }

        $request['img_ktp'] = $newName;

        if ($request->file('photo2')) {
            $extension = $request->file('photo2')->getClientOriginalExtension();
            $newName2 = $request->name . '-KTP-' . now()->timestamp . '.' . $extension;
            $request->file('photo2')->storeAs('photo NPWP', $newName2);
        }

        $request['img_npwp'] = $newName2;

        if ($request->file('photo3')) {
            $extension = $request->file('photo3')->getClientOriginalExtension();
            $newName3 = $request->name . '-KK-' . now()->timestamp . '.' . $extension;
            $request->file('photo3')->storeAs('photo KK', $newName3);
        }

        $request['img_kk'] = $newName3;

        if ($request->file('photo4')) {
            $extension = $request->file('photo4')->getClientOriginalExtension();
            $newName4 = $request->name . '-KK-' . now()->timestamp . '.' . $extension;
            $request->file('photo4')->storeAs('photo buku nikah', $newName4);
        }

        $request['buku_nikah'] = $newName4;

        $pelanggan = Pelanggan::create($request->all());

        if ($pelanggan) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data Berhasil Dikirim!');
        }

        return redirect('/');
    }

    public function edit(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan-edit', ['pelanggan' => $pelanggan]);
    }

    public function update(Request $request,$id)
    {

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($request->all());

        if ($pelanggan) {
            Session::flash('status', 'success');
            Session::flash('message', 'Update Pelanggan Sukses!');
        }

        return redirect('/pelanggan');
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);

        if (!$pelanggan) {
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        }

        // Hapus file gambar dari storage jika ada
        if ($pelanggan->img_pwp) {
            Storage::delete('public/photo NPWP/' . $pelanggan->img_pwp);
        }

        if ($pelanggan->img_ktp) {
            Storage::delete('public/photo KTP/' . $pelanggan->img_ktp);
        }

        if ($pelanggan->img_kk) {
            Storage::delete('public/photo KK/' . $pelanggan->img_kk);
        }

        if ($pelanggan->buku_nikah) {
            Storage::delete('public/photo buku nikah/' . $pelanggan->buku_nikah);
        }

        // Hapus data pelanggan dari database
        $pelanggan->delete();

        if ($pelanggan) {
            Session::flash('status', 'success');
            Session::flash('message', 'Berhasil Menghapus Pelanggan!');
        }

        return redirect('/pelanggan');
    }

    public function deletedPelanggan()
    {
        $deletedPelanggan = Pelanggan::onlyTrashed()->get();
        return view('Pelanggan-deleted-list', ['Pelanggan' => $deletedPelanggan]);
    }

    public function restore($id)
    {
        $deletedPelanggan = Pelanggan::withTrashed()->where('id', $id)->restore();
        return redirect('/pelanggan');
    }
}
