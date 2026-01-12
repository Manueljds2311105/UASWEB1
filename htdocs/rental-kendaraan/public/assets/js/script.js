// Format Rupiah
function formatRupiah(input) {
    let value = input.value.replace(/[^0-9]/g, '');
    input.value = new Intl.NumberFormat('id-ID').format(value);
}

// Calculate total biaya sewa
function hitungTotal() {
    const hargaInput = document.getElementById('harga_sewa');
    const lamaInput = document.getElementById('lama_sewa');
    const totalInput = document.getElementById('total_biaya');
    
    if(hargaInput && lamaInput && totalInput) {
        const harga = hargaInput.value.replace(/[^0-9]/g, '');
        const lama = lamaInput.value;
        
        if(harga && lama) {
            const total = parseInt(harga) * parseInt(lama);
            totalInput.value = new Intl.NumberFormat('id-ID').format(total);
            
            // Update tanggal kembali
            updateTanggalKembali();
        }
    }
}

// Update tanggal kembali otomatis
function updateTanggalKembali() {
    const tanggalSewaInput = document.getElementById('tanggal_sewa');
    const lamaSewaInput = document.getElementById('lama_sewa');
    const tanggalKembaliDisplay = document.getElementById('tanggal_kembali_display');
    
    if(tanggalSewaInput && lamaSewaInput && tanggalKembaliDisplay) {
        const tanggalSewa = new Date(tanggalSewaInput.value);
        const lamaSewa = parseInt(lamaSewaInput.value);
        
        if(!isNaN(tanggalSewa) && !isNaN(lamaSewa)) {
            tanggalSewa.setDate(tanggalSewa.getDate() + lamaSewa);
            const day = String(tanggalSewa.getDate()).padStart(2, '0');
            const month = String(tanggalSewa.getMonth() + 1).padStart(2, '0');
            const year = tanggalSewa.getFullYear();
            
            tanggalKembaliDisplay.textContent = `${day}/${month}/${year}`;
        }
    }
}

// Load harga kendaraan when selected
function loadHargaKendaraan(selectElement) {
    const selectedOption = selectElement.options[selectElement.selectedIndex];
    const harga = selectedOption.getAttribute('data-harga');
    const hargaInput = document.getElementById('harga_sewa');
    
    if(hargaInput && harga) {
        hargaInput.value = new Intl.NumberFormat('id-ID').format(harga);
        hitungTotal();
    }
}

// Calculate denda
function hitungDenda() {
    const tanggalRencanaInput = document.getElementById('tanggal_kembali_rencana');
    const tanggalAktualInput = document.getElementById('tanggal_kembali_aktual');
    const hargaSewaInput = document.getElementById('harga_sewa_perhari');
    const dendaDisplay = document.getElementById('denda_display');
    const dendaInput = document.getElementById('denda_value');
    
    if(tanggalRencanaInput && tanggalAktualInput && hargaSewaInput) {
        const tanggalRencana = new Date(tanggalRencanaInput.value);
        const tanggalAktual = new Date(tanggalAktualInput.value);
        const hargaSewa = parseFloat(hargaSewaInput.value);
        
        const diffTime = tanggalAktual - tanggalRencana;
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        
        if(diffDays > 0) {
            const tarifDenda = hargaSewa * 0.1; // 10% dari harga sewa
            const totalDenda = tarifDenda * diffDays;
            
            if(dendaDisplay) {
                dendaDisplay.innerHTML = `
                    <div class="alert alert-warning">
                        <strong>Terlambat ${diffDays} hari</strong><br>
                        Tarif Denda: Rp ${new Intl.NumberFormat('id-ID').format(tarifDenda)}/hari<br>
                        <strong>Total Denda: Rp ${new Intl.NumberFormat('id-ID').format(totalDenda)}</strong>
                    </div>
                `;
            }
            
            if(dendaInput) {
                dendaInput.value = totalDenda;
            }
        } else {
            if(dendaDisplay) {
                dendaDisplay.innerHTML = '<div class="alert alert-success">Tidak ada keterlambatan</div>';
            }
            if(dendaInput) {
                dendaInput.value = 0;
            }
        }
    }
}

// Confirmation before delete
function confirmDelete(message) {
    return confirm(message || 'Yakin ingin menghapus data ini?');
}

// Auto hide alerts
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 5000);
    });
    
    // Set minimum date for date inputs
    const dateInputs = document.querySelectorAll('input[type="date"]');
    const today = new Date().toISOString().split('T')[0];
    dateInputs.forEach(input => {
        if(input.id === 'tanggal_sewa' || input.id === 'tanggal_kembali_aktual') {
            input.setAttribute('min', today);
        }
    });
});

// Print function
function printReport() {
    window.print();
}

// Mobile sidebar toggle
function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    if(sidebar) {
        sidebar.classList.toggle('active');
    }
}