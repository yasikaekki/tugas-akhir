<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use DB;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $judul = 'Anggota KIBT';
        $no = 1;
        $user = User::all();
        $authuser = Auth::user();

        return view('anggota.index', compact('judul', 'no', 'user', 'authuser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $judul = 'Registrasi Anggota KIBT';
        $uid = Auth::id();
        $anggota = User::find($uid);

        return view('anggota.create', compact('judul','anggota'));
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
            'nama_lengkap'=> 'required',
            'gelar' => 'required',
            'jabatan' => 'required',
            'nip' => 'required',
            'status' => 'required',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|same:password_konfirmasi',
            'password_konfirmasi'=> 'required',
        ]);

        $user=new User();
        $user->name=$request->nama_lengkap;
        $user->gelar=$request->gelar;
        $user->jabatan=$request->jabatan;
        $user->nip=$request->nip;
        $user->tempat_lahir=$request->tempat_lahir;
        $user->tanggal_lahir=$request->tanggal_lahir;
        $user->jenis_kelamin=$request->jenis_kelamin;
        $user->telepon=$request->telepon;
        $user->status=$request->status;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->created_at=\Carbon\Carbon::now();
        $user->email_verified_at=\Carbon\Carbon::now();
        $user->save();

        return redirect()->route('anggota.index')->with('sukses', 'Akun'. $user->name .'berhasil dibuat');
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
        $judul = 'Ubah Akun';
        $anggota = User::find($id);

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
        $user->name=$request->nama_lengkap;
        $user->email=$request->email;
        $user->gelar=$request->gelar;
        $user->jabatan=$request->jabatan;
        $user->nip=$request->nip;
        $user->tempat_lahir=$request->tempat_lahir;
        $user->tanggal_lahir=$request->tanggal_lahir;
        $user->jenis_kelamin=$request->jenis_kelamin;
        $user->telepon=$request->telepon;
        $user->status=$request->status;
        $user->password=Hash::make($request->password);
        $user->updated_at=\Carbon\Carbon::now();
        $user->save();

        return redirect()->route('anggota.index')->with('sukses', 'Akun'. $user->name .'berhasil diubah');
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
        return back()->with('hapus', 'Akun "'.$user->name.'" berhasil dihapus');
    }
}
