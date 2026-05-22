<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --navy: #1e3a8a;
            --navy-dark: #162c6e;
            --navy-light: #2d4faa;
            --accent: #3b82f6;
            --gray-bg: #f1f5f9;
            --gray-border: #cbd5e1;
            --gray-text: #64748b;
            --dark: #1e293b;
            --white: #ffffff;
            --section-bg: #1e3a8a;
            --input-focus: #3b82f6;
            --danger: #ef4444;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--gray-bg);
            min-height: 100vh;
            color: var(--dark);
        }

        /* TOP NAV */
        .topbar {
            background: var(--white);
            border-bottom: 1px solid var(--gray-border);
            padding: 12px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 4px rgba(0,0,0,0.06);
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: var(--navy);
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.18s;
            border: none;
            cursor: pointer;
        }
        .btn-back:hover { background: var(--navy-light); }

        .topbar-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--dark);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: transparent;
            color: var(--navy);
            border: 1.5px solid var(--navy);
            padding: 7px 15px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.18s;
            text-decoration: none;
        }
        .btn-outline:hover { background: var(--navy); color: white; }

        /* PAGE WRAPPER */
        .page {
            max-width: 900px;
            margin: 36px auto;
            padding: 0 20px 60px;
        }

        /* CARD */
        .card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(30,58,138,0.08);
            overflow: hidden;
        }

        .card-header {
            padding: 28px 32px 20px;
            border-bottom: 1px solid var(--gray-border);
        }

        .card-header h2 {
            font-size: 22px;
            font-weight: 700;
            color: var(--navy);
        }

        .card-header p {
            font-size: 13px;
            color: var(--gray-text);
            margin-top: 3px;
        }

        .card-body {
            padding: 28px 32px;
        }

        /* SECTION TITLE */
        .section-title {
            background: var(--navy);
            color: white;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 8px 14px;
            border-radius: 7px;
            margin: 28px 0 18px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* FORM GRID */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px 24px;
        }

        .form-grid.single { grid-template-columns: 1fr; }
        .span-2 { grid-column: span 2; }

        .field {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        label {
            font-size: 12px;
            font-weight: 600;
            color: var(--gray-text);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 10px 13px;
            border: 1.5px solid var(--gray-border);
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            color: var(--dark);
            background: var(--white);
            outline: none;
            transition: border-color 0.18s, box-shadow 0.18s;
            appearance: none;
        }

        input:focus, select:focus, textarea:focus {
            border-color: var(--input-focus);
            box-shadow: 0 0 0 3px rgba(59,130,246,0.12);
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        /* Inline row (e.g. ukuran: 15 x 23 cm) */
        .inline-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .inline-group input { flex: 1; }
        .inline-group .sep {
            font-size: 14px;
            font-weight: 700;
            color: var(--gray-text);
            flex-shrink: 0;
        }
        .inline-group .unit {
            font-size: 13px;
            color: var(--gray-text);
            flex-shrink: 0;
        }

        /* Konsumen row: 2 inputs side by side */
        .konsumen-row {
            display: flex;
            gap: 8px;
        }
        .konsumen-row input { flex: 1; }

        /* SELECT styling */
        select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2364748b' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
            cursor: pointer;
        }

        /* DIVIDER */
        .divider {
            border: none;
            border-top: 1px solid var(--gray-border);
            margin: 24px 0;
        }

        /* ACTION BUTTONS */
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid var(--gray-border);
        }

        .btn-primary {
            background: var(--navy);
            color: white;
            border: none;
            padding: 11px 28px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            font-family: inherit;
            transition: background 0.18s, transform 0.1s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-primary:hover { background: var(--navy-light); }
        .btn-primary:active { transform: scale(0.98); }

        .btn-secondary {
            background: #f8fafc;
            color: var(--navy);
            border: 1.5px solid var(--gray-border);
            padding: 11px 24px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            font-family: inherit;
            transition: all 0.18s;
        }
        .btn-secondary:hover { border-color: var(--navy); background: #f0f4ff; }

        /* Badge style for konsumen type */
        .badge-group {
            display: flex;
            gap: 8px;
        }
        .badge-opt {
            padding: 9px 14px;
            border: 1.5px solid var(--gray-border);
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            color: var(--gray-text);
            background: white;
            transition: all 0.15s;
            flex: 1;
            text-align: center;
        }
        .badge-opt.active, .badge-opt:hover {
            border-color: var(--navy);
            color: var(--navy);
            background: #eef2ff;
        }

        @media (max-width: 640px) {
            .form-grid { grid-template-columns: 1fr; }
            .span-2 { grid-column: span 1; }
            .card-body { padding: 20px 16px; }
            .page { padding: 0 12px 40px; }
        }
    </style>
</head>
<body>

<!-- TOP NAV -->
<div class="topbar">
    <div class="topbar-left">
        <a href="/dashboard" class="btn-back">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
            Kembali ke Dashboard
        </a>
        <span class="topbar-title">Form Pemesanan</span>
    </div>
    <div class="topbar-right">
        <a href="/listpending" class="btn-outline">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
            List Pending
        </a>
    </div>
</div>

<!-- PAGE -->
<div class="page">
    <div class="card">
        <div class="card-header">
            <h2>Form Pemesanan Buku</h2>
            <p>Rev 4.3 — Isi semua kolom yang diperlukan sebelum menyimpan.</p>
        </div>

        <div class="card-body">

            <!-- KONSUMEN -->
            <div class="section-title">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                Data Konsumen
            </div>

            <div class="form-grid">
                <div class="field">
                    <label>Tipe Konsumen</label>
                    <div class="badge-group">
                        <div class="badge-opt active">Lama</div>
                        <div class="badge-opt">Baru</div>
                        <div class="badge-opt">IPB</div>
                    </div>
                </div>

                <div class="field">
                    <label>Nama</label>
                    <input type="text" placeholder="Nama konsumen">
                </div>

                <div class="field span-2">
                    <label>Alamat</label>
                    <input type="text" placeholder="Alamat lengkap">
                </div>

                <div class="field">
                    <label>No. Tlp / HP</label>
                    <input type="tel" placeholder="08xx-xxxx-xxxx">
                </div>

                <div class="field">
                    <label>Email</label>
                    <input type="email" placeholder="email@domain.com">
                </div>

                <div class="field">
                    <label>Penanggung Jawab</label>
                    <input type="text" value="Penanggung Jawab" placeholder="Nama penanggung jawab">
                </div>

                <div class="field">
                    <label>No Telp (Instansi)</label>
                    <input type="tel" placeholder="Nomor telepon instansi">
                </div>
            </div>

            <!-- BUKU -->
            <div class="section-title">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                Data Buku
            </div>

            <div class="form-grid">
                <div class="field span-2">
                    <label>Judul Buku</label>
                    <input type="text" placeholder="Judul buku">
                </div>

                <div class="field">
                    <label>Penulis</label>
                    <input type="text" placeholder="Nama penulis">
                </div>

                <div class="field">
                    <label>Kategori</label>
                    <input type="text" placeholder="Kategori buku">
                </div>

                <div class="field">
                    <label>Tahun Terbit</label>
                    <input type="text" placeholder="2024">
                </div>

                <div class="field">
                    <label>Bulan Terbit</label>
                    <input type="text" placeholder="Januari">
                </div>

                <div class="field">
                    <label>Cetakan ke</label>
                    <input type="text" " placeholder="1">
                </div>

                <div class="field">
                    <label>Edisi ke</label>
                    <input type="text" placeholder="—">
                </div>

                <div class="field">
                    <label>ISBN</label>
                    <input type="text" placeholder="978-xxx-xxx-xxx-x">
                </div>

                <div class="field">
                    <label>Tahun</label>
                    <input type="text" placeholder="—">
                </div>

                <div class="field span-2">
                    <label>Proses Cetak</label>
                    <select>
                        <option value="" disabled selected>— Pilih proses cetak —</option>
                        <option value="cetak_buku">Cetak Buku</option>
                        <option value="cetak_ulang">Cetak Ulang</option>
                    </select>
                </div>
            </div>

            <!-- SPESIFIKASI -->
            <div class="section-title">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93l-1.41 1.41M4.93 4.93l1.41 1.41M4.93 19.07l1.41-1.41M19.07 19.07l-1.41-1.41M12 2v2M12 20v2M2 12h2M20 12h2"/></svg>
                Spesifikasi
            </div>

            <div class="form-grid">
                <div class="field">
                    <label>Ukuran (cm)</label>
                    <div class="inline-group">
                        <input type="text" placeholder="0">
                        <span class="sep">×</span>
                        <input type="text" placeholder="0">
                        <span class="unit">cm</span>
                    </div>
                </div>

                <div class="field">
                    <label>Halaman</label>
                    <div class="inline-group">
                        <span class="sep" style="font-size:12px;font-weight:600;color:var(--gray-text)">BW</span>
                        <input type="text" placeholder="0" style="max-width:56px">
                        <span class="sep" style="font-size:12px;font-weight:600;color:var(--gray-text)">FC</span>
                        <input type="text" placeholder="0" style="max-width:56px">
                    </div>
                </div>

                <div class="field">
                    <label>Cover</label>
                    <input type="text" placeholder="Spesifikasi cover">
                </div>

                <div class="field">
                    <label>Keterangan FC</label>
                    <input type="text" placeholder="—">
                </div>

                <div class="field">
                    <label>Konten</label>
                    <input type="text" placeholder="Spesifikasi konten">
                </div>
            </div>

            <!-- DETAIL FINISHING -->
            <div class="section-title" style="margin-top:20px">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                Detail Finishing
            </div>

            <div class="form-grid">
                <div class="field">
                    <label>Jilid</label>
                    <select>
                        <option value="" disabled selected>— Pilih jenis jilid —</option>
                    </select>
                </div>

                <div class="field">
                    <label>Spot UV</label>
                    <select>
                        <option>TIDAK</option>
                        <option>YA</option>
                    </select>
                </div>

                <div class="field">
                    <label>Shrink</label>
                    <select>
                        <option>YA</option>
                        <option>TIDAK</option>
                    </select>
                </div>

                <div class="field">
                    <label>Emboss</label>
                    <select>
                        <option>TIDAK</option>
                        <option>YA</option>
                    </select>
                </div>

                <div class="field">
                    <label>Packing</label>
                    <select>
                        <option>YA</option>
                        <option>TIDAK</option>
                    </select>
                </div>

                <div class="field">
                    <label>Poly / Hotprint</label>
                    <select>
                        <option>TIDAK</option>
                        <option>YA</option>
                    </select>
                </div>
            </div>

            <!-- TOTAL -->
            <div class="section-title" style="margin-top:20px">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                Total
            </div>

            <div class="form-grid">
                <div class="field">
                    <label>Produksi</label>
                    <div class="inline-group">
                        <span class="unit" style="flex-shrink:0;font-weight:600;color:var(--dark)">Rp</span>
                        <input type="text" placeholder="0">
                    </div>
                </div>

                <div class="field">
                    <label>Penawaran</label>
                    <select>
                        <option value="" disabled selected>— Pilih penawaran —</option>
                        <option>Langsung</option>
                        <option>Via Email</option>
                        <option>Via Telepon</option>
                    </select>
                </div>

                <div class="field">
                    <label>Harga Deal</label>
                    <div class="inline-group">
                        <span class="unit" style="flex-shrink:0;font-weight:600;color:var(--dark)">Rp</span>
                        <input type="text" placeholder="0">
                    </div>
                </div>

                <div class="field">
                    <label>Oplag</label>
                    <div class="inline-group">
                        <input type="text" placeholder="1">
                        <span class="unit">Eks</span>
                        <span class="unit" style="font-weight:600;color:var(--dark);white-space:nowrap">Total Harga</span>
                        <span class="unit" style="font-weight:600;color:var(--dark)">Rp</span>
                        <input type="text" placeholder="0">
                    </div>
                </div>

                <div class="field">
                    <label>Pembayaran Dimuka</label>
                    <div class="inline-group">
                        <span class="unit" style="flex-shrink:0;font-weight:600;color:var(--dark)">Rp</span>
                        <input type="text" placeholder="0">
                    </div>
                </div>

                <div class="field">
                    <label>Tanggal Pembayaran Dimuka</label>
                    <div class="inline-group">
                        <input type="text" placeholder="dd/mm/yyyy">
                        <span class="unit" style="white-space:nowrap">Transfer</span>
                    </div>
                </div>

                <div class="field">
                    <label>Pelunasan</label>
                    <div class="inline-group">
                        <span class="unit" style="flex-shrink:0;font-weight:600;color:var(--dark)">Rp</span>
                        <input type="text" placeholder="0">
                    </div>
                </div>

                <div class="field">
                    <label>Tanggal Pelunasan</label>
                    <div class="inline-group">
                        <input type="text" placeholder="dd/mm/yyyy">
                        <span class="unit" style="white-space:nowrap">Transfer</span>
                    </div>
                </div>

                <div class="field">
                    <label>Permintaan Selesai</label>
                    <input type="text" placeholder="—">
                </div>

                <div class="field">
                    <label>Dikirim ke</label>
                    <input type="text" placeholder="Alamat pengiriman">
                </div>

                <div class="field">
                    <label>Harga Jual</label>
                    <div class="inline-group">
                        <span class="unit" style="flex-shrink:0;font-weight:600;color:var(--dark)">Rp</span>
                        <input type="text" placeholder="0">
                    </div>
                </div>
            </div>

            <!-- CATATAN -->
            <div class="section-title">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                Catatan
            </div>

            <div class="form-grid single">
                <div class="field">
                    <label>Catatan Tambahan</label>
                    <textarea placeholder="Tulis catatan tambahan di sini..."></textarea>
                </div>
            </div>

            <!-- ACTIONS -->
            <div class="form-actions">
                <button class="btn-secondary" type="button">Batal</button>
                <div style="display:flex;gap:10px">
                    <button class="btn-primary" type="button">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                        Simpan Pemesanan
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // Badge toggle for Tipe Konsumen
    document.querySelectorAll('.badge-opt').forEach(btn => {
        btn.addEventListener('click', function() {
            this.closest('.badge-group').querySelectorAll('.badge-opt').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>

</body>
</html>