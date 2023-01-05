<?php 
    $connect = mysqli_connect("localhost", "root", "", "data_pegawai");

    function query($query) {
        global $connect;
        $result = mysqli_query($connect, $query);
        $row = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data) {
        global $connect;

        $nama = $data["nama"];
        $gaji = $data["gaji"];
        $alamat = $data["alamat"];

        $query = "INSERT INTO pegawai VALUES ('', '$nama' , '$gaji', '$alamat')";
        mysqli_query($connect, $query);

        return mysqli_affected_rows($connect);
    }

    function ubah($data){
        global $connect;

        $id = $data["id"];
        $nama = $data["nama"];
        $gaji = $data["gaji"];
        $alamat = $data["alamat"];


        $query = "UPDATE pegawai SET
                    nama_lengkap = '$nama',
                    data_gaji    = '$gaji',
                    alamat       = '$alamat'

                    WHERE id = $id 
        ";

        mysqli_query($connect, $query);

        return mysqli_affected_rows($connect);
    }

    function hapus($id) {
        global $connect;
        mysqli_query($connect, "DELETE FROM pegawai WHERE id = $id");
    
        return mysqli_affected_rows($connect);
    }

    function cari($keyword) {
        $query = "SELECT * FROM pegawai 
                    WHERE 
                    nama_lengkap LIKE '%$keyword%' OR
                    alamat LIKE '%$keyword%'
                ";
        return query($query);
    }
?>
