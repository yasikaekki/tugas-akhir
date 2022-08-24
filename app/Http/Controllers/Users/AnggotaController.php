<?php

namespace App\Http\Controllers\Users;

use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $judul = 'Anggota';
        $no = 1;
        $user = User::paginate(6);

        if($request->fitur_cari){
            $user=  User::where('name','like','%'.$request->fitur_cari.'%')
            ->orWhere('gelar','like','%'.$request->fitur_cari.'%')
            ->orWhere('jabatan','like','%'.$request->fitur_cari.'%')
            ->paginate(6);
        } 

        return view('anggota.index', compact('judul', 'no', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $judul = 'Registrasi Akun Anggota';

        return view('anggota.create', compact('judul'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name'=> 'required',
            'gelar'=> 'required',
            'jabatan' => 'required',
            'nip' => 'required',
            'no_nip' => 'required|max:14',
            'telepon' => 'required|max:14',
            'status' => 'required',
        ],
        [
            'name.required'=>'Nama Lengkap harus diisi',
            'gelar.required'=>'Gelar harus diisi',
            'jabatan.required'=>'Jabatan harus diisi',
            'nip.required'=>'Kolom ini harus diisi',
            'no_nip.required'=>'Kolom ini harus diisi',
            'telepon.required'=>'Telepon harus diisi',
            'status.required'=>'Kolom ini harus diisi',
        ]
    );

        $user=new User();
        $user->name=$request->name;
        $user->gelar=$request->gelar;
        $user->jabatan=$request->jabatan;
        $user->nip=$request->nip;
        $user->no_nip=$request->no_nip;
        $user->telepon=$request->telepon;
        $user->status=$request->status;
        $user->created_at=\Carbon\Carbon::now();
        $user->save();

        return redirect()->route('anggota-upt-kibt-poliwangi.index')->with('sukses', 'Anggota dengan nama '. $user->name .' berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('errors.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Crypt::decrypt($id);
        $judul = 'Ubah Akun Anggota';
        $anggota = User::find($data);

        return view('anggota.edit', compact('judul', 'anggota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user=User::find($id);
        $user->name=$request->name;
        $user->gelar=$request->gelar;
        $user->jabatan=$request->jabatan;
        $user->nip=$request->nip;
        $user->no_nip=$request->no_nip;
        $user->telepon=$request->telepon;
        if ($user->jabatan != "Admin") {
            $user->status=$request->status;
        }
        $user->updated_at=\Carbon\Carbon::now();
        $user->save();

        return redirect()->route('anggota-upt-kibt-poliwangi.index')->with('sukses', 'Anggota dengan nama '. $user->name .' berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return back()->with('hapus', 'Anggota dengan nama '. $user->name .' berhasil dihapus');
    }
}
