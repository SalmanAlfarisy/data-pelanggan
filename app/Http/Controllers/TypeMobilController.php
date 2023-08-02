<?php

namespace App\Http\Controllers;

use App\Models\TypeMobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class TypeMobilController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        //Igger Loading
        $typeMobils = TypeMobil::with('merkMobil')
                                ->where('type_mobil', 'LIKE', '%' . $keyword . '%')
                                ->paginate(15);

        return view('type-mobil-index', ['typeMobils' => $typeMobils]);
    }

    public function tambahForm()
    {
        $merkMobils = DB::table('merk_mobils')->get();

        return view('type-mobil-tambah', ['merkMobils' => $merkMobils]);
    }

    public function tambah(Request $request)
    {
        $Type = new TypeMobil;
        $Type->create($request->all());

        if ($Type) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Type Sukses!');
        }

        return redirect('/type-mobil');
    }

    public function hapus($id)
    {
        // Hapus data type mobil dari database
        $Type = TypeMobil::destroy($id);

        if ($Type) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data type mobil berhasil dihapus.');
        }

        return redirect('/type-mobil');
    }
}
