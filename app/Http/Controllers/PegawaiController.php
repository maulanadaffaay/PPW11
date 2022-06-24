<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Pegawai;


class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $pegawais = Pegawai::all();
        return view ('main', compact('pegawais'));
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
        $rules = [
            'Nama' => 'required',
            'No_HP' => 'required',
            'Alamat' => 'required',
            'Gender' => 'required',
            'foto' => 'image|file|max:2024'
        ];

        // return $request->file('foto')->store('post-img');
    
        $validatedRequest = $request->validate($rules);

        if($request->file('foto')){
            $validatedRequest['foto'] = $request->file('foto')->store('post-img');
        }

        Pegawai::create($validatedRequest);

        return redirect(route('main'))->with('success_create', 'Data has been added succesfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        return view('edit', ['pegawai' => $pegawai
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {   
        $rules = [
            'Nama' => 'required',
            'No_HP' => 'required',
            'Alamat' => 'required',
            'Gender' => 'required',
            'foto' => 'image|file|max:2024'
        ];
        $validatedRequest = $request->validate($rules);

        if($request->file('foto')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedRequest['foto'] = $request->file('foto')->store('post-img');
        }

        Pegawai::where('id', $pegawai->id)->update($validatedRequest);

        return redirect (route ('main'))->with('success_edit', 'Data has been edited succesfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        if($pegawai->foto){
            Storage::delete($pegawai->foto);
        }
        $pegawai->delete();
        return redirect (route('main'))->with('success_remove', 'Data has been removed succesfully!');
    }
}

