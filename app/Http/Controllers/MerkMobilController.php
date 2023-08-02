<?php

namespace App\Http\Controllers;

use App\Models\MerkMobil;
use App\Models\TypeMobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class MerkMobilController extends Controller
{
    public function index()
    {
        $merk = MerkMobil::get();
        return view('merk-mobil', ['merkMobils' => $merk]);
    }

    public function tambahForm()
    {
        return view('merk-mobil-tambah');
    }

    public function tambah(Request $request)
    {
        $merk = new MerkMobil;
        $merk->create($request->all());

        if ($merk) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Merk Sukses!');
        }

        return redirect('/merk-mobil');
    }

    public function hapus($id)
    {
        // Hapus data merk mobil dari database
        $merk = MerkMobil::destroy($id);

        if ($merk) {
            Session::flash('status', 'success');
            Session::flash('message', 'Delete Merk Sukses!');
        }

        return redirect('/merk-mobil');
    }

    public function merk()
    {
        $data = MerkMobil::where('nama_merk','Like','%'.request('q').'%')->paginate(10);

        return response()->json($data);
    }
    public function type($id)
    {
        $data = TypeMobil::where('merk_id',$id)->where('type_mobil','Like','%'.request('q').'%')->paginate(10);

        return response()->json($data);
    }
}
