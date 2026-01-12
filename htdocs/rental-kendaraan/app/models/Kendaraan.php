<?php
class Kendaraan {
    private $conn;
    private $table = 'kendaraan';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAllKendaraan($search = '', $jenis = '', $status = '', $limit = 10, $offset = 0) {
        $query = "SELECT * FROM " . $this->table . " WHERE 1=1";
        
        if(!empty($search)) {
            $query .= " AND (nama_kendaraan LIKE :search OR plat_nomor LIKE :search OR merk LIKE :search)";
        }
        
        if(!empty($jenis)) {
            $query .= " AND jenis = :jenis";
        }
        
        if(!empty($status)) {
            $query .= " AND status = :status";
        }
        
        $query .= " ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
        
        $stmt = $this->conn->prepare($query);
        
        if(!empty($search)) {
            $searchParam = "%$search%";
            $stmt->bindParam(':search', $searchParam);
        }
        
        if(!empty($jenis)) {
            $stmt->bindParam(':jenis', $jenis);
        }
        
        if(!empty($status)) {
            $stmt->bindParam(':status', $status);
        }
        
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }

    public function countKendaraan($search = '', $jenis = '', $status = '') {
        $query = "SELECT COUNT(*) as total FROM " . $this->table . " WHERE 1=1";
        
        if(!empty($search)) {
            $query .= " AND (nama_kendaraan LIKE :search OR plat_nomor LIKE :search OR merk LIKE :search)";
        }
        
        if(!empty($jenis)) {
            $query .= " AND jenis = :jenis";
        }
        
        if(!empty($status)) {
            $query .= " AND status = :status";
        }
        
        $stmt = $this->conn->prepare($query);
        
        if(!empty($search)) {
            $searchParam = "%$search%";
            $stmt->bindParam(':search', $searchParam);
        }
        
        if(!empty($jenis)) {
            $stmt->bindParam(':jenis', $jenis);
        }
        
        if(!empty($status)) {
            $stmt->bindParam(':status', $status);
        }
        
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['total'];
    }

    public function getKendaraanById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getKendaraanTersedia() {
        $query = "SELECT * FROM " . $this->table . " WHERE status = 'tersedia' ORDER BY nama_kendaraan";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function createKendaraan($data) {
        $query = "INSERT INTO " . $this->table . " 
                  (kode_kendaraan, nama_kendaraan, jenis, merk, tahun_produksi, plat_nomor, warna, harga_sewa_perhari, status, foto) 
                  VALUES (:kode_kendaraan, :nama_kendaraan, :jenis, :merk, :tahun_produksi, :plat_nomor, :warna, :harga_sewa_perhari, :status, :foto)";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':kode_kendaraan', $data['kode_kendaraan']);
        $stmt->bindParam(':nama_kendaraan', $data['nama_kendaraan']);
        $stmt->bindParam(':jenis', $data['jenis']);
        $stmt->bindParam(':merk', $data['merk']);
        $stmt->bindParam(':tahun_produksi', $data['tahun_produksi']);
        $stmt->bindParam(':plat_nomor', $data['plat_nomor']);
        $stmt->bindParam(':warna', $data['warna']);
        $stmt->bindParam(':harga_sewa_perhari', $data['harga_sewa_perhari']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':foto', $data['foto']);
        
        return $stmt->execute();
    }

    public function updateKendaraan($id, $data) {
        $query = "UPDATE " . $this->table . " 
                  SET kode_kendaraan = :kode_kendaraan, nama_kendaraan = :nama_kendaraan, 
                      jenis = :jenis, merk = :merk, tahun_produksi = :tahun_produksi, 
                      plat_nomor = :plat_nomor, warna = :warna, harga_sewa_perhari = :harga_sewa_perhari, 
                      status = :status, foto = :foto 
                  WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':kode_kendaraan', $data['kode_kendaraan']);
        $stmt->bindParam(':nama_kendaraan', $data['nama_kendaraan']);
        $stmt->bindParam(':jenis', $data['jenis']);
        $stmt->bindParam(':merk', $data['merk']);
        $stmt->bindParam(':tahun_produksi', $data['tahun_produksi']);
        $stmt->bindParam(':plat_nomor', $data['plat_nomor']);
        $stmt->bindParam(':warna', $data['warna']);
        $stmt->bindParam(':harga_sewa_perhari', $data['harga_sewa_perhari']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':foto', $data['foto']);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }

    public function updateStatus($id, $status) {
        $query = "UPDATE " . $this->table . " SET status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function deleteKendaraan($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function countByStatus() {
        $query = "SELECT status, COUNT(*) as total FROM " . $this->table . " GROUP BY status";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        $result = [];
        while($row = $stmt->fetch()) {
            $result[$row['status']] = $row['total'];
        }
        return $result;
    }

    public function generateKodeKendaraan() {
        $query = "SELECT kode_kendaraan FROM " . $this->table . " ORDER BY id DESC LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        if($stmt->rowCount() > 0) {
            $row = $stmt->fetch();
            $lastCode = $row['kode_kendaraan'];
            $number = intval(substr($lastCode, 3)) + 1;
            return 'KND' . str_pad($number, 3, '0', STR_PAD_LEFT);
        }
        
        return 'KND001';
    }
}
?>