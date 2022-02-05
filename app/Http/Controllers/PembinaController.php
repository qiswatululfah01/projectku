<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pembina;

class PembinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembina = Pembina::all();
        return view('pages.admin.pembina.index',[
            'pembina' => $pembina
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Pembina;
        return view('pages.admin.pembina.create', compact(
            'model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // @dd($request);
        // $validatedData = $request->validate([
        //     'kode_pembina' => 'required',
        //     'nama_pembina' => 'required',
        //     'nta' => 'required',
        //     'tempat_lahir' => 'required',
        //     'tanggal_lahir' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'alamat' => 'required',
        //     'tlp' => 'required',
        //     'agama' => 'required',
        //     'golongan' => 'required',
        //     'jabatan' => 'required',
        //     'pangkalan' => 'required',
        //     'foto' => 'image|mimes:png,jpg|max:5000'
        // ]);
        // $file_berkas = $request->file('files')->getClientOriginalExtension();
        // Storage::putFileAs('public/pictures/', $validatedData->file('images'));
        // Admin::create($validatedData);

        // return redirect('pembina');

        $model = new Pembina;
        $model->kode_pembina = $request->kode_pembina;
        $model->nama_pembina = $request->nama_pembina;
        $model->nta = $request->nta;
        $model->tempat_lahir = $request->tempat_lahir;
        $model->tanggal_lahir = $request->tanggal_lahir;
        $model->jenis_kelamin = $request->jenis_kelamin;
        $model->alamat = $request->alamat;
        $model->tlp = $request->tlp;
        $model->agama = $request->agama;
        $model->golongan = $request->golongan;
        $model->jabatan = $request->jabatan;
        $model->pangkalan = $request->pangkalan;
        // $model->foto = $request->foto;
        $model->save();


        return redirect('pembina');

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
