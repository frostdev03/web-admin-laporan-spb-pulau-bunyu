<?php
include 'db.php';

if (isset($_GET['NO'])) {
    $no = $_GET['NO'];
    $query = "SELECT * FROM spb WHERE NO = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $no);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Kapal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h3>Edit Jadwal Kapal</h3>
        <div class="form-container p-4">
            <form action="update-spb.php" method="POST">
                <input type="hidden" name="No" value="<?php echo htmlspecialchars($row['NO']); ?>">
                <div class="mb-3 row">
                    <label for="noCetakSPB" class="col-sm-3 col-form-label">No Cetak SPB</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="noCetakSPB" name="noCetakSPB" value="<?php echo htmlspecialchars($row['NO CETAK SPB']); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="namaKapal" class="col-sm-3 col-form-label">Nama Kapal</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="namaKapal" name="namaKapal" value="<?php echo htmlspecialchars($row['NAMA KAPAL']); ?>">
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="namaPanggilan" class="col-sm-3 col-form-label">Nama Panggilan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="namaPanggilan" name="namaPanggilan" value="<?php echo htmlspecialchars($row['NAMA PANGGILAN']); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tanggaltiba" class="col-sm-3 col-form-label">Tanggal Tiba</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="tanggaltiba" name="tanggaltiba" value="<?php echo htmlspecialchars($row['TANGGAL TIBA']); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="pelabuhanAsal" class="col-sm-3 col-form-label">Pelabuhan Asal</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="pelabuhanAsal" name="pelabuhanAsal" value="<?php echo htmlspecialchars($row['PELABUHAN ASAL']); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nomorSPBtiba" class="col-sm-3 col-form-label">Nomor SPB Tiba</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nomorSPBtiba" name="nomorSPBtiba" value="<?php echo htmlspecialchars($row['NO SPB TIBA']); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tanggaltolak" class="col-sm-3 col-form-label">Tanggal Tolak</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="tanggaltolak" name="tanggaltolak" value="<?php echo htmlspecialchars($row['TANGGAL TOLAK']); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="pelabuhanTujuan" class="col-sm-3 col-form-label">Pelabuhan Tujuan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="pelabuhanTujuan" name="pelabuhanTujuan" value="<?php echo htmlspecialchars($row['PELABUHAN TUJUAN']); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nomorSPBtolak" class="col-sm-3 col-form-label">Nomor SPB Tolak</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nomorSPBtolak" name="nomorSPBtolak" value="<?php echo htmlspecialchars($row['NO SPB TOLAK']); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="eta" class="col-sm-3 col-form-label">ETA</label>
                    <div class="col-sm-9">
                        <input type="time" class="form-control" id="eta" name="eta" value="<?php echo htmlspecialchars($row['ETA']); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Penumpang Tiba</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" placeholder="Dewasa" name="tibaDewasa" value="<?php echo htmlspecialchars($row['TIBA DEWASA']); ?>">
                    </div>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" placeholder="Anak" name="tibaAnak" value="<?php echo htmlspecialchars($row['TIBA ANAK']); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Penumpang Tolak</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" placeholder="Dewasa" name="berangkatDewasa" value="<?php echo htmlspecialchars($row['TOLAK DEWASA']); ?>">
                    </div>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" placeholder="Anak" name="berangkatAnak" value="<?php echo htmlspecialchars($row['TOLAK ANAK']); ?>">
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-dark">Update</button>
                </div>
            </form>
        </div>
</body>

</html>