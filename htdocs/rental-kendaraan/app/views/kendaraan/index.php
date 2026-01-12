<div class="main-content">
    <div class="topbar">
        <div class="topbar-left">
            <h4><i class="fas fa-car"></i> Data Kendaraan</h4>
        </div>
        <div class="topbar-right">
            <div class="user-info">
                <div class="user-avatar">
                    <?= strtoupper(substr($_SESSION['nama_lengkap'], 0, 1)) ?>
                </div>
                <div class="user-details">
                    <div class="user-name"><?= $_SESSION['nama_lengkap'] ?></div>
                    <div class="user-role"><?= $_SESSION['role'] ?? 'user' ?></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="content-area">
        <?php
        $flash = $this->getFlash();
        if($flash):
        ?>
        <div class="alert alert-<?= $flash['type'] ?>">
            <i class="fas fa-<?= $flash['type'] == 'success' ? 'check-circle' : 'exclamation-circle' ?>"></i>
            <?= $flash['message'] ?>
        </div>
        <?php endif; ?>
        
        <div class="card">
            <div class="card-header d-flex justify-between align-center">
                <h3 class="card-title">
                    <i class="fas fa-list"></i> Daftar Kendaraan
                </h3>
                <?php if($_SESSION['role'] == 'admin'): ?>
                <a href="<?= BASE_URL ?>kendaraan/create" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Kendaraan
                </a>
                <?php endif; ?>
            </div>
            
            <div class="card-body">
                <!-- Filter Section -->
                <form method="GET" action="<?= BASE_URL ?>kendaraan">
                    <div class="filter-section">
                        <div class="search-box">
                            <input type="text" 
                                   name="search" 
                                   placeholder="Cari nama/plat nomor/merk..." 
                                   value="<?= $search ?>"
                                   class="form-control">
                        </div>
                        
                        <div class="filter-box">
                            <select name="jenis" class="form-control">
                                <option value="">Semua Jenis</option>
                                <option value="mobil" <?= $jenis == 'mobil' ? 'selected' : '' ?>>Mobil</option>
                                <option value="motor" <?= $jenis == 'motor' ? 'selected' : '' ?>>Motor</option>
                                <option value="truk" <?= $jenis == 'truk' ? 'selected' : '' ?>>Truk</option>
                                <option value="bus" <?= $jenis == 'bus' ? 'selected' : '' ?>>Bus</option>
                            </select>
                        </div>
                        
                        <div class="filter-box">
                            <select name="status" class="form-control">
                                <option value="">Semua Status</option>
                                <option value="tersedia" <?= $status == 'tersedia' ? 'selected' : '' ?>>Tersedia</option>
                                <option value="disewa" <?= $status == 'disewa' ? 'selected' : '' ?>>Disewa</option>
                                <option value="maintenance" <?= $status == 'maintenance' ? 'selected' : '' ?>>Maintenance</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-info">
                            <i class="fas fa-search"></i> Cari
                        </button>
                        
                        <a href="<?= BASE_URL ?>kendaraan" class="btn btn-secondary">
                            <i class="fas fa-redo"></i> Reset
                        </a>
                    </div>
                </form>
                
                <!-- Table -->
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Kendaraan</th>
                                <th>Jenis</th>
                                <th>Merk</th>
                                <th>Plat Nomor</th>
                                <th>Harga/Hari</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($kendaraan)): ?>
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data kendaraan</td>
                            </tr>
                            <?php else: ?>
                                <?php foreach($kendaraan as $k): ?>
                                <tr>
                                    <td><?= $k['kode_kendaraan'] ?></td>
                                    <td>
                                        <strong><?= $k['nama_kendaraan'] ?></strong><br>
                                        <small><?= $k['tahun_produksi'] ?> - <?= $k['warna'] ?></small>
                                    </td>
                                    <td><span class="badge badge-info"><?= ucfirst($k['jenis']) ?></span></td>
                                    <td><?= $k['merk'] ?></td>
                                    <td><?= $k['plat_nomor'] ?></td>
                                    <td>Rp <?= number_format($k['harga_sewa_perhari'], 0, ',', '.') ?></td>
                                    <td>
                                        <?php
                                        $badgeClass = '';
                                        switch($k['status']) {
                                            case 'tersedia': $badgeClass = 'badge-success'; break;
                                            case 'disewa': $badgeClass = 'badge-warning'; break;
                                            case 'maintenance': $badgeClass = 'badge-danger'; break;
                                        }
                                        ?>
                                        <span class="badge <?= $badgeClass ?>"><?= ucfirst($k['status']) ?></span>
                                    </td>
                                    <td>
                                        <?php if($_SESSION['role'] == 'admin'): ?>
                                        <a href="<?= BASE_URL ?>kendaraan/edit/<?= $k['id'] ?>" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="<?= BASE_URL ?>kendaraan/delete/<?= $k['id'] ?>" 
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Yakin ingin menghapus kendaraan <?= $k['nama_kendaraan'] ?>?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </a>
                                        
                                        <?php else: ?>
                                        <span class="badge badge-info">View Only</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <?php if($totalPages > 1): ?>
                <div class="pagination">
                    <?php if($page > 1): ?>
                    <a href="<?= BASE_URL ?>kendaraan?page=<?= $page - 1 ?>&search=<?= $search ?>&jenis=<?= $jenis ?>&status=<?= $status ?>">
                        <i class="fas fa-chevron-left"></i> Prev
                    </a>
                    <?php endif; ?>
                    
                    <?php for($i = 1; $i <= $totalPages; $i++): ?>
                        <?php if($i == $page): ?>
                            <span class="active"><?= $i ?></span>
                        <?php else: ?>
                            <a href="<?= BASE_URL ?>kendaraan?page=<?= $i ?>&search=<?= $search ?>&jenis=<?= $jenis ?>&status=<?= $status ?>">
                                <?= $i ?>
                            </a>
                        <?php endif; ?>
                    <?php endfor; ?>
                    
                    <?php if($page < $totalPages): ?>
                    <a href="<?= BASE_URL ?>kendaraan?page=<?= $page + 1 ?>&search=<?= $search ?>&jenis=<?= $jenis ?>&status=<?= $status ?>">
                        Next <i class="fas fa-chevron-right"></i>
                    </a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>