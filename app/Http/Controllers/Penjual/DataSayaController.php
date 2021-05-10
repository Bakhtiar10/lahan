<?php

namespace App\Http\Controllers\Penjual;

use App\Lahan;
use App\Image;
use App\Http\Controllers\Controller;
use Auth;
use Storage;
use App\Post;
use App\Comment;

use Illuminate\Http\Request;

class DataSayaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $lahan = Lahan::where('id_penjual', Auth::user()->id)->where('status_jual',0)->get();
        
        return view('penjual.datasaya.datasaya', compact('lahan'));
    }

    public function detail($lahan)
    {
        $lahan = Lahan::with(['comments', 'comments.child'])->where('id', $lahan)->first();
        return view('penjual.datasaya.detail', compact('lahan'));
    }

    public function create()
    {
        return view('penjual.datasaya.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'judul_lahan'  => 'required|unique:lahan',
            'luas_lahan'   => 'required|integer',
            'harga_lahan'  => 'required',
            'sertifikat'   => 'required',
            'no_hp'        => 'required',
            'jenis_lahan'  => 'required',
            'alamat'       => 'required',
            'foto'         => 'required',
            'deskripsi'    => 'required',
            'latitude'     => 'required',
            'longitude'    => 'required',
        ];

        $message = [
            'integer' => 'Form :attribute harus berupa angka',
            'required' => 'Form :attribute tidak boleh kosong',
            'unique' => 'Form :attribute sudah ada'  
        ];

        $this->validate($request, $rules, $message);

        $foto = $request->file('foto')->store('gambar');

        $harga_lahan = (int)str_replace(".","", $request->harga_lahan);

        $lahan = Lahan::create([
            'id_penjual'   => Auth::user()->id,
            'judul_lahan'  => $request->judul_lahan,
            'luas_lahan'   => $request->luas_lahan,
            'harga_lahan'  => $harga_lahan,
            'sertifikat'   => $request->sertifikat,
            'no_hp'        => $request->no_hp,
            'jenis_lahan'  => $request->jenis_lahan,
            'alamat'       => $request->alamat,
            'deskripsi'    => $request->deskripsi,
            'latitude'     => $request->latitude,
            'longitude'    => $request->longitude,
        ]);

        Image::create([
            'id_lahan' => $lahan->id,
            'foto' => $foto
        ]);

        return redirect()->route('datasaya')->with('message', 'Berhasil Menambahkan Data!');
    }

    public function edit($id)
    {
        $data = Lahan::find($id);
        $harga_lahan = number_format($data->harga_lahan,0,"",".");
        
        return view('penjual.datasaya.edit', compact('data','harga_lahan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_lahan'  => 'required',
            'luas_lahan'   => 'required',
            'harga_lahan'  => 'required',
            'sertifikat'   => 'required',
            'no_hp'        => 'required',
            'jenis_lahan'  => 'required',
            'alamat'       => 'required',
            'deskripsi'    => 'required',
            'latitude'     => 'required',
            'longitude'    => 'required',
        ]);

        $lahan = Lahan::find($id);

        $foto = $lahan->foto;

        $harga_lahan = (int)str_replace(".","", $request->harga_lahan);

        if($request->foto){
            $foto = $request->file('foto')->store('gambar');
            $foto_path = $lahan->foto;
            if(Storage::exists($foto_path)){
                Storage::delete($foto_path);
            }
        }

        $data = [
            'judul_lahan'  => $request->judul_lahan,
            'luas_lahan'   => $request->luas_lahan,
            'harga_lahan'  => $harga_lahan,
            'sertifikat'   => $request->sertifikat,
            'no_hp'        => $request->no_hp,
            'jenis_lahan'  => $request->jenis_lahan,
            'alamat'       => $request->alamat,
            'deskripsi'    => $request->deskripsi,
            'latitude'     => $request->latitude,
            'longitude'    => $request->longitude,
        ];

        $lahan->update($data);

        return redirect()->route('datasaya')->with('message', 'Data Berhasil Di Update!');

    }

    public function destroy($id)
    {
        $data = Lahan::findOrFail($id);
        // dd($id);
        $foto = $data->foto;

        if(Storage::exists($foto)){
            Storage::delete($foto);
        }
        $data->delete();

        return redirect()->route('datasaya')->with('message', 'Data Berhasil Di hapus!');
    }

    public function add_image(Request $request){
        $foto = $request->file('foto')->store('gambar');
        Image::create([
            'id_lahan' => $request->id_lahan,
            'foto' => $foto
        ]);

        return redirect()->back();

    }

    public function comment(Request $request)
    {
        //VALIDASI DATA YANG DITERIMA
        $this->validate($request, [
            'email' => 'required',
            'comment' => 'required'
        ]);

        Comment::create([
            'id_lahan' => $request->id,
            //JIKA PARENT ID TIDAK KOSONG, MAKA AKAN DISIMPAN IDNYA, SELAIN ITU NULL
            'parent_id' => $request->parent_id != '' ? $request->parent_id:NULL,
            'email' => $request->email,
            'comment' => $request->comment
        ]);
        return redirect()->back()->with(['success' => 'Komentar Ditambahkan']);
    }
}
