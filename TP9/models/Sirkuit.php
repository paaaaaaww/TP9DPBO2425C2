<?php

class Sirkuit {

    private $id;
    private $nama;
    private $lokasi;
    private $panjang; // km
    private $jumlahTikungan;

    public function __construct($id, $nama, $lokasi, $panjang, $jumlahTikungan){
        $this->id = $id;
        $this->nama = $nama;
        $this->lokasi = $lokasi;
        $this->panjang = $panjang;
        $this->jumlahTikungan = $jumlahTikungan;
    }

    public function getId(){
        return $this->id;
    }
    public function getNama(){
        return $this->nama;
    }
    public function getLokasi(){
        return $this->lokasi;
    }
    public function getPanjang(){
        return $this->panjang;
    }
    public function getJumlahTikungan(){
        return $this->jumlahTikungan;
    }

    public function setNama($nama){
        $this->nama = $nama;
    }
    public function setLokasi($lokasi){
        $this->lokasi = $lokasi;
    }
    public function setPanjang($panjang){
        $this->panjang = $panjang;
    }
    public function setJumlahTikungan($jumlahTikungan){
        $this->jumlahTikungan = $jumlahTikungan;
    }
}
?>
