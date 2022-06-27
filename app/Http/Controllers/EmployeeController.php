<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request){
        if($request->has('searchData')){
            $data = employee::where('nama','LIKE','%'.$request -> searchData.'%')->paginate(5);
        }else{
            $data = employee::paginate(5);    
        }

        return view('datapegawai' , compact('data'));


    }

    public function tambahpegawai(){
        return view('tambahdata');
    }

    public function insertdata(Request $request){
        // dd($request->all());
        $data = employee::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotopegawai/',$request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName() ;
            $data->save();
        }
        return redirect()->route('pegawai') ->with('success','data telah berhasil ditambahkan');
    }

    public function tampilkandata ($id){
       $data = employee::find($id);
    //    dd($data) ;
    return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request,$id){
        $data = employee::find($id);
        $data->update($request ->all());
        return redirect()->route('pegawai') ->with('success','data telah berhasil diperbarui');

    }

    public function deletedata($id){
        $data = employee::find($id);
        $data->delete();
        return redirect()->route('pegawai') ->with('success','data telah berhasil dihapus');
    }
}
