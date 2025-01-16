<?php
    include 'koneksi.php';

    function tambah_data($data){
        
        $namaPasien = $data['namaPasien'];
        $usiaPasien = $data['usia'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $keluhanPasien = $data['keluhan'];
        $alamatPasien = $data['alamat'];

        $query = "INSERT INTO tb_pasien VALUES(null, '$namaPasien', '$usiaPasien', '$jenis_kelamin', '$keluhanPasien', '$alamatPasien')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function ubah_data($data){
        $antrian = $data['antrian'];
        $namaPasien = $data['namaPasien'];
        $usiaPasien = $data['usia'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $keluhanPasien = $data['keluhan'];
        $alamatPasien = $data['alamat'];

        $query = "UPDATE tb_pasien SET nama_pasien='$namaPasien', usia='$usiaPasien', jenis_kelamin='$jenis_kelamin', keluhan='$keluhanPasien', alamat='$alamatPasien' WHERE antrian='$antrian';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function hapus_data($data){
        $antrian = $data['hapus'];
        $query = "DELETE FROM tb_pasien WHERE antrian = '$antrian';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }
?>