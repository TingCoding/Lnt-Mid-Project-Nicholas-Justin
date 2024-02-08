<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    function createKaryawan(){
        return view('addKaryawan');
    }

    function createKaryawan1(Request $request){
        $request->validate([
            'Name' => ['required', 'string', 'min:5', 'max:20'],
            'Umur' => ['required', 'integer', 'min:21'],
            'Alamat' => ['required', 'string', 'min:10', 'max:40'],
            'Telp' => ['required', 'string', 'min:9', 'max:12', 'regex:/^08[0-9]{7,10}$/'],
            'Photo' => ['required', 'image']
        ]);

        $filename = $request->file('Photo')->getClientOriginalName();
        $request->file('Photo')->storeAs('/public'.'/'.$filename);

        Karyawan::create([
            'Name' => $request->Name,
            'Umur' => $request->Umur,
            'Alamat' => $request->Alamat,
            'Telp' => $request->Telp,
            'Photo' => $filename
        ]);

        return redirect('/karyawan');
    }

    public function viewKaryawan(){
        $karyawan = Karyawan::all();
        return view('karyawan', compact('karyawan'));
    }

    public function editKaryawan($id){
        $karyawan = Karyawan::findOrFail($id);
        return view('edit', compact('karyawan'));
    }

    public function updateKaryawan(Request $request, $id){
        $request->validate([
            'Name' => ['required', 'string', 'min:5', 'max:20'],
            'Umur' => ['required', 'integer', 'min:21'],
            'Alamat' => ['required', 'string', 'min:10', 'max:40'],
            'Telp' => ['required', 'string', 'min:9', 'max:12', 'regex:/^08[0-9]{7,10}$/'],
            'Photo' => ['required', 'image']
        ]);

        $filename = $request->file('Photo')->getClientOriginalName();
        $request->file('Photo')->storeAs('/public'.'/'.$filename);

        Karyawan::find($id)->update([
            'Name' => $request->Name,
            'Umur' => $request->Umur,
            'Alamat' => $request->Alamat,
            'Telp' => $request->Telp,
            'Photo' => $filename
        ]);

        return redirect('/karyawan');
    }

    public function deleteKaryawan($id){
        $karyawan = Karyawan::find($id);
        Karyawan::destroy($id);
        Storage::delete('/public'.'/'.$karyawan->Photo);
        return redirect('/karyawan');
    }
}