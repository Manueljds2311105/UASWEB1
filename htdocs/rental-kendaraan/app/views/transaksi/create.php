<div class="main-content">
    <div class="topbar">
        <div class="topbar-left"><h4>Transaksi Sewa Baru</h4></div>
        <!-- User info -->
    </div>
    
    <div class="content-area">
        <div class="card">
            <div class="card-header">
                <h3>Form Transaksi Sewa</h3>
            </div>
            
            <div class="card-body">
                <form method="POST" action="<?= BASE_URL ?>transaksi/create">
                    <div class="form-group">
                        <label>Kode Transaksi</label>
                        <input type="text" value="<?= $kode ?>" readonly class="form-control">
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label>Pelanggan *</label>
                            <select name="id_pelanggan" class="form-control" required>
                                <option value="">Pilih Pelanggan</option>
                                <?php foreach($pelanggan as $p): ?>
                                <option value="<?= $p['id'] ?>">
                                    <?= $p['nama_lengkap'] ?> (<?= $p['kode_pelanggan'] ?>)
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Kendaraan *</label>
                            <select name="id_kendaraan" class="form-control" required onchange="loadHargaKendaraan(this)">
                                <option value="">Pilih Kendaraan</option>
                                <?php foreach($kendaraan as $k): ?>
                                <option value="<?= $k['id'] ?>" data-harga="<?= $k['harga_sewa_perhari'] ?>">
                                    <?= $k['nama_kendaraan'] ?> - <?= $k['plat_nomor'] ?> (Rp <?= number_format($k['harga_sewa_perhari'], 0, ',', '.') ?>)
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label>Tanggal Sewa *</label>
                            <input type="date" name="tanggal_sewa" id="tanggal_sewa" class="form-control" required onchange="hitungTotal()">
                        </div>
                        
                        <div class="form-group">
                            <label>Lama Sewa (Hari) *</label>
                            <input type="number" name="lama_sewa" id="lama_sewa" class="form-control" min="1" required oninput="hitungTotal()">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label>Harga Sewa/Hari</label>
                            <input type="text" id="harga_sewa" class="form-control" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label>Total Biaya</label>
                            <input type="text" name="total_biaya" id="total_biaya" class="form-control" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Tanggal Kembali Rencana</label>
                        <div id="tanggal_kembali_display" style="padding: 10px; background: #f3f4f6; border-radius: 8px;">
                            -
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Catatan</label>
                        <textarea name="catatan" class="form-control" rows="3"></textarea>
                    </div>
                    
                    <div style="margin-top: 30px; display: flex; gap: 10px;">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Transaksi
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