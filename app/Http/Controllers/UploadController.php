<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
class UploadController extends Controller
{

    public function proccessEdit(Request $request){
        $id = $request -> input("idBarang");
        $nama = $request -> input("namaBarang");
        $harga = $request -> input("hargaBarang");
        $stok = $request -> input("stokBarang");
        DB::table("barang") -> where("id_barang","=",$id) -> update([
            "nama" => $nama,
            "harga" => $harga,
            "stok" => $stok
        ]);
        return redirect("/admin/edit") -> with("sukses","Berhasil!");
    }

    public function getData(Request $request){
        $data = DB::table("barang") -> where("nama","=",$request -> name) -> get();
        return redirect()->route( 'edit' )->with( [ 'barang' => $data ] ); 
        
    }

    public function edit(){
        $data = DB::table("barang") -> get();
        return view("admin/edit",["data" => $data]);
    }

    public function send($id){
        DB::table("transaksi") -> where("id","=",$id) -> update([
            "status" => "Telah Dikirimkan"
        ]);
        return redirect("/admin");
    }

    public function ProccessCheckout(Request $request){
        $nama = $request -> input("nama");
        $biaya = $request -> input("biaya"); 
        $alamat = $request -> input("alamat"); 
        $idUser = $request -> input("id_user");
        $date = date("Y-m-d");
        $file = $request->file("buktiPembayaran");
        $fileName = $file -> getClientOriginalName();
        $fileName = date("His").$idUser.".jpg";
        $file -> move("bukti_transaksi/",$fileName);
        $dump = DB::table("cart") -> where("id_user","=",$idUser) -> get();
        $barang = "";
        foreach($dump as $brg){
            $barang = $barang.$brg -> nama_barang.",";
        }
        DB::table("transaksi") -> insert([
            "nama_pembeli" => $nama,
            "id_pembeli" => $idUser,
            "biaya" => $biaya,
            "alamat" => $alamat,
            "tanggal" => $date,
            "barang" => $barang,
            "bukti_pembayaran" => $fileName,
            "status" => "Belum dikirim"
        ]);
        $data = DB::table("cart") -> where("id_user","=",$idUser) -> get();
        foreach($data as $db){
            $idBarang = $db -> id_barang;
            $stok = DB::table("barang") -> select("stok") -> where("id_barang","=",$idBarang) -> first();
            // $stok = (int)$stok;
            // dd($stok);
            DB::table("barang") -> where("id_barang","=",$idBarang) -> update([
                "stok" => $stok -> stok -1
            ]);
        }
        DB::table("cart") ->where("id_user","=",$idUser) -> delete();
        return redirect("/user/{$idUser}/dashboard/");
    }

    public function deleteCart($id_user,$id){
        DB::table('cart') -> delete($id);
        return redirect("/user/viewcart/{$id_user}");

    }

    public function addToCart($idUser,$idBarang){
        $barang = DB::table("barang") -> where("id_barang","=",$idBarang) -> get();
        foreach($barang as $brg){
            $id_barang = $brg -> id_barang;
            $nama_barang = $brg -> nama;
            $harga_barang = $brg -> harga;
        }
        DB::table("cart") -> insert([
            "id_user" => $idUser,
            "nama_barang" => $nama_barang,
            "id_barang" => $id_barang,
            "harga_barang" =>$harga_barang
        ]);
        
        return redirect("user/{$idUser}/dashboard/");
    }

    public function insertKategori(Request $request){
        DB::table("list_kategori") -> insert([
            'kategori' => $request -> input("namaKategori")
        ]);
        return redirect("/admin/tambah_kategori") -> with("insert","Berhasil Menambah Kategori"); 
    }

    public function deleteKategori($id){
        DB::table('list_kategori') -> delete($id);
        return redirect("/admin/tambah_kategori") -> with("delete","Berhasil Menghapus Kategori");

    }

    public function process(Request $request){
        $nama = $request->input("namaBarang");
        $kategori = $request->input("kategoriBarang");
        $stok = $request -> input("stokBarang");
        $harga = $request->input("hargaBarang") ;
        $file = $request->file("fotoBarang");
        $fileName = $file -> getClientOriginalName();
        $fileName = $fileName.date("His").".jpg";
        $image_resize = Image::make($file->getRealPath());
        $image_resize -> resize(200,200);
        $image_resize -> save(public_path("barang/".$fileName));
        #$file -> move($lokasi,$file -> getClientOriginalName());
        DB::table("barang") -> insert([
            'nama' => $nama,
            'kategori' => $kategori,
            'stok' => $stok,
            'harga' => $harga,
            'gambar' => $fileName
        ]);
        return redirect("/admin/tambah") -> with("sukses","Berhasil Menambahkan Barang");
    }
}
