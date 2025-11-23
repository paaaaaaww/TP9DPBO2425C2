<?php
include_once "DB.php";
include_once "Sirkuit.php";

class TabelSirkuit extends DB {

    // ambil semua data
    public function getAll() {
        $query = "SELECT * FROM sirkuit";
        $stmt = $this->executeQuery($query);
        $rows = $stmt->fetchAll();

        $data = [];
        foreach ($rows as $row) {
            $data[] = new Sirkuit(
                $row['id'],
                $row['nama'],
                $row['lokasi'],
                $row['panjang'],
                $row['jumlahTikungan']
            );
        }
        return $data;
    }

    // ambil data by id
    public function getById($id) {
        $query = "SELECT * FROM sirkuit WHERE id = ?";
        $stmt = $this->executeQuery($query, [$id]);
        $row = $stmt->fetch();

        if ($row) {
            return new Sirkuit(
                $row['id'],
                $row['nama'],
                $row['lokasi'],
                $row['panjang'],
                $row['jumlahTikungan']
            );
        }
        return null;
    }

    // tambah data
    public function insert($data) {
        $query = "INSERT INTO sirkuit (nama, lokasi, panjang, jumlahTikungan)
                  VALUES (?, ?, ?, ?)";

        return $this->executeQuery($query, [
            $data['nama'],
            $data['lokasi'],
            $data['panjang'],
            $data['jumlahTikungan']
        ]);
    }

    // update data
    public function update($data) {
        $query = "UPDATE sirkuit
                  SET nama = ?, lokasi = ?, panjang = ?, jumlahTikungan = ?
                  WHERE id = ?";

        return $this->executeQuery($query, [
            $data['nama'],
            $data['lokasi'],
            $data['panjang'],
            $data['jumlahTikungan'],
            $data['id']
        ]);
    }

    // hapus data
    public function delete($id) {
        $query = "DELETE FROM sirkuit WHERE id = ?";
        return $this->executeQuery($query, [$id]);
    }
}
?>
