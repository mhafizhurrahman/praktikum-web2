<?php
if (isset($_POST['Submit'])) {
    $id = $_POST['id'];
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $sks = $_POST['sks'];
    $semester = $_POST['semester'];
    $result = mysqli_query($con, "INSERT INTO matakuliah(id,kode,nama,sks,semester)
VALUES('$id','$kode','$nama','$sks','$semester')") or die(mysqli_error($con));
    header("Location:?page=matakuliah-show");
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Data Matakuliah</strong>
            </div>
            <div class="card-body">
                <form method="POST" action="?page=matakuliah-add" class="form-horizontal">
                    <div class="form-group">
                        <label for="id" class="control-label">ID</label>
                        <input type="text" class="form-control" name="id" placeholder="Masukan ID..." required>
                    </div>
                    <div class="form-group">
                        <label for="kode" class="ontrol-label">Kode</label>
                        <input type="text" class="form-control" name="kode" placeholder="Masukan Kode..." required>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="ontrol-label">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Lengkap..." required>
                    </div>
                    <div class="form-group">
                        <label for="sks" class="control-label">SKS</label>
                        <input type="text" class="form-control" name="sks" placeholder="Masukan SKS..." required>
                    </div>
                    <div class="form-group">
                        <label for="semester" class="control-label">Semester</label>
                        <input type="text" class="form-control" name="semester" placeholder="Masukan Semester..." required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="Submit" class="btn btn-primary" value="Simpan">
                        <input type="reset" name="reset" class="btn btn-warning" value="Reset">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>