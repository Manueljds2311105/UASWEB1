<?php
class KendaraanController extends Controller {
    
    public function index() {
        $this->checkAuth();
        
        $kendaraanModel = $this->model('Kendaraan');
        
        // Pagination
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        
        // Filter
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $jenis = isset($_GET['jenis']) ? $_GET['jenis'] : '';
        $status = isset($_GET['status']) ? $_GET['status'] : '';
        
        $totalData = $kendaraanModel->countKendaraan($search, $jenis, $status);
        $totalPages = ceil($totalData / $limit);
        
        $data = [
            'title' => 'Data Kendaraan',
            'active' => 'kendaraan',
            'role' => $_SESSION['role'] ?? 'user',
            'kendaraan' => $kendaraanModel->getAllKendaraan($search, $jenis, $status, $limit, $offset),
            'page' => $page,
            'totalPages' => $totalPages,
            'search' => $search,
            'jenis' => $jenis,
            'status' => $status
        ];
        
        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar', $data);
        $this->view('kendaraan/index', $data);
        $this->view('layouts/footer');
    }
    
    public function create() {
        $this->checkAdmin();
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $kendaraanModel = $this->model('Kendaraan');
            
            // Handle file upload
            $foto = '';
            if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
                $targetDir = "../public/assets/images/";
                $fileName = time() . '_' . basename($_FILES['foto']['name']);
                $targetFile = $targetDir . $fileName;
                
                if(move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile)) {
                    $foto = $fileName;
                }
            }
            
            $data = [
                'kode_kendaraan' => $kendaraanModel->generateKodeKendaraan(),
                'nama_kendaraan' => $_POST['nama_kendaraan'],
                'jenis' => $_POST['jenis'],
                'merk' => $_POST['merk'],
                'tahun_produksi' => $_POST['tahun_produksi'],
                'plat_nomor' => $_POST['plat_nomor'],
                'warna' => $_POST['warna'],
                'harga_sewa_perhari' => str_replace(['.', ','], '', $_POST['harga_sewa_perhari']),
                'status' => $_POST['status'],
                'foto' => $foto
            ];
            
            if($kendaraanModel->createKendaraan($data)) {
                $this->setFlash('success', 'Data kendaraan berhasil ditambahkan!');
                $this->redirect('kendaraan');
            } else {
                $this->setFlash('danger', 'Gagal menambahkan data kendaraan!');
            }
        }
        
        $kendaraanModel = $this->model('Kendaraan');
        $data = [
            'title' => 'Tambah Kendaraan',
            'active' => 'kendaraan',
            'kode' => $kendaraanModel->generateKodeKendaraan()
        ];
        
        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar', $data);
        $this->view('kendaraan/create', $data);
        $this->view('layouts/footer');
    }
    
    public function edit($id) {
        $this->checkAdmin();
        
        $kendaraanModel = $this->model('Kendaraan');
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $kendaraan = $kendaraanModel->getKendaraanById($id);
            $foto = $kendaraan['foto'];
            
            // Handle file upload
            if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
                $targetDir = "../public/assets/images/";
                $fileName = time() . '_' . basename($_FILES['foto']['name']);
                $targetFile = $targetDir . $fileName;
                
                if(move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile)) {
                    // Delete old file
                    if(!empty($kendaraan['foto']) && file_exists($targetDir . $kendaraan['foto'])) {
                        unlink($targetDir . $kendaraan['foto']);
                    }
                    $foto = $fileName;
                }
            }
            
            $data = [
                'kode_kendaraan' => $_POST['kode_kendaraan'],
                'nama_kendaraan' => $_POST['nama_kendaraan'],
                'jenis' => $_POST['jenis'],
                'merk' => $_POST['merk'],
                'tahun_produksi' => $_POST['tahun_produksi'],
                'plat_nomor' => $_POST['plat_nomor'],
                'warna' => $_POST['warna'],
                'harga_sewa_perhari' => str_replace(['.', ','], '', $_POST['harga_sewa_perhari']),
                'status' => $_POST['status'],
                'foto' => $foto
            ];
            
            if($kendaraanModel->updateKendaraan($id, $data)) {
                $this->setFlash('success', 'Data kendaraan berhasil diupdate!');
                $this->redirect('kendaraan');
            } else {
                $this->setFlash('danger', 'Gagal mengupdate data kendaraan!');
            }
        }
        
        $data = [
            'title' => 'Edit Kendaraan',
            'active' => 'kendaraan',
            'kendaraan' => $kendaraanModel->getKendaraanById($id)
        ];
        
        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar', $data);
        $this->view('kendaraan/edit', $data);
        $this->view('layouts/footer');
    }
    
    public function delete($id) {
        $this->checkAdmin();
        
        $kendaraanModel = $this->model('Kendaraan');
        
        if($kendaraanModel->deleteKendaraan($id)) {
            $this->setFlash('success', 'Data kendaraan berhasil dihapus!');
        } else {
            $this->setFlash('danger', 'Gagal menghapus data kendaraan!');
        }
        
        $this->redirect('kendaraan');
    }
}
?>