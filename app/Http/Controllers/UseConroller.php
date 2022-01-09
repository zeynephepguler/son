<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kullani;
use App\Models\basvuru;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Validator, Input, Redirect;
use Kreait\Firebase\Database;
class UseConroller extends Controller
{

  public function __construct(Database $database)
      {
          $this->database = $database;
      }

  public function ogrencigiris()
  {
    return view('layouts.ogrencigiris');
    // code...
  }



    public function alma (Request $req)
    {
      $ref_tablename='bilgiler';
      $postData = [
        'ogrNo'=>$req->no,
        'Ad'=>$req->ad,
        'Soyad'=>$req->soyad,
        'e-mail'=>$req->email,
        'sifre'=>$req->sifre,
        'TelefonNo'=>$req->telefon,
        'adres'=>$req->adres,
        'Tc'=>$req->tc,
        'Sınıfı'=>$req->sınıfsec,


      ];
      $postRef = $this->database->getReference($ref_tablename)->push($postData);

      $kullani = new Kullani();
      $kullani->ad=$req->ad;
      $kullani->no=$req->no;
      $kullani->soyad=$req->soyad;
      $kullani->email=$req->email;
      $kullani->sifre=Hash::make($req->sifre);
      $kullani->telefon=$req->telefon;
      $kullani->adres=$req->adres;
      $kullani->tc=$req->tc;
      $kullani->sınıfsec=$req->sınıfsec;
      $kullani->bolum;
      $kullani->fakulte;
      if($req->hasfile('image'))
              {
                  $file = $req->file('image');
                  $extenstion = $file->getClientOriginalExtension();
                  $filename = time().'.'.$extenstion;
                  $file->move('uploads/ogrenci/', $filename);
                  $kullani->image = $filename;
              }
      $kullani->save();
      return redirect('ogrencigiris');

    }

    function kontrol(Request $request){
        //Validate requests
    $validator = Validator::make($request->all(), [
          'no'=>'required|no|unique:kullanis',
          'sifre'=>'required|sifre|min:5|max:12',

        ]);

        $userInfo = Kullani::where('no','=', $request->no)->first();

        if(!$userInfo){
            return back()->with('fail','Numaraya kayıtlı Ögrenci yok');
        }else{
            //check password
            if(Hash::check($request->sifre, $userInfo->sifre)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('ogrencianasayfa');

            }else{
                return back()->with('fail','sifre Yanlıs');
            }
        }
    }
    function bilgiler(){
       $data = ['LoggedUserInfo'=>Kullani::where('id','=', session('LoggedUser'))->first()];
       return view('layouts.kisiselbilgiler', $data);

   }
   public function basvuru (Request $req)
   {
     $ref_tablename='basvurular';
     $postData = [
       'ogrNo'=>$req->ogrencino,
       'cap'=>$req->cap,
       'yazokulu'=>$req->yazokulu,
       'yataygecis'=>$req->yataygecis,
       'dikeygecis'=>$req->dikeygecis,
       'intibak'=>$req->intibak,



     ];
     $postRef = $this->database->getReference($ref_tablename)->push($postData);

     $basvuru = new basvuru();
     $basvuru->ogrencino=$req->ogrencino;
     $basvuru->cap=$req->cap;
     $basvuru->yazokulu=$req->yazokulu;
     $basvuru->yataygecis=$req->yataygecis;
     $basvuru->dikeygecis=$req->dikeygecis;
     $basvuru->intibak=$req->intibak;
     $basvuru->save();
     return redirect('basvurularim');

     $data = ['LoggedUserInfo'=>Kullani::where('id','=', session('LoggedUser'))->first()];
     return view('layouts.basvurucap', $data);
   }
    public function cap()
   {
     $data = ['LoggedUserInfo'=>Kullani::where('id','=', session('LoggedUser'))->first()];
     return view('layouts.basvurucap', $data);
   }
   public function dgs()
    {
      $data = ['LoggedUserInfo'=>Kullani::where('id','=', session('LoggedUser'))->first()];
      return view('layouts.basvurudgs', $data);
    }
    public function intibak()
   {
     $data = ['LoggedUserInfo'=>Kullani::where('id','=', session('LoggedUser'))->first()];
     return view('layouts.basvuruintibak', $data);
   }
   public function yazokulu()
  {
    $data = ['LoggedUserInfo'=>Kullani::where('id','=', session('LoggedUser'))->first()];
    return view('layouts.basvuruyazokulu', $data);
  }
  public function yty()
  {
   $data = ['LoggedUserInfo'=>Kullani::where('id','=', session('LoggedUser'))->first()];
   return view('layouts.basvuruytg', $data);
  }




}
