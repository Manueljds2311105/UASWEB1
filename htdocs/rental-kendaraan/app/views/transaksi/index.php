<div class="main-content">
    <!-- Topbar sama seperti lainnya -->
    
    <div class="content-area">
        <!-- Alert flash message -->
        
        <div class="card">
            <div class="card-header">
                <h3>Daftar Transaksi</h3>
                <a href="transaksi/create" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Transaksi Baru
                </a>
            </div>
            
            <div class="card-body">
                <!-- Filter: search + status -->
                <form method="GET">
                    <div class="filter-section">
                        <input type="text" name="search" placeholder="Cari...">
                        <select name="status">
                            <option value="">Semua Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="selesai">Selesai</option>
                            <option value="batal">Batal</option>
                        </select>
                        <button type="submit" class="btn btn-info">Cari</button>
                    </div>
                </form>
                
                <!-- Table -->
                <table>
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Pelanggan</th>
                            <th>Kendaraan</th>
                            <th>Tanggal Sewa</th>
                            <th>Tanggal Kembali</th>
                            <th>Total Biaya</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($transaksi as $t): ?>
                        <tr>
                            <td><?= $t['kode_transaksi'] ?></td>
                            <td><?= $t['nama_pelanggan'] ?></td>
                            <td><?= $t['nama_kendaraan'] ?></td>
                            <td><?= date('d/m/Y', strtotime($t['tanggal_sewa'])) ?></td>
                            <td><?= date('d/m/Y', strtotime($t['tanggal_kembali_rencana'])) ?></td>
                            <td>Rp <?= number_format($t['total_biaya'], 0, ',', '.') ?></td>
                            <td>
                                <span class="badge badge-<?= $t['status'] == 'aktif' ? 'warning' : 'success' ?>">
                                    <?= ucfirst($t['status']) ?>
                                </span>
                            </td>
                            <td>
                                <a href="transaksi/detail/<?= $t['id'] ?>" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <?php if($t['status'] == 'aktif'): ?>
                                <a href="transaksi/pengembalian/<?= $t['id'] ?>" class="btn btn-sm btn-success">
                                    <i class="fas fa-check"></i> Kembalikan
                                </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                <!-- Pagination (sama seperti kendaraan) -->
            </div>
        </div>
    </div>
</div>