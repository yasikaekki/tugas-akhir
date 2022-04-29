<?php

namespace App\Http\Controllers\Users;

use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $judul = 'Akun';
        $uid = Auth::id();
        $akun = User::find($uid);

        return view('profil.index', compact('judul', 'akun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('errors.404');
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
        $akun = User::find($data);

        if ($akun->jenis_kelamin == null || $akun->tempat_lahir == null || $akun->tanggal_lahir == null || $akun->telepon == null) {
            
            $judul = 'Lengkapi Akun';

        } else {
                      
            $judul = 'Perbarui Akun';
        }
        

        return view('profil.edit', compact('judul', 'akun'));
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
        // $user->lokasi_foto=$request->lokasi_foto;
        // $user->lokasi_ttd=$request->lokasi_ttd;
        $user->name=$request->name;
        $user->gelar=$request->gelar;
        $user->tempat_lahir=$request->tempat_lahir;
        $user->tanggal_lahir=$request->tanggal_lahir;
        $user->jenis_kelamin=$request->jenis_kelamin;
        $user->telepon=$request->telepon;

        if ($user->jenis_kelamin == null || $user->tempat_lahir == null || $user->tanggal_lahir == null || $user->telepon == null) {
           
            $user->created_at=\Carbon\Carbon::now();
            $user->save();

            return redirect()->route('profil.index')->with('sukses', 'Akun '. $user->name .' berhasil dilengkapi');

        } else {
            
            $user->updated_at=\Carbon\Carbon::now();
            $user->save();

            return redirect()->route('profil.index')->with('sukses', 'Akun '. $user->name .' berhasil diperbarui');

        }
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
    }
}
