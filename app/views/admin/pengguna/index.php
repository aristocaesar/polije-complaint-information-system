<?php getNavbarAdmin(); ?>
<?php getSidebarAdmin() ?>
<!-- Main Content -->
<div class="main-content">
    <!-- Modal Tambah / Update -->
    <div class="modal fade" tabindex="-1" role="dialog" id="pengguna">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="mt-4" action="<?= BaseURL() ?>/admin/pengguna/save" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <input id="id-pengguna" type="text" name="id" class="d-none">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Ketikkan Nama Lengkap">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Ketikkan Email">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" name="password" id="password" placeholder="Ketikkan Password">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="password2">Konfirmasi Password</label>
                                    <input type="text" class="form-control" name="password2" id="password2" placeholder="Ketikkan Password">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" />
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Ketikkan Alamat">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="kontak">No Telp / Whatapps</label>
                                    <input type="number" class="form-control" name="kontak" id="kontak" placeholder="Ketikkan Kontak">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="input-group">
                                        <select class="form-control" id="status" name="status">
                                            <option value="mahasiswa_mahasiswi">Mahasiswa / Mahasiswi</option>
                                            <option value="dosen">Dosen</option>
                                            <option value="staf">Staf</option>
                                            <option value="masyarakat">Masyarakat</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="akses col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="akses">Akses</label>
                                    <div class="input-group">
                                        <select class="form-control" id="akses" name="akses">
                                            <option value="aktif">Aktif</option>
                                            <option value="blokir">Blokir</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="informasi-akun">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="verifikasi_keaslian">Verifikasi Keaslian</label>
                                    <div class="input-group">
                                        <select class="form-control" id="verifikasi_keaslian" disabled>
                                            <option value="belum_verifikasi">Belum Terverifikasi</option>
                                            <option value="sudah_verifikasi">Sudah Terverifikasi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="aktifitas_terakhir">Aktifitas Terakhir</label>
                                    <input type="date" class="form-control" id="aktifitas_terakhir" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="tanggal_terdaftar">Tanggal Terdaftar</label>
                                    <input type="date" class="form-control" id="tanggal_terdaftar" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="tanggal_diperbarui">Tanggal Diperbarui</label>
                                    <input type="date" class="form-control" id="tanggal_diperbarui" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-danger btn-hapus" onclick="konfirmasiDelete()">Hapus</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Hapus -->
    <div class="modal fade" tabindex="-1" role="dialog" id="hapus_pengguna">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="mt-4" action="<?= BaseURL() ?>/admin/pengguna/delete" method="POST">
                    <div class="modal-body">
                        <input id="id-pengguna-hapus" type="text" name="id" class="d-none">
                        <p>Menghapus pengguna dapat menyebabkan perubahan data yang signifikan terhadap data laporan</p>
                    </div>
                    <div class="modal-footer bg-whitesmoke">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="section-header">
            <h1>Pengguna</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Data Pengguna</h4>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pengguna" onclick="Add()">Tambah</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>Aristo Caesar Pratama</td>
                                            <td>hi@aristoc.space</td>
                                            <td>Mahasiswa</td>
                                            <td><button type="button" id="5" class="btn btn-secondary" data-toggle="modal" data-target="#pengguna" onclick="Detail(this.id)">Detail</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    function Add() {
        // Modal Tambah
        $("#id-pengguna").val("");
        $(".modal-title")[0].textContent = "Tambah Pengguna";
        $(".akses").hide();
        $("#informasi-akun").hide();
        $(".btn-hapus").hide();
    }

    function Detail(id) {
        // Modal Update & Hapus
        $("#id-pengguna").val(id);
        $(".modal-title")[0].textContent = "Edit Pengguna";
        $(".akses").show();
        $("#informasi-akun").show();
        $(".btn-hapus").show();
    }

    function konfirmasiDelete() {
        $("#pengguna").modal('hide');
        $("#hapus_pengguna").modal('show');
        $("#id-pengguna-hapus").val($("#id-pengguna").val());
    }
    $('.table').DataTable({
        language: {
            url: '<?= BaseURL(); ?>/public/vendor/datatables/indonesia.json'
        }
    });
</script>
<?php getFooterDashboard(); ?>