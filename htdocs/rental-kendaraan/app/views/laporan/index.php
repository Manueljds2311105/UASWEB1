<div class="main-content">
    <div class="topbar">
        <div class="topbar-left"><h4>Laporan</h4></div>
    </div>
    
    <div class="content-area">
        <div class="card">
            <div class="card-header">
                <h3>Filter Laporan</h3>
            </div>
            <div class="card-body">
                <form method="GET" action="<?= BASE_URL ?>laporan">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Dari Tanggal</label>
                            <input type="date" name="start_date" class="form-control" value="<?= $start_date ?>">
                        </div>
                        <div class="form-group">
                            <label>Sampai Tanggal</label>
                            <input type="date" name="end_date" class="form-control" value="<?= $end_date ?>">
                        </div>
                        <div class="form-group" style="display: flex; align-items: flex-end;">
                            <button type="submit" class="btn btn-info">
                                <i class="fas fa-search"></i> Tampilkan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Laporan Transaksi -->
        <div class="card">
            <div class="card-header">
                <h3>Riwayat Transaksi</h3>
            </div>
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Tanggal</th>
                            <th>Pelanggan</th>
                            <th>Kendaraan</th>
                            <th>Total</th>
                            <th>Denda</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($transaksi as $t): ?>
                        <tr>
                            <td><?= $t['kode_transaksi'] ?></td>
                            <td><?= date('d/m/Y', strtotime($t['tanggal_sewa'])) ?></td>
                            <td><?= $t['nama_pelanggan'] ?></td>
                            <td><?= $t['nama_kendaraan'] ?></td>
                            <td>Rp <?= number_format($t['total_biaya'], 0, ',', '.') ?></td>
                            <td>Rp <?= number_format($t['denda'], 0, ',', '.') ?></td>
                            <td><span class="badge badge-<?= $t['status'] == 'selesai' ? 'success' : 'warning' ?>"><?= $t['status'] ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Transaksi Aktif -->
        <div class="card">
            <div class="card-header">
                <h3>Kendaraan Sedang Disewa</h3>
            </div>
            <div class="card-body">
                <table>
                    <!-- Similar structure -->
                </table>
            </div>
        </div>
    </div>
</div>