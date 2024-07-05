<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPTD Kelas III Kalimantan Utara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #f0f0f0;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 16.666667%;
            /* Sesuai dengan lebar col-md-2 */
            background-color: #fff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            z-index: 1000;
        }

        .main-content {
            margin-left: 16.666667%;
            /* Sesuai dengan lebar sidebar */
            background-color: #fff;
            min-height: 100vh;
        }

        .header {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
        }

        .logo {
            max-width: 50px;
            margin-right: 10px;
        }

        .table-container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
            color: rgb(0, 0, 0);
            padding: 20px;
            margin-top: 20px;
        }

        .table-container2 {
            background-color: #343a40;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
            color: white;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-3">
                <div class="d-flex align-items-center mb-4">
                    <img src="logo/logo dishub.png" alt="Logo" class="logo">
                    <div class="header-title">
                        <strong>BPTD Kelas III<br>Kalimantan Utara</strong>
                    </div>
                </div>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" id="jadwal-kapal">
                        <i class="fas fa-calendar-alt me-2"></i> Manajemen Jadwal Kapal
                    </a>
                    <a href="#" class="list-group-item list-group-item-action" id="data-kapal">
                        <i class="fas fa-ship me-2"></i> Manajemen Data Kapal
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content p-0">
                <div class="header">
                    <h2 class="text-center m-0">SELAMAT DATANG</h2>
                </div>
                <div class="container mt-4">
                    <!-- Jadwal Kapal Content -->
                    <div id="jadwal-kapal-content" style="display: none;">
                        <h3><i class="fas fa-calendar-alt me-2"></i> Manajemen Jadwal Kapal</h3>
                        <div class="table-container">
                            <button class="btn btn-primary" id="tambah-data-jadwal"><i class="fas fa-plus"></i> Tambah Data</button>
                            <button class="btn btn-secondary" onclick="window.location.href='cetak-data.php'">
                                <i class="fas fa-print"></i> Cetak Data
                            </button>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kapal</th>
                                    <th>Tanggal Tiba</th>
                                    <th>Tanggal Tolak</th>
                                    <th>Pelabuhan Asal</th>
                                    <th>Pelabuhan Tujuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tabel-jadwal-kapal">
                                <?php include 'fetch-jadwal-kapal.php'; ?>
                                <?php if (empty($data)) : ?>
                                    <tr>
                                        <td colspan=" 5">
                                        </td>
                                    </tr>
                                <?php else : ?>
                                    <?php foreach ($data as $row) : ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($row['NO']); ?></td>
                                            <td><?php echo htmlspecialchars($row['NAMA KAPAL']); ?></td>
                                            <td><?php echo htmlspecialchars($row['TANGGAL TIBA']); ?></td>
                                            <td><?php echo htmlspecialchars($row['TANGGAL TOLAK']); ?></td>
                                            <td><?php echo htmlspecialchars($row['PELABUHAN ASAL']); ?></td>
                                            <td><?php echo htmlspecialchars($row['PELABUHAN TUJUAN']); ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-info" onclick="location.href='edit-jadwal-kapal.php?No=<?php echo urlencode($row['NO']); ?>'">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger" onclick="deleteJadwal('<?php echo urlencode($row['NO']); ?>')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Data Kapal Content -->
                    <div id="data-kapal-content" style="display: none;">
                        <h3><i class="fas fa-ship me-2"></i> Manajemen Data Kapal</h3>

                        <div class="table-container">
                            <button class="btn btn-primary mb-3" id="tambah-data-kapal">
                                <i class="fas fa-plus"></i> Tambah Data
                            </button>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kapal</th>
                                        <th>GT</th>
                                        <th>Bendera</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tabel-kapal">
                                    <?php include 'fetch-data-kapal.php'; ?>
                                    <?php if (empty($data)) : ?>
                                        <tr>
                                            <td colspan="5"></td>
                                        </tr>
                                    <?php else : ?>
                                        <?php foreach ($data as $row) : ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($row['NO']); ?></td>
                                                <td><?php echo htmlspecialchars($row['NAMA KAPAL']); ?></td>
                                                <td><?php echo htmlspecialchars($row['GT']); ?></td>
                                                <td><?php echo htmlspecialchars($row['BENDERA']); ?></td>
                                                <td>
                                                    <!-- <button class="btn btn-sm btn-info" onclick="editData('<?php echo urlencode($row['NO']); ?>')">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-danger" onclick="deleteData('<?php echo urlencode($row['NO']); ?>')">
                                                        <i class="fas fa-trash"></i>
                                                    </button> -->
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Registrasi Kedatangan/Keberangkatan Kapal Content -->
                    <div id="registrasi-kapal-content" style="display: none;">
                        <div class="container mt-4">
                            <h3 id="form-title"></h3>
                            <form id="jadwal-kapal-form">
                        </div>
                        <div class="form-container p-4">
                            <form action="save-spb.php" method="POST">
                                <input type="hidden" name="No" id="No">
                                <div class="mb-3 row">
                                    <label for="noCetakSPB" class="col-sm-3 col-form-label">No Cetak SPB</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="noCetakSPB" name="noCetakSPB" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="namaKapal" class="col-sm-3 col-form-label">Nama Kapal</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="namaKapal" name="namaKapal" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="namaPanggilan" class="col-sm-3 col-form-label">Nama Panggilan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="namaPanggilan" name="namaPanggilan" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="tanggaltiba" class="col-sm-3 col-form-label">Tanggal Tiba</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="tanggaltiba" name="tanggaltiba" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="pelabuhanAsal" class="col-sm-3 col-form-label">Pelabuhan Asal</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="pelabuhanAsal" name="pelabuhanAsal" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nomorSPBtiba" class="col-sm-3 col-form-label">Nomor SPB Tiba</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nomorSPBtiba" name="nomorSPBtiba" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="tanggaltolak" class="col-sm-3 col-form-label">Tanggal Tolak</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="tanggaltolak" name="tanggaltolak" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="pelabuhanTujuan" class="col-sm-3 col-form-label">Pelabuhan Tujuan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="pelabuhanTujuan" name="pelabuhanTujuan" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nomorSPBtolak" class="col-sm-3 col-form-label">Nomor SPB Tolak</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nomorSPBtolak" name="nomorSPBtolak" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="eta" class="col-sm-3 col-form-label">ETA</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="eta" name="eta" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Penumpang Tiba</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" placeholder="Dewasa" id="tibaDewasa" name="tibaDewasa" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" placeholder="Anak" id="tibaAnak" name="tibaAnak" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Penumpang Tolak</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" placeholder="Dewasa" id="berangkatDewasa" name="berangkatDewasa" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" placeholder="Anak" id="berangkatAnak" name="berangkatAnak" required>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-dark">SAVE</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Form Penambahan Data Kapal Content -->
                    <div id="form-data-kapal-content" style="display: none;">
                        <h3 id="form-title"></h3>
                        <form id="data-kapal-form">
                            <div class="mb-3">
                                <label for="namaKapal" class="form-label">Nama Kapal</label>
                                <input type="text" class="form-control" id="namaKapal" name="namaKapal" required>
                            </div>
                            <div class="mb-3">
                                <label for="gt" class="form-label">GT</label>
                                <input type="number" class="form-control" id="gt" name="gt" required>
                            </div>
                            <div class="mb-3">
                                <label for="bendera" class="form-label">Bendera</label>
                                <input type="text" class="form-control" id="bendera" name="bendera" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>

                    <!-- Form Edit Data Kapal Content -->
                    <div id="form-edit-data-kapal-content" style="display: none;">
                        <h3 id="form-title"></h3>
                        <form id="edit-kapal-form" action="edit-data-kapal.php">
                            <input type="hidden" name="No" id="NoEdit">
                            <input type="hidden" name="editMode" value="true">
                            <div class="mb-3">
                                <label for="namaKapal" class="form-label">Nama Kapal</label>
                                <input type="text" class="form-control" id="namaKapalEdit" name="namaKapal" value="<?php echo $row['NAMA KAPAL']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="gt" class="form-label">GT</label>
                                <input type="number" class="form-control" id="gtEdit" name="gt" value="<?php echo $row['GT']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="bendera" class="form-label">Bendera</label>
                                <input type="text" class="form-control" id="benderaEdit" name="bendera" value="<?php echo $row['BENDERA']; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jadwalKapalLink = document.getElementById('jadwal-kapal');
            const dataKapalLink = document.getElementById('data-kapal');
            const jadwalKapalContent = document.getElementById('jadwal-kapal-content');
            const dataKapalContent = document.getElementById('data-kapal-content');
            const registrasiKapalContent = document.getElementById('registrasi-kapal-content');
            const formDataKapalContent = document.getElementById('form-data-kapal-content');
            const formEditDataKapalContent = document.getElementById('form-edit-data-kapal-content');
            const tambahDataJadwalBtn = document.getElementById('tambah-data-jadwal');
            const tambahDataKapalBtn = document.getElementById('tambah-data-kapal');
            const formTitle = document.getElementById('form-title');
            const dataKapalForm = document.getElementById('data-kapal-form');
            const jadwalKapalForm = document.getElementById('jadwal-kapal-form');

            function setActiveContent(activeContent) {
                [jadwalKapalContent, dataKapalContent, registrasiKapalContent, formDataKapalContent, formEditDataKapalContent].forEach(content => {
                    content.style.display = content === activeContent ? 'block' : 'none';
                });
            }

            function setActiveLink(activeLink) {
                [jadwalKapalLink, dataKapalLink].forEach(link => {
                    link.classList.toggle('active', link === activeLink);
                });
            }

            // Set initial active state
            setActiveContent(jadwalKapalContent);
            setActiveLink(jadwalKapalLink);

            jadwalKapalLink.addEventListener('click', function(e) {
                e.preventDefault();
                setActiveContent(jadwalKapalContent);
                setActiveLink(jadwalKapalLink);
            });

            dataKapalLink.addEventListener('click', function(e) {
                e.preventDefault();
                setActiveContent(dataKapalContent);
                setActiveLink(dataKapalLink);
            });

            tambahDataJadwalBtn.addEventListener('click', function(e) {
                e.preventDefault();
                formTitle.textContent = 'Tambah Jadwal Kapal';
                jadwalKapalForm.reset();
                setActiveContent(registrasiKapalContent);
            });

            jadwalKapalForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(jadwalKapalForm);
                fetch('save-spb.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            setActiveContent(jadwalKapalContent);
                            loadJadwal();
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });

            tambahDataKapalBtn.addEventListener('click', function(e) {
                e.preventDefault();
                formTitle.textContent = 'Tambah Data Kapal';
                dataKapalForm.reset();
                setActiveContent(formDataKapalContent);
            });

            dataKapalForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(dataKapalForm);
                fetch('save-data-kapal.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('ini ya');
                        if (data.status === 'success') {
                            setActiveContent(dataKapalContent);
                            loadData();
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });

            function loadJadwal() {
                fetch('fetch-jadwal-kapal.php')
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('tabel-jadwal-kapal').innerHTML = html;
                    })
                    .catch(error => console.error('Error:', error));
            }

            window.editJadwal = function(No) {
                fetch(`get-jadwal-kapal.php?No=${No}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            console.log(data.data); // Log data yang diterima

                            // Periksa keberadaan elemen
                            const elements = {
                                no: document.getElementById('No'),
                                noCetakSPB: document.getElementById('noCetakSPB'),
                                namaKapal: document.getElementById('namaKapal'),
                                namaPanggilan: document.getElementById('namaPanggilan'),
                                tanggaltiba: document.getElementById('tanggaltiba'),
                                pelabuhanAsal: document.getElementById('pelabuhanAsal'),
                                nomorSPBtiba: document.getElementById('nomorSPBtiba'),
                                tanggaltolak: document.getElementById('tanggaltolak'),
                                pelabuhanTujuan: document.getElementById('pelabuhanTujuan'),
                                nomorSPBtolak: document.getElementById('nomorSPBtolak'),
                                eta: document.getElementById('eta'),
                                tibaDewasa: document.getElementById('tibaDewasa'),
                                tibaAnak: document.getElementById('tibaAnak'),
                                berangkatDewasa: document.getElementById('berangkatDewasa'),
                                berangkatAnak: document.getElementById('berangkatAnak')
                            };

                            let missingElements = [];
                            for (let key in elements) {
                                if (!elements[key]) {
                                    missingElements.push(key);
                                }
                            }

                            if (missingElements.length > 0) {
                                console.error('Missing elements:', missingElements);
                            } else {
                                // Set values if all elements are found
                                elements.no.value = No;
                                elements.noCetakSPB.value = data.data['NO CETAK SPB'];
                                elements.namaKapal.value = data.data['NAMA KAPAL'];
                                elements.namaPanggilan.value = data.data['NAMA PANGGIL'];
                                elements.tanggaltiba.value = data.data['TANGGAL TIBA'];
                                elements.pelabuhanAsal.value = data.data['PELABUHAN ASAL'];
                                elements.nomorSPBtiba.value = data.data['NO SPB TIBA'];
                                elements.tanggaltolak.value = data.data['TANGGAL TOLAK'];
                                elements.pelabuhanTujuan.value = data.data['PELABUHAN TUJUAN'];
                                elements.nomorSPBtolak.value = data.data['NO SPB TOLAK'];
                                elements.eta.value = data.data.ETA;
                                elements.tibaDewasa.value = data.data['TIBA DEWASA'];
                                elements.tibaAnak.value = data.data['TIBA ANAK'];
                                elements.berangkatDewasa.value = data.data['TOLAK DEWASA'];
                                elements.berangkatAnak.value = data.data['TOLAK ANAK'];

                                const namaKapalOptions = elements.namaKapal.options;
                                for (let i = 0; i < namaKapalOptions.length; i++) {
                                    if (namaKapalOptions[i].text === data.data['NAMA KAPAL']) {
                                        elements.namaKapal.selectedIndex = i;
                                        break;
                                    }
                                }
                            }

                            formTitle.textContent = 'Edit Jadwal Kapal';
                            setActiveContent(registrasiKapalContent); // Pastikan form aktif dan terlihat
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            };

            window.deleteJadwal = function(No) {
                if (confirm('Apakah Anda yakin ingin menghapus jadwal ini?')) {
                    fetch(`delete-jadwal-kapal.php?No=${No}`, {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                // Refresh the table data
                                loadJadwal();
                            } else {
                                alert(data.message);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            };

            function loadData() {
                fetch('fetch-data-kapal.php')
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('tabel-kapal').innerHTML = html;
                    })
                    .catch(error => console.error('Error:', error));
            }


            //loadData();

            window.editData = function(No) {
                fetch(`get-data-kapal.php?No=${No}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(formEditDataKapalContent);
                        if (data.status === 'success') {
                            document.getElementById('NoEdit').value = data.data.NO;
                            document.getElementById('namaKapalEdit').value = data.data['NAMA KAPAL'];
                            document.getElementById('gtEdit').value = data.data.GT;
                            document.getElementById('benderaEdit').value = data.data.BENDERA;
                            formTitle.textContent = 'Edit Data Kapal';
                            setActiveContent(formEditDataKapalContent);
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            };

            document.getElementById('edit-kapal-form').addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                fetch('save-data-kapal.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            setActiveContent(dataKapalContent);
                            loadData();
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));

            });

            window.deleteData = function(No) {
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    fetch(`delete-data-kapal.php?No=${No}`, {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                // Refresh the table data
                                loadData();
                            } else {
                                alert('Kapal tidak bisa dihapus karena terjadwal');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            };

            $('#save-form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'save-data-kapal.php', // Change to your save data PHP file
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        // Refresh the data table
                        fetchData();
                    }
                });
            });

            function fetchData() {
                $.ajax({
                    url: 'fetch-data-kapal.php', // Change to your fetch data PHP file
                    type: 'GET',
                    success: function(data) {
                        $('#data-table').html(data); // Update your data table
                    }
                });
            }

            $(document).ready(function() {
                fetch('get-nama-kapal.php')
                    .then(response => response.json())
                    .then(data => {
                        const namaKapalSelect = document.getElementById('namaKapal');
                        data.forEach(kapal => {
                            const option = document.createElement('option');
                            option.value = kapal.NO;
                            option.textContent = kapal['NAMA KAPAL'];
                            namaKapalSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching ship names:', error));
            });

            document.getElementById('registrasi-kapal-content form').addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                fetch('save-spb.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            alert('Data berhasil disimpan.');
                            this.reset();
                        } else {
                            alert('Gagal menyimpan data: ' + data.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
</body>

</html>