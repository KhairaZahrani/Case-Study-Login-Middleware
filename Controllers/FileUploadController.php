<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    // public function fileUpload()
    // {
    //     return view('file-upload');
    // }

    // public function prosesFileUpload(Request $request)
    // {

    //     $request->validate([
    //         'berkas' => ['required','file','image','max:5000'],
    //     ]);

    //     $extFile = $request->berkas->getClientOriginalExtension();
    //     $namaFile = 'lisa-'.time().".".$extFile;

    //     $path = $request->berkas->move('image',$namaFile);
    //     $path = str_replace('\\', '/', $path);
    //     echo "Variabel path berisi: $path <br>";

    //     $pathBaru = asset('image/'.$namaFile);
    //     echo "Proses upload berhasil, file berada di:
    //     <a href='$pathBaru'>$pathBaru</a>";

    // }

    // MIni Case Study
    public function fileUploadRename() {
       return view('file-upload-rename');
   }  

   public function prosesFileUploadRename(Request $request){
     $request->validate([
         'nama_gambar' => 'required|min:5|alpha_dash',
         'gambar_profile'  => 'required|file|image|max:1000',
     ]);
     
      // ambil nama extension file asal
     $extFile = $request->gambar_profile->getClientOriginalExtension();
      // generate nama file akhir, diambil dari inputan nama_gambar + extension
     $namaFile = $request->nama_gambar.".".$extFile;
      // pindahkan file upload ke folder storage/app/public/gambar/
     $request->gambar_profile->storeAs('public/gambar',$namaFile);

      // generate path gambar yang bisa diakses (path di folder public)
     $pathPublic = asset('storage/gambar/'.$namaFile);
     
     echo "Gambar berhasil di upload ke <a href=".$pathPublic.">$namaFile</a>";
     echo "<br><br>";
     echo "<img src=".$pathPublic." width='200px'>";
 } 



}