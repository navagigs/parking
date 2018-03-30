<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use thiagoalessio\TesseractOCR\TesseractOCR;
class CurlController extends Controller
{
    public function __construct()
    {
        $this->setUrl = 'https://jsonplaceholder.typicode.com';
    }

    public function getCURL()
    {
        $url = Curl::to($this->setUrl.'/posts')->get();
        $json = json_decode($url, true);
        return view('curl.view', compact('json'));
    }

    public function view_login() 
    {
        return  view('curl.login');
    }

    public function cek_login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $response = Curl::to('https://sobatteknologi.xyz/hrd-api/public/api/login')
        ->withData(['username'=> 'SpDmifrqjx', 'password'=> '123456'])
        ->post();
    //     if($response > 1){
    //        return 'berhasil';
    //    } else {
    //     return 'gagal';
    // }
        $token = json_decode($response, true);
        foreach($token as $item) {
            $item;
        }
        echo $item;
    }


    public function ocr() {
        $tesseract = new TesseractOCR(asset('plat4.png'));
        $tesseract->executable('C:\Program Files (x86)\Tesseract-OCR\tesseract.exe');
      $ocr = $tesseract->run();
        return view('curl.ocr', compact('ocr'));

    }

}
