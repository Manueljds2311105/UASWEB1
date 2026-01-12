<div class="main-content">
    <div class="topbar">
        <div class="topbar-left"><h4>Pengembalian Kendaraan</h4></div>
    </div>
    
    <div class="content-area">
        <div class="card">
            <div class="card-header">
                <h3>Informasi Transaksi</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th width="200">Kode Transaksi</th>
                        <td><?= $transaksi['kode_transaksi'] ?></td>
                    </tr>
                    <tr>
                        <th>Pelanggan</th>
                        <td><?= $transaksi['nama_pelanggan'] ?></td>
                    </tr>
                    <tr>
                        <th>Kendaraan</th>
                        <td><?= $transaksi['nama_kendaraan'] ?> (<?= $transaksi['plat_nomor'] ?>)</td>
                    </tr>
                    <tr>
                        <th>Tanggal Sewa</th>
                        <td><?= date('d/m/Y', strtotime($transaksi['tanggal_sewa'])) ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Kembali Rencana</th>
                        <td><?= date('d/m/Y', strtotime($transaksi['tanggal_kembali_rencana'])) ?></td>
                    </tr>
                    <tr>
                        <th>Total Biaya Sewa</th>
                        <td>Rp <?= number_format($transaksi['total_biaya'], 0, ',', '.') ?></td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h3>Form Pengembalian</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="<?= BASE_URL ?>transaksi/pengembalian/<?= $transaksi['id'] ?>">
                    <input type="hidden" id="tanggal_kembali_rencana" value="<?= $transaksi['tanggal_kembali_rencana'] ?>">
                    <input type="hidden" id="harga_sewa_perhari" value="<?= $transaksi['harga_sewa_perhari'] ?>">
                    
                    <div class="form-group">
                        <label>Tanggal Pengembalian Aktual *</label>
                        <input type="date" name="tanggal_kembali_aktual" id="tanggal_kembali_aktual" class="form-control" required onchange="hitungDenda()">
                    </div>
                    
                    <div id="denda_display"></div>
                    <input type="hidden" id="denda_value" name="denda" value="0">
                    
                    <div style="margin-top: 30px; display: flex; gap: 10px;">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check"></i> Proses Pengembalian
                        </button>
                        <a href="<?= BASE_URL ?>transaksi" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>