<?php

namespace App\Http\Controllers;

use App\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = siswa::latest()->get();
        return view('list', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['nis'=>'unique:siswas'];
        $costume = ['nis.unique'=>'Nis Must Be Unique!'];
        $this->validate($request, $rules, $costume);

        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $name = "siswa".time().'.'.$foto->
                    getClientOriginalExtension();
            $folder = public_path('upload');

            if($foto->move($folder,$name)){
                siswa::create([
                    'nis'=> $request->nis,
                    'nama'=> $request->nama,
                    'foto'=> $name,
                ]);

                session::flash('success', 'Upload File Berhasil');
                return redirect('siswa');
            }else{
                session:flash('error', 'Upload File Gagal');
                return back();
            } 
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(siswa $siswa)
    {
        $data = siswa::where('id', $siswa->id)->first();   
        return view('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, siswa $siswa)
    {
        $rules = ['nis'=>'unique:siswas'];
        $costume = ['nis.unique'=>'Nis Must Be Unique!'];
        $this->validate($request, $rules, $costume);
        
        $foto = $siswa->foto;
        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $name = "siswa".time().'.'.$foto->
                    getClientOriginalExtension();
            $folder = public_path('upload');
            $foto->move($folder, $name);
            $foto = $name;
        }
        siswa::where('id', $siswa->id)->update([
            'nis'=> $request->nis,
            'nama'=> $request->nama,
            'foto'=> $name,
        ]);
        session::flash('success', 'Upload File Berhasil');
        return redirect('siswa');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(siswa $siswa)
    {
        siswa::destroy($siswa->id);
        return back();
    }
}
