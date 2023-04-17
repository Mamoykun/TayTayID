<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\invoice;
use Illuminate\Http\Request;

class MobileController extends Controller
{
  public function index()
  {

    $username = "futomeg1yLvg";
    $apiKey = "dev-6d05f450-0f26-11ed-a564-0f3e4d9a32f8";

    $data = json_encode(array(
      'cmd' => 'prepaid',
      'username' => $username, // konstan
      'sign' => md5("$username$apiKey" . "pricelist")
    ));
    $header = array(
      'Content-Type: application/json',
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/price-list');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
    // return $result;
    // print_r($result);

    // print_r($data);
    $data = json_decode($result);
    // dd($data);
    Produk::truncate();
    foreach ($data->data as $d) {
      // echo $d->buyer_sku_code;
      Produk::create([
        'nama_produk' => $d->product_name,
        'kode_produk' => $d->buyer_sku_code,
        'kategori' => $d->brand,
        'harga' => $d->price
      ]);
    }
  }


  public function Transaksi(Request $request)
  {
    // $game = $request->orderid;
    $game = $request->orderid;
    $kodeproduk = $request->kodeproduk;
    $user = $request->user;
    $zone = $request->zone;
    $username = "futomeg1yLvg";
    $apiKey = "b17b017b-3d41-51fb-8466-81f25d075d54";
    $invoice = invoice::where('code', $game)->update(['Status' => 'success']);


    $data = json_encode(array(
      'username' => $username, // konstan
      'buyer_sku_code' => $kodeproduk,
      'customer_no' => "$user" . "$zone",
      'ref_id' => $game,
      'sign' => md5("$username"."$apiKey" . "$game"),
    ));
    $header = array(
      'Content-Type: application/json',
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/transaction');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
    $data = json_decode($result);
    // dd($data);
    return json_encode(['data' => $data]);
  }

  public function Transaksi_qris(Request $request)
  {
    // $game = $request->orderid;
    $game = $request->orderid;
    $kodeproduk = $request->kodeproduk;
    $user = $request->user;
    $zone = $request->zone;
    $username = "futomeg1yLvg";
    $apiKey = "b17b017b-3d41-51fb-8466-81f25d075d54";

    $data = json_encode(array(
      'username' => $username, // konstan
      'buyer_sku_code' => $kodeproduk,
      'customer_no' => "$user" . "$zone",
      'ref_id' => $game,
      'sign' => md5("$username"."$apiKey" . "$game"),
    ));
    $header = array(
      'Content-Type: application/json',
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/transaction');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
    $data = json_decode($result);
    // dd($data);
    return json_encode(['data' => $data]);
  }

  public function Transaksi_ff(Request $request)
  {
    $game = $request->orderid;
    $kodeproduk = $request->kodeproduk;
    $useridff = $request->useridff;
    $username = "futomeg1yLvg";
    $apiKey = "b17b017b-3d41-51fb-8466-81f25d075d54";
    $invoice = invoice::where('code', $game)->update(['Status' => 'success']);


    $data = json_encode(array(
      'username' => $username, // konstan
      'buyer_sku_code' => $kodeproduk,
      'customer_no' => $useridff,
      'ref_id' => $game,
      'sign' => md5("$username$apiKey" . "$game"),
    ));
    $header = array(
      'Content-Type: application/json',
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/transaction');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
    $data = json_decode($result);
    // dd($data);
    return json_encode(['data' => $data]);
  }

  public function Transaksi_qris_ff(Request $request)
  {
    // $game = $request->orderid;
    $game = $request->orderid;
    $kodeproduk = $request->kodeproduk;
    $useridff = $request->useridff;
    $username = "futomeg1yLvg";
    $apiKey = "b17b017b-3d41-51fb-8466-81f25d075d54";

    $data = json_encode(array(
      'username' => $username, // konstan
      'buyer_sku_code' => $kodeproduk,
      'customer_no' => $useridff,
      'ref_id' => $game,
      'sign' => md5("$username"."$apiKey" . "$game"),
    ));
    $header = array(
      'Content-Type: application/json',
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/transaction');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
    $data = json_decode($result);
    // dd($data);
    return json_encode(['data' => $data]);
  }
  

  public function Transaksi_genshin(Request $request)
  {
    $game = $request->orderid;
    $kodeproduk = $request->kodeproduk;
    $user = $request->userservergenshin;
    $zone = $request->zonegenshin;
    $username = "futomeg1yLvg";
    $apiKey = "b17b017b-3d41-51fb-8466-81f25d075d54";
    $invoice = invoice::where('code', $game)->update(['Status' => 'success']);


    $data = json_encode(array(
      'username' => $username, // konstan
      'buyer_sku_code' => $kodeproduk,
      'customer_no' => $user.$zone,
      'ref_id' => $game,
      'sign' => md5("$username$apiKey" . "$game"),
    ));
    $header = array(
      'Content-Type: application/json',
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/transaction');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
    $data = json_decode($result);
    // dd($data);
    return json_encode(['data' => $data]);
  }

  public function error_midtrans(Request $request)
  {
    $game = $request->orderid;
    $invoice = invoice::where('code', $game)->update(['Status' => 'Gagal']);
  }

  public function cek_diggie (Request $request)
  {
    $game = $request->orderid;
    $kodeproduk = $request->kodeproduk;
    $user = $request->userservergenshin;
    $zone = $request->zonegenshin;
    $username = "futomeg1yLvg";
    $apiKey = "b17b017b-3d41-51fb-8466-81f25d075d54";
    $invoice = invoice::where('code', $game)->update(['Status' => 'success']);


    $data = json_encode(array(
      'username' => $username, // konstan
      'buyer_sku_code' => "ML-1",
      'customer_no' => "810762822154",
      'ref_id' => "taytay-1000",
      'sign' => md5("$username"."$apiKey" . "taytay-1000"),
    ));
    $header = array(
      'Content-Type: application/json',
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/transaction');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
    $data = json_decode($result);
    // dd($data);
    return json_encode(['data' => $data]);
  }
};
