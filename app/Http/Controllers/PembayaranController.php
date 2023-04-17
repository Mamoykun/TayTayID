<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\produkff;
use App\Models\invoice;
use App\Models\qris;
use App\Models\Statusbayar;
use Exception;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Milon\Barcode\DNS2D;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

use function GuzzleHttp\Promise\all;
use function PHPUnit\Framework\returnCallback;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $nama = $request->nama;
        $nohp = $request->nohp;
        $nomortelepon = $request->nohp;
        $harga = $request->harga;
        $metode = $request->metode;
        $game = $request->game;
        // return json_encode($harga);

        $invoice = invoice::create([
            'Jenis_item' => $game,
            'Status' => 'pending',
            'nomor_telepon' => $nomortelepon
        ]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'Mid-server-PLdxWqJtyfIdYv9Ch-G05_3V';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = true;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $invoice->code,
                'gross_amount' => $harga,
            ),
            'customer_details' => array(
                'first_name' => $nama,
                'last_name' => '',
                'phone' => $nohp,
            ),
            "enabled_payments" =>
            ["$metode"]
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return json_encode(['snap' => $snapToken]);
    }

    public function userid()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-bo.my.id/v2.1/game/mobilelegends/?id=81076282&zone=2154&key=ef0d2d51d39448f',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    public function halaman_bayar()
    {
        $data = Produk::all()->sortBy('nama_produk', SORT_NATURAL)->where('kategori', '=', 'MOBILE LEGEND');
        return view('halaman_pembayaran', compact('data'));
    }

    public function useridff()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-bo.my.id/v2.1/game/freefire/?id=1143704836&key=ef0d2d51d39448f',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_encode($response);
    }

    public function useridpubg()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-bo.my.id/v2.1/game/gensin/?id=817204858&server=ASIA&key=ef0d2d51d39448f',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    public function useridcodm()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-bo.my.id/v2.1/game/callofduty/?id=6742457400013357057&key=ef0d2d51d39448f',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_encode($response);
    }

    public function pembayaran_gensin()
    {
        $data = Produk::all()->sortBy('nama_produk', SORT_NATURAL)->where('kategori', '=', 'Genshin Impact');
        return view('pembayaran_genshin', compact('data'));
    }

    public function pembayaran_pubg()
    {
        $data = Produk::all()->sortBy('nama_produk', SORT_NATURAL)->where('kategori', '=', 'PUBG MOBILE');
        return view('pembayaran_pubg', compact('data'));
    }
    public function pembayaran_codm()
    {
        $data = Produk::all()->sortBy('nama_produk', SORT_NATURAL)->where('kategori', '=', 'Call of Duty MOBILE');
        return view('pembayaran_codm', compact('data'));
    }

    public function wa_notif(Request $request)
    {
        $orderid= $request->orderid;
        $game = $request->game;
        $nohp = $request->nohp;
        $api_key   = '0949a89c0ad682c146fa704b8ebd0b20408c1672'; // API KEY Anda
        $id_device = '248'; // ID DEVICE yang di SCAN (Sebagai pengirim)
        $url   = 'https://api.watsap.id/send-message'; // URL API
        $no_hp = '081287414628'; // No.HP yang dikirim (No.HP Penerima)
        $pesan = 'Order dengan Invoice:'.$orderid.'                                         '.
        'Pembelian Item Game'.$game.' Sudah Berhasil Terkirim Silahkan Dicek yaa,Terima Kasih telah belanja di TayTayid'; // Pesan yang dikirim

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
        curl_setopt($curl, CURLOPT_TIMEOUT, 0); // batas waktu response
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_POST, 1);

        $data_post = [
            'id_device' => $id_device,
            'api-key' => $api_key,
            'no_hp'   => $no_hp,
            'pesan'   => $pesan
        ];
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_post));
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }

    public function gopay()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-bo.my.id/v2.1/ewallet/gopay/?hp=087810249099&key=ef0d2d51d39448f',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }

    public function invoicesbs()
    {
        $data = invoice::all();
        return view("invoice", compact('data'));
    }

    public function callback()
    {
        return view('callback');
    }

    public function Qris(Request $request)
    {
        $username = $request->username;
        $nohp = $request->nohp;
        $game = $request->game;
        $harga = $request->harga;
        $apikey = 139139221119638;
        $mID = 195240928394;
        $invoice = invoice::create([
            'Jenis_item' => $game,
            'Status' => 'pending',
            'nomor_telepon' => $nohp
        ]);

        $trx = $invoice->code;


        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://qris.id/restapi/qris/show_qris.php?do=create-invoice&apikey=${apikey}&mID=${mID}&cliTrxNumber=${trx}&cliTrxAmount=${harga}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);
        $data = json_decode($response);
        // dd($data->data);
        // print_r($data);
        $qris = qris::create([
            'qris_content' => $data->data->qris_content,
            'qris_request_date' => $data->data->qris_request_date,
            'qris_invoice_id' => $data->data->qris_invoiceid,
            'orderid'=> $invoice->code
        ]);
        return json_encode($qris);

        // return view('qrcode',compact('data'));
    }
    public function Qris_ff(Request $request)
    {
        $usernameff = $request->username;
        $nohp = $request->nohp;
        $game = $request->game;
        $harga = $request->harga;
        $apikey = 139139221119638;
        $mID = 195240928394;
        $invoice = invoice::create([
            'Jenis_item' => $game,
            'Status' => 'pending',
            'nomor_telepon' => $nohp
        ]);

        $trx = $invoice->code;


        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://qris.id/restapi/qris/show_qris.php?do=create-invoice&apikey=${apikey}&mID=${mID}&cliTrxNumber=${trx}&cliTrxAmount=${harga}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);
        $data = json_decode($response);
        // dd($data->data);
        // print_r($data);
        $qris = qris::create([
            'qris_content' => $data->data->qris_content,
            'qris_request_date' => $data->data->qris_request_date,
            'qris_invoice_id' => $data->data->qris_invoiceid,
            'orderid'=> $invoice->code
        ]);
        return json_encode($qris);

        // return view('qrcode',compact('data'));
    }

    public function checkQris(Request $request)
    {
        $username= $request->username;
        $apikey = 139139221119638;
        $mID = 195240928394;
        $harga=$request->harga;
        $invoiceid= $request->invoiceid;
        $date = date('Y-m-d');
        $curl = curl_init();
        $game = $request->code;

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://qris.id/restapi/qris/checkpaid_qris.php?do=check-Status&apikey=${apikey}&mID=${mID}&invid=${invoiceid}&trxvalue=${harga}&trxdate=${date}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);
        $response = curl_exec($curl);
        $data = json_decode($response);
        $checkQris = Statusbayar::create([
            'qris_status' => $data->data->qris_status,
            'qris_payment_customername' => $username,
            'qris_payment_methodby' => $data->data->qris_payment_methodby,
            'harga'=> $harga
        ]);
        return json_encode($checkQris);
    }
    public function checkQris_ff(Request $request)
    {
        $usernameff= $request->usernameff;
        $apikey = 139139221119638;
        $mID = 195240928394;
        $harga=$request->harga;
        $invoiceid= $request->invoiceid;
        $date = date('Y-m-d');
        $curl = curl_init();
        $game = $request->code;

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://qris.id/restapi/qris/checkpaid_qris.php?do=check-Status&apikey=${apikey}&mID=${mID}&invid=${invoiceid}&trxvalue=${harga}&trxdate=${date}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);
        $response = curl_exec($curl);
        $data = json_decode($response);
        $checkQris = Statusbayar::create([
            'qris_status' => $data->data->qris_status,
            'qris_payment_customername' => $usernameff,
            'qris_payment_methodby' => $data->data->qris_payment_methodby,
            'harga'=> $harga
        ]);
        return json_encode($checkQris);
    }
}
