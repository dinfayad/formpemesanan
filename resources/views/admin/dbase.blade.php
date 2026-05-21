<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cek Database</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            min-height: 100vh;
        }

        /* ── TOPBAR ── */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 24px;
            background: #f5f7fb;
        }

        .topbar-right { display: flex; gap: 10px; }

        .btn {
            padding: 8px 18px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            border: none;
            text-decoration: none;
            display: inline-block;
        }
        .btn-back    { background: #1e3a8a; color: #fff; }
        .btn-back:hover { background: #2d4eaa; }
        .btn-db      { background: #64748b; color: #fff; }
        .btn-db:hover { background: #475569; }
        .btn-akun    { background: #0f172a; color: #fff; }
        .btn-akun:hover { background: #1e293b; }
        .btn-submit  { background: #1e3a8a; color: #fff; width: 100%; padding: 11px; font-size: 14px; border-radius: 6px; border: none; font-weight: bold; cursor: pointer; }
        .btn-submit:hover { background: #2d4eaa; }
        .btn-list    { background: #64748b; color: #fff; width: 100%; padding: 11px; font-size: 14px; border-radius: 6px; border: none; font-weight: bold; cursor: pointer; text-align: center; }
        .btn-list:hover { background: #475569; }
        .btn-edit    { background: #f59e0b; color: #fff; padding: 5px 14px; font-size: 13px; border-radius: 5px; border: none; cursor: pointer; font-weight: bold; }
        .btn-hapus   { background: #ef4444; color: #fff; padding: 5px 14px; font-size: 13px; border-radius: 5px; border: none; cursor: pointer; font-weight: bold; }

        /* ── CONTAINER ── */
        .container {
            background: #fff;
            border-radius: 10px;
            padding: 28px 30px;
            width: 90%;
            max-width: 1100px;
            margin: 0 auto 40px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        }

        /* ── DROPDOWN SELECTOR ── */
        .selector-row {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 24px;
        }

        .selector-row label {
            font-weight: bold;
            font-size: 14px;
            color: #334155;
            white-space: nowrap;
        }

        .selector-row select {
            padding: 9px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 14px;
            background: #fff;
            color: #1e293b;
            min-width: 240px;
            cursor: pointer;
        }
        .selector-row select:focus { outline: none; border-color: #1e3a8a; }

        /* ── FORM ── */
        .form-title {
            font-size: 20px;
            font-weight: bold;
            color: #1e3a8a;
            margin-bottom: 20px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 16px;
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: #334155;
            margin-bottom: 6px;
            font-size: 14px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 14px;
            background: #fff;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #1e3a8a;
        }

        .form-group textarea { min-height: 70px; resize: vertical; }

        .form-actions {
            display: flex;
            gap: 10px;
        }

        /* ── DIVIDER ── */
        hr { border: none; border-top: 1px solid #e2e8f0; margin: 28px 0; }

        /* ── TABLE ── */
        .data-title {
            font-size: 18px;
            font-weight: bold;
            color: #1e3a8a;
            margin-bottom: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .total-badge {
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 4px 14px;
            font-size: 13px;
            color: #64748b;
            font-weight: normal;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        thead tr { background: #1e3a8a; }
        th {
            color: #fff;
            padding: 11px 14px;
            text-align: left;
            font-weight: bold;
            font-size: 13px;
        }

        td {
            padding: 11px 14px;
            border-bottom: 1px solid #f1f5f9;
            color: #1e293b;
        }

        tr:last-child td { border-bottom: none; }
        tbody tr:hover td { background: #f8fafc; }

        .action-btns { display: flex; gap: 6px; }

        .empty-msg {
            text-align: center;
            padding: 40px 0;
            color: #94a3b8;
            font-size: 14px;
        }

        /* ── PLACEHOLDER ── */
        .placeholder {
            text-align: center;
            padding: 60px 0;
            color: #94a3b8;
            font-size: 15px;
        }

        /* ── TOAST ── */
        #toast {
            position: fixed;
            bottom: 24px;
            right: 24px;
            background: #22c55e;
            color: #fff;
            padding: 12px 22px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 13px;
            opacity: 0;
            transform: translateY(8px);
            transition: all 0.3s;
            pointer-events: none;
            z-index: 999;
        }
        #toast.show { opacity: 1; transform: translateY(0); }
    </style>
</head>
<body>

{{-- TOPBAR --}}
<div class="topbar">
    <a href="/dashboard" class="btn btn-back">← Kembali ke Dashboard</a>
    <div class="topbar-right">
        <a href="#" class="btn btn-db">Cek DATABASE</a>
        <a href="/akun-list" class="btn btn-akun">Cek Akun</a>
    </div>
</div>

<div class="container">

    {{-- DROPDOWN PILIH TABEL --}}
    <div class="selector-row">
        <label>Pilih Tabel:</label>
        <select id="tableSelect" onchange="switchTable(this.value)">
            <option value="">— Pilih Tabel —</option>
        </select>
    </div>

    {{-- PLACEHOLDER --}}
    <div class="placeholder" id="placeholder">
        Pilih tabel dari dropdown untuk menampilkan form dan data.
    </div>

    {{-- KONTEN DINAMIS --}}
    <div id="mainContent" style="display:none;">

        {{-- FORM --}}
        <div class="form-title" id="formTitle"></div>
        <div class="form-grid" id="formFields"></div>
        <div class="form-actions">
            <button id="submitBtn" class="btn-submit" onclick="submitForm()">Simpan</button>
            <button class="btn-list" onclick="resetForm()">Reset</button>
        </div>

        <hr>

        {{-- TABEL DATA --}}
        <div class="data-title">
            <span id="dataTitle">Data</span>
            <span class="total-badge" id="totalBadge">Total Data: 0</span>
        </div>

        <table id="dataTable">
            <thead id="tableHead"></thead>
            <tbody id="tableBody"></tbody>
        </table>
        <div class="empty-msg" id="emptyMsg" style="display:none;">Belum ada data.</div>

    </div>
</div>

<div id="toast"></div>

<script>
// ─── DEFINISI TABEL ───────────────────────────────────────────────
const TABLES = [
    {
        key: 'harga_kertas',
        label: 'Harga Kertas',
        route: '/harga-kertas',
        fields: [
            { name: 'nama_kertas', label: 'Nama Kertas',  type: 'text',   placeholder: 'e.g. Art Carton 190 gram', required: true },
            { name: 'biaya',       label: 'Biaya (Rp)',   type: 'number', placeholder: '650' },
            { name: 'atribut',     label: 'Atribut',      type: 'number', placeholder: '1 atau 1.3', step: '0.1' },
        ]
    },
    {
        key: 'jenis_laminating',
        label: 'Jenis Laminating',
        route: '/jenis-laminating',
        fields: [
            { name: 'nama_laminating', label: 'Nama Laminating', type: 'text',   placeholder: 'e.g. Doft', required: true },
            { name: 'biaya',           label: 'Biaya (Rp)',      type: 'number', placeholder: '2000' },
            { name: 'tipe',            label: 'Tipe',            type: 'select', options: ['Fix', 'Variable'] },
        ]
    },
    {
        key: 'biaya_lain_lain',
        label: 'Biaya Lain-lain',
        route: '/biaya-lain-lain',
        fields: [
            { name: 'nama',  label: 'Nama',       type: 'text',   placeholder: 'e.g. Potong', required: true },
            { name: 'biaya', label: 'Biaya (Rp)', type: 'number', placeholder: '715' },
            { name: 'tipe',  label: 'Tipe',       type: 'select', options: ['Fix', 'Variable'] },
        ]
    },
    {
        key: 'biaya_cetak_cover',
        label: 'Biaya Cetak Cover',
        route: '/biaya-cetak-cover',
        fields: [
            { name: 'nama_cetak', label: 'Nama Cetak',  type: 'text',   placeholder: 'e.g. 2 MUKA 4/1', required: true },
            { name: 'biaya',      label: 'Biaya (Rp)',  type: 'number', placeholder: '1438' },
            { name: 'kode',       label: 'Kode',        type: 'number', placeholder: '41' },
            { name: 'tipe',       label: 'Tipe',        type: 'select', options: ['Fix', 'Variable'] },
        ]
    },
    {
        key: 'tipe_jilid',
        label: 'Tipe Jilid',
        route: '/tipe-jilid',
        fields: [
            { name: 'nama_jilid', label: 'Nama Jilid',    type: 'text',   placeholder: 'e.g. Lem', required: true },
            { name: 'biaya_a3',   label: 'Biaya A3 (Rp)', type: 'number', placeholder: '2472' },
            { name: 'tipe',       label: 'Tipe',          type: 'select', options: ['Fix', 'Variable'] },
        ]
    },
    {
        key: 'tipe_klik',
        label: 'Tipe Klik',
        route: '/tipe-klik',
        fields: [
            { name: 'nama_klik', label: 'Nama Klik',     type: 'text',   placeholder: 'e.g. BW', required: true },
            { name: 'biaya_a3',  label: 'Biaya A3 (Rp)', type: 'number', placeholder: '88' },
            { name: 'tipe',      label: 'Tipe',          type: 'select', options: ['Fix', 'Variable'] },
        ]
    },
    {
        key: 'biaya_jilid_lem',
        label: 'Biaya Jilid Lem',
        route: '/biaya-jilid-lem',
        fields: [
            { name: 'bahan', label: 'Bahan',       type: 'text',   placeholder: 'e.g. Lem / Mesin / SDM', required: true },
            { name: 'biaya', label: 'Biaya (Rp)',  type: 'number', placeholder: '10' },
        ]
    },
    {
        key: 'daftar_konsumen',
        label: 'Daftar Konsumen',
        route: '/daftar-konsumen',
        fields: [
            { name: 'no',       label: 'No',       type: 'number', placeholder: '1', required: true },
            { name: 'instansi', label: 'Instansi', type: 'text',   placeholder: 'e.g. IPB Press' },
            { name: 'tipe',     label: 'Tipe',     type: 'select', options: ['Fix', 'Variable'] },
        ]
    },
    {
        key: 'potong',
        label: 'Potong',
        route: '/potong',
        fields: [
            { name: 'variabel', label: 'Variabel',   type: 'text',   placeholder: 'Tinggi / Lebar', required: true },
            { name: 'ukuran',   label: 'Ukuran',     type: 'number', placeholder: '7', step: '0.0001' },
            { name: 'satuan',   label: 'Satuan',     type: 'text',   placeholder: 'cm' },
            { name: 'biaya',    label: 'Biaya (Rp)', type: 'number', placeholder: '5000' },
        ]
    },
    {
        key: 'biaya_jilid_spiral',
        label: 'Biaya Jilid Spiral',
        route: '/biaya-jilid-spiral',
        fields: [
            { name: 'bahan', label: 'Bahan',       type: 'text',   placeholder: 'Spiral / Alat / SDM', required: true },
            { name: 'biaya', label: 'Biaya (Rp)',  type: 'number', placeholder: '18000' },
        ]
    },
];

// ─── STATE ────────────────────────────────────────────────────────
let activeTable = null;
let editingId   = null; // null = mode tambah, angka = mode edit

// ─── CSRF TOKEN dari meta Laravel ─────────────────────────────────
function csrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}

// ─── INIT ─────────────────────────────────────────────────────────
(function init() {
    const sel = document.getElementById('tableSelect');
    TABLES.forEach(t => {
        const opt = document.createElement('option');
        opt.value = t.key;
        opt.textContent = t.label;
        sel.appendChild(opt);
    });
})();

// ─── SWITCH TABLE ─────────────────────────────────────────────────
function switchTable(key) {
    if (!key) {
        document.getElementById('placeholder').style.display = 'block';
        document.getElementById('mainContent').style.display = 'none';
        return;
    }
    activeTable = TABLES.find(t => t.key === key);
    editingId   = null;
    document.getElementById('placeholder').style.display  = 'none';
    document.getElementById('mainContent').style.display  = 'block';
    document.getElementById('formTitle').textContent       = 'Form ' + activeTable.label;
    document.getElementById('dataTitle').textContent       = 'Data ' + activeTable.label;
    document.getElementById('submitBtn').textContent       = 'Simpan';
    buildForm(activeTable);
    fetchTableData();
}

// ─── BUILD FORM ───────────────────────────────────────────────────
function buildForm(t) {
    const c = document.getElementById('formFields');
    c.innerHTML = '';
    t.fields.forEach(f => {
        const div = document.createElement('div');
        div.className = 'form-group';
        let input = '';
        if (f.type === 'select') {
            const opts = f.options.map(o => `<option value="${o}">${o}</option>`).join('');
            input = `<select name="${f.name}" id="field-${f.name}">${opts}</select>`;
        } else {
            const step = f.step ? `step="${f.step}"` : '';
            input = `<input type="${f.type}" name="${f.name}" id="field-${f.name}" placeholder="${f.placeholder || ''}" ${step}>`;
        }
        const req = f.required ? ' <span style="color:red">*</span>' : '';
        div.innerHTML = `<label>${f.label}${req}</label>${input}`;
        c.appendChild(div);
    });
}

// ─── AMBIL DATA DARI SERVER ────────────────────────────────────────
function fetchTableData() {
    if (!activeTable) return;

    document.getElementById('tableBody').innerHTML =
        `<tr><td colspan="99" style="text-align:center;color:#94a3b8;padding:20px;">Memuat data...</td></tr>`;
    document.getElementById('emptyMsg').style.display = 'none';

    fetch(activeTable.route, {
        headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': csrfToken() }
    })
    .then(r => r.json())
    .then(data => renderTable(data))
    .catch(() => showToast('Gagal memuat data dari server!', true));
}

// ─── SUBMIT (STORE atau UPDATE) ───────────────────────────────────
function submitForm() {
    if (!activeTable) return;

    const payload = {};
    let valid = true;

    activeTable.fields.forEach(f => {
        const el = document.getElementById('field-' + f.name);
        if (f.required && !el.value.trim()) {
            el.style.borderColor = 'red';
            valid = false;
        } else {
            el.style.borderColor = '';
            payload[f.name] = el.value;
        }
    });

    if (!valid) return;

    const isEdit  = editingId !== null;
    const url     = isEdit ? `${activeTable.route}/${editingId}` : activeTable.route;
    const method  = isEdit ? 'PUT' : 'POST';

    const btn = document.getElementById('submitBtn');
    btn.textContent = 'Menyimpan...';
    btn.disabled    = true;

    fetch(url, {
        method,
        headers: {
            'Content-Type': 'application/json',
            'Accept':        'application/json',
            'X-CSRF-TOKEN':  csrfToken(),
        },
        body: JSON.stringify(payload)
    })
    .then(async r => {
        const data = await r.json();
        if (!r.ok) throw data;
        return data;
    })
    .then(() => {
        showToast(isEdit ? 'Data berhasil diupdate!' : 'Data berhasil disimpan!');
        resetForm();
        fetchTableData();
    })
    .catch(err => {
        // Tampilkan error validasi Laravel jika ada
        if (err.errors) {
            Object.entries(err.errors).forEach(([field, messages]) => {
                const el = document.getElementById('field-' + field);
                if (el) { el.style.borderColor = 'red'; el.title = messages[0]; }
            });
        }
        showToast('Gagal menyimpan: ' + (err.message || 'Error server'), true);
    })
    .finally(() => {
        btn.textContent = isEdit ? 'Update' : 'Simpan';
        btn.disabled    = false;
    });
}

function resetForm() {
    if (!activeTable) return;
    editingId = null;
    document.getElementById('submitBtn').textContent = 'Simpan';
    activeTable.fields.forEach(f => {
        const el = document.getElementById('field-' + f.name);
        if (el) { el.value = ''; el.style.borderColor = ''; el.title = ''; }
    });
}

// ─── RENDER TABLE ─────────────────────────────────────────────────
function renderTable(rows) {
    document.getElementById('totalBadge').textContent = 'Total Data: ' + rows.length;

    const head = document.getElementById('tableHead');
    head.innerHTML = '<tr><th>No</th>' +
        activeTable.fields.map(f => `<th>${f.label}</th>`).join('') +
        '<th>Aksi</th></tr>';

    const body  = document.getElementById('tableBody');
    const empty = document.getElementById('emptyMsg');

    if (rows.length === 0) {
        body.innerHTML = '';
        empty.style.display = 'block';
        return;
    }
    empty.style.display = 'none';
    body.innerHTML = rows.map((row, i) => {
        const cells = activeTable.fields.map(f => `<td>${row[f.name] ?? '-'}</td>`).join('');
        return `<tr>
            <td>${i + 1}</td>
            ${cells}
            <td><div class="action-btns">
                <button class="btn-edit"  onclick="editRow(${row.id})">Edit</button>
                <button class="btn-hapus" onclick="deleteRow(${row.id})">Hapus</button>
            </div></td>
        </tr>`;
    }).join('');
}

// ─── EDIT ─────────────────────────────────────────────────────────
function editRow(id) {
    fetch(`${activeTable.route}/${id}`, {
        headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': csrfToken() }
    })
    .then(r => r.json())
    .then(row => {
        editingId = id;
        activeTable.fields.forEach(f => {
            const el = document.getElementById('field-' + f.name);
            if (el) el.value = row[f.name] ?? '';
        });
        document.getElementById('submitBtn').textContent = 'Update';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    })
    .catch(() => showToast('Gagal mengambil data!', true));
}

// ─── DELETE ───────────────────────────────────────────────────────
function deleteRow(id) {
    if (!confirm('Hapus data ini?')) return;

    fetch(`${activeTable.route}/${id}`, {
        method: 'DELETE',
        headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': csrfToken() }
    })
    .then(r => r.json())
    .then(() => {
        showToast('Data berhasil dihapus!');
        fetchTableData();
    })
    .catch(() => showToast('Gagal menghapus data!', true));
}

// ─── TOAST ────────────────────────────────────────────────────────
function showToast(msg, isError = false) {
    const t = document.getElementById('toast');
    t.textContent         = (isError ? '✗ ' : '✓ ') + msg;
    t.style.background    = isError ? '#ef4444' : '#22c55e';
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 3000);
}
</script>
</body>
</html>