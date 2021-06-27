<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    
    
    public function laporan(){
        $data = DB::table("transaksi") -> where("status","=","Telah Dikirimkan") -> groupBy("tanggal") -> get();
        // dd($data);
        return view("admin/laporan") -> with(["date" => $data]);
    }

    public function viewPesanan($id){
        $db = DB::table("user") -> where('id',"=",$id) -> get();
        return view("user/viewPesanan",["user" => $db]);
    }

    public function viewCheckout($id){
        $data = DB::table("user") -> where("id","=",$id) -> get();
        return view('user/viewChekout',["data" => $data]);
    }

    public function viewCart($id){
        $db = DB::table("user") -> where('id',"=",$id) -> get();
        return view("user/viewCart",["user" => $db]);
    }

    public function showLogin(){
        return view("login");
    }

    public function showSignup(){
        return view("signup");    
    }

    public function dashboard($id){
        $data = DB::table("user") -> where('id','=',$id) -> get();
        return view("user/dashboard",['user' => $data]);
    }

    public function admin(){
        $data = DB::table("barang") -> get();
        return view("admin/index",["data" => $data]);
    }

    public function showTambah(){
        $kategori = DB::table("list_kategori") -> get();
        return view("admin/tambah",['kategori' => $kategori]);
    }

    public function showTambahKategori(){
        $kategori = DB::table("list_kategori") -> get();
        return view("admin/tambahKategori",['kategori' => $kategori]);
    }

    public function logout(Request $request){
        $request -> session() ->flush();
        return redirect("/");
    }

    public function login(Request $request){
        $Username = $request -> input("username");
        $Password = $request -> input("password");
        $data = DB::table("user") -> where('username','=',$Username) -> get();
        foreach($data as $db){
            if(Hash::check($Password,$db -> password)){
                if($db -> posisi == "admin"){
                    session("admin",true);
                    return redirect("/admin");
                }
                else{
                    session("user",true);
                    return redirect("user/{$db->id}/dashboard/");
                }
            }
        } 
        return redirect("/showLogin") -> with("error","Username atau Password salah");
    }

    public function signup(Request $request){
        $dump = $request -> input("password");
        $password = bcrypt($dump);
        DB::table("user") -> insert([
            'nama_lengkap' => $request->input("fullname"),
            'username' => $request -> input("username"),
            'email' => $request -> input("email"),
            'password' => $password,
            'posisi' => "user",
            'phone' => $request -> input("phone")
        ]);
        return redirect("/showLogin") -> with("sukses","Pendaftaran sukses silakan login");
    }
}
