<div class="main-content">
    <div class="content-area">
        <div class="d-flex justify-between align-center mb-2">
            <div>
                <h2 style="color: var(--dark-color); margin: 0;">
                    <i class="fas fa-file-invoice" style="color: var(--primary-color);"></i> Detail Transaksi
                </h2>
                <small style="color: #6b7280;">Informasi rincian penyewaan kendaraan</small>
            </div>
            <a href="<?= BASE_URL ?>transaksi" class="btn-kembali">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-modern">
            <div class="card-header-purple">
                <span><i class="fas fa-hashtag"></i> <?= $data['transaksi']['kode_transaksi'] ?? '-'; ?></span>
                <span class="badge-status <?= $data['transaksi']['status']; ?>">
                    <?= strtoupper($data['transaksi']['status'] ?? 'PROSES'); ?>
                </span>
            </div>
            
            <div class="card-body-content">
                <div class="info-grid-modern">
                    <div class="info-col">
                        <div class="info-item-modern">
                            <label>Nama Pelanggan</label>
                            <p><?= $data['transaksi']['nama_pelanggan'] ?? '-'; ?></p>
                        </div>
                        <div class="info-item-modern">
                            <label>Kendaraan</label>
                            <p><?= $data['transaksi']['nama_kendaraan'] ?? '-'; ?></p>
                            <span class="plat-badge"><?= $data['transaksi']['plat_nomor'] ?? '-'; ?></span>
                        </div>
                    </div>

                    <div class="info-col">
                        <div class="info-item-modern">
                            <label>Tanggal Sewa</label>
                            <p><i class="far fa-calendar-alt"></i> <?= date('d M Y', strtotime($data['transaksi']['tanggal_sewa'])); ?></p>
                        </div>
                        <div class="info-item-modern">
                            <label>Rencana Kembali</label>
                            <p><i class="far fa-calendar-check"></i> <?= date('d M Y', strtotime($data['transaksi']['tanggal_kembali_rencana'])); ?></p>
                        </div>
                    </div>
                </div>

                <div class="divider-dashed"></div>

                <div class="price-summary-box">
                    <div class="price-row">
                        <span>Biaya Sewa Kendaraan</span>
                        <span>Rp <?= number_format($data['transaksi']['total_biaya'] ?? 0, 0, ',', '.'); ?></span>
                    </div>
                    <div class="price-row text-danger">
                        <span>Denda Keterlambatan</span>
                        <span>Rp <?= number_format($data['transaksi']['denda'] ?? 0, 0, ',', '.'); ?></span>
                    </div>
                    <div class="price-row total-row">
                        <span>Total Pembayaran</span>
                        <span class="final-amount">Rp <?= number_format(($data['transaksi']['total_biaya'] + ($data['transaksi']['denda'] ?? 0)), 0, ',', '.'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Reset Container agar pas di tengah sisa layar */
.main-content {
    margin-left: 260px; /* Menyesuaikan lebar sidebar Anda */
    padding: 20px;
}

.btn-kembali {
    background: #fff;
    border: 1.5px solid var(--border-color);
    color: var(--text-color);
    padding: 8px 16px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s;
}

.btn-kembali:hover {
    background: #f3f4f6;
    color: var(--primary-color);
    border-color: var(--primary-color);
}

/* Card Modern Design */
.card-modern {
    background: white;
    border-radius: 16px;
    box-shadow: var(--shadow-lg);
    overflow: hidden;
    margin-top: 20px;
    border: 1px solid var(--border-color);
}

.card-header-purple {
    background: linear-gradient(135deg, var(--primary-color) 0%, #7c3aed 100%);
    padding: 15px 25px;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-weight: 700;
}

.card-body-content {
    padding: 30px;
}

.info-grid-modern {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
}

.info-item-modern {
    margin-bottom: 20px;
}

.info-item-modern label {
    display: block;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    color: #9ca3af;
    margin-bottom: 6px;
}

.info-item-modern p {
    font-size: 16px;
    color: var(--dark-color);
    font-weight: 600;
    margin: 0;
}

.plat-badge {
    display: inline-block;
    background: #f3f4f6;
    border: 1px solid #d1d5db;
    padding: 2px 10px;
    border-radius: 6px;
    font-family: monospace;
    font-weight: bold;
    margin-top: 5px;
}

.divider-dashed {
    border-top: 2px dashed #e5e7eb;
    margin: 20px 0;
}

.price-summary-box {
    background: #f9fafb;
    padding: 20px;
    border-radius: 12px;
}

.price-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
    font-size: 14px;
    color: #4b5563;
}

.total-row {
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid #e5e7eb;
    color: var(--dark-color) !important;
}

.total-row span {
    font-weight: 700;
    font-size: 16px;
}

.final-amount {
    color: var(--primary-color);
    font-size: 20px !important;
}

.badge-status {
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 800;
}

.badge-status.selesai { background: #d1fae5; color: #065f46; }
.badge-status.aktif { background: #fef3c7; color: #92400e; }

.text-danger { color: var(--danger-color); }
</style>