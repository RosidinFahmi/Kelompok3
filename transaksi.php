<?php
if(isset($_POST)) {
    $key = isset($_POST['key']) ? $_POST[ 'key']: '';
    //ambil data
    $pengirim = $_POST["pengirim"];
    $penerima = $_POST["penerima"];
    $jumlah = $_POST["jumlah"];
    
    //validasi data
    $validasi_sukses = true; //implementasi validasi sesuai kebutuhan

    if ($validasi_sukses){

        $transfer_sukses = true; //implementasi data transfer
        if ($transfer_sukses){
            echo "Transfer uang berhasil";
        } else {
            echo "Transfer uang gagal, silakan coba lagi";
        }
    } else {
        echo "Data pengirim atau penerima tidak valid. Silakan periksa kembali";
    }
}
    function rupiah($angka){
        //penambahan mata uang untuk proses tranfers berhasil
        $hasil_rupiah = " Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
    echo rupiah(250000);
?>

