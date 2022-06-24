<?php

namespace App\Http\Controllers\Users;

use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\LaporanSurat;
use App\Model\SuratPembuka;
use App\Model\SuratPenutup;
use App\Model\TubuhSurat;
use App\User;
use Auth;
use Hash;
use PDF;
use DB;

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
        $user = User::all();
        $authuser = Auth::user();

        if($request->fitur_cari){
            $user=  DB::table('users')->where('name','like','%'.$request->fitur_cari.'%')
            ->orWhere('gelar','like','%'.$request->fitur_cari.'%')
            ->orWhere('jabatan','like','%'.$request->fitur_cari.'%')
            ->orderBy('created_at','desc')
            ->paginate(5);
        } 

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
        $judul = 'Registrasi Akun Anggota';
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
        $user->konfigurasi_kop_surat_id = $user->id;
        // $user->email=$request->email;
        $user->jabatan=$request->jabatan;
        $user->nip=$request->nip;
        $user->no_nip=$request->no_nip;
        // $user->tempat_lahir=$request->tempat_lahir;
        // $user->tanggal_lahir=$request->tanggal_lahir;
        // $user->jenis_kelamin=$request->jenis_kelamin;
        $user->telepon=$request->telepon;
        $user->status=$request->status;
        // $user->password=Hash::make($request->password);
        $user->created_at=\Carbon\Carbon::now();
        // $user->email_verified_at=\Carbon\Carbon::now();
        $user->save();

        $nomor = new LaporanSurat();
        $nomor->user_id = $user->id;
        $nomor->created_at=\Carbon\Carbon::now();
        $nomor->save();

        $pembuka = new SuratPembuka();
        $pembuka->user_id = $user->id;
        $pembuka->created_at=\Carbon\Carbon::now();
        $pembuka->save();

        $tubuh = new TubuhSurat();
        $tubuh->user_id = $user->id;
        $tubuh->created_at=\Carbon\Carbon::now();
        $tubuh->save();

        $penutup = new SuratPenutup();
        $penutup->user_id = $user->id;
        $penutup->created_at=\Carbon\Carbon::now();
        $penutup->save();

        return redirect()->route('anggota.index')->with('sukses', 'Akun '. $user->name .' berhasil dibuat');
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
        // $this->validate($request,[
        //     'no_nip' => 'required|min:12',
        // ]);

        $user=User::find($id);
        $user->name=$request->name;
        $user->gelar=$request->gelar;
        // $user->email=$request->email;
        $user->jabatan=$request->jabatan;
        $user->nip=$request->nip;
        $user->no_nip=$request->no_nip;
        // $user->tempat_lahir=$request->tempat_lahir;
        // $user->tanggal_lahir=$request->tanggal_lahir;
        // $user->jenis_kelamin=$request->jenis_kelamin;
        $user->telepon=$request->telepon;
        $user->status=$request->status;
        $user->updated_at=\Carbon\Carbon::now();
        $user->save();

        return redirect()->route('anggota.index')->with('sukses', 'Akun '. $user->name .' berhasil diubah');
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
        return back()->with('hapus', 'Akun '.$user->name.' berhasil dihapus');
    }
}
