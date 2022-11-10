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
                <form class="mt-4 formAddUpdate" action="<?= BaseURL() ?>/admin/pengguna/save" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12" id="id">
                                <div class="form-group">
                                    <label for="id">ID</label>
                                    <input id="id-pengguna" type="text" name="add" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Ketikkan Nama Lengkap">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Ketikkan Email" readonly>
                                </div>
                            </div>
                            <div class="password col-12">
                                <div class="row">
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
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="11-21-1999" />
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <div class="input-group">
                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                            <option value="laki-laki">Laki - Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
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
                            <div class="col-12 col-md-6 foto-user mb-4">
                                <div class="form-group">
                                    <label for="status">Foto</label>
                                    <div class="author-box">
                                        <div class="">
                                            <div class="author-box-left">
                                                <img class="rounded-circle" id="image-user-info" alt="foto" src="" height="150">
                                            </div>
                                        </div>
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
                                            <option value="belum_terverifikasi">Belum Terverifikasi</option>
                                            <option value="terverifikasi">Sudah Terverifikasi</option>
                                        </select>
                                        <small id="btn-lihat-verifikasi"><button class="btn btn-link"><i>Lihat Selengkapnya</i></button></small>
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
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Hapus -->
    <div class="modal fade" tabindex="-1" role="dialog" id="hapus_reset_pengguna">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title-hapus-reset">Hapus Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="mt-4 formHapus" action="<?= BaseURL() ?>/admin/pengguna/delete" method="POST">
                    <div class="modal-body">
                        <input id="id-pengguna-hapus" type="text" name="delete" class="d-none">
                        <p>Menghapus pengguna dapat menyebabkan perubahan data yang signifikan terhadap data laporan</p>
                    </div>
                    <div class="modal-footer bg-whitesmoke">
                        <button type="button" class="btn btn-secondary" onclick="pushBackToMainModal()">Batal</button>
                        <button type="submit" name="submit" class="btn btn-primary">Ya, Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Table -->
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
                                        <?php $i = 1;
                                        foreach ($data["penggunas"] as $pengguna) : ?>
                                            <tr>
                                                <td>
                                                    <?= $i++; ?>
                                                </td>
                                                <td><?= $pengguna["nama"] ?></td>
                                                <td><?= $pengguna["email"] ?></td>
                                                <td><?= ucwords(str_replace("_", " / ", $pengguna["status"])) ?></td>
                                                <td><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#pengguna" onclick="Detail(`<?= $pengguna['id'] ?>`)">Detail</button></td>
                                            </tr>
                                        <?php endforeach; ?>
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
        $("#id").hide();
        $("#id-pengguna").val("");
        $("#id-pengguna").attr("name", "add");
        $(".modal-title")[0].textContent = "Tambah Pengguna";
        $(".formAddUpdate").attr("action", `<?= BaseURL() ?>/admin/pengguna/save`);

        $("#email").attr("readonly", false);
        $(".password").show();
        $(".akses").show();
        $(".foto-user").hide();
        $("#informasi-akun").hide();

        $(".btn-reset-password").hide();
        $(".btn-hapus").hide();

        // set value
        $("#id-pengguna").val("");
        $("#nama").val("");
        $("#email").val("");
        $("#tgl_lahir").val("");
        $("#jenis_kelamin").val("laki-laki");
        $("#alamat").val("");
        $("#kontak").val("");
        $("#status").val();
        $("#akses").val("aktif");
    }

    async function Detail(id) {
        // Modal Update & Konfirmasi Hapus
        const pengguna = await fetch(`<?= BaseURL() ?>/api/pengguna/${id}`);
        const response = await pengguna.json();
        const result = response.data;

        $("#id").show();
        $("#id-pengguna").attr("name", "update");
        $(".modal-title")[0].textContent = "Edit Pengguna";
        $(".formAddUpdate").attr("action", `<?= BaseURL() ?>/admin/pengguna/update`);

        $("#email").attr("readonly", true);
        $(".password").hide();
        $(".akses").show();
        $(".foto-user").show();
        $("#informasi-akun").show();

        if ($("#verifikasi_keaslian").val() == "belum_terverifikasi") {
            $("#btn-lihat-verifikasi").hide();
        } else {
            $("#btn-lihat-verifikasi").show();
        }

        $(".btn-reset-password").show();
        $(".btn-hapus").show();

        // set value
        $("#id-pengguna").val(id);
        $("#nama").val(result.nama);
        $("#email").val(result.email);
        $("#tgl_lahir").val(result.tgl_lahir);
        $("#jenis_kelamin").val(result.jenis_kelamin);
        $("#alamat").val(result.alamat);
        $("#kontak").val(result.kontak);
        $("#status").val(result.status);
        $("#akses").val(result.akses);
        $("#image-user-info").attr("src", `<?= BaseURL() ?>/public/upload/assets/images/${result.foto}`);
        $("#verifikasi_keaslian").val(result.verifikasi_keaslian);
        $("#aktifitas_terakhir").val(result.last_login);
        $("#tanggal_terdaftar").val(result.created_at);
        $("#tanggal_diperbarui").val(result.updated_at);
    }

    function konfirmasiDelete() {
        // Modal Konfirmasi Delete
        $("#pengguna").modal('hide');
        $("#hapus_reset_pengguna").modal('show');
        $(".title-hapus-reset").text("Hapus Pengguna");
        $("#id-pengguna-hapus").val($("#id-pengguna").val());
        console.log($("#id-pengguna-hapus").val());
    }

    function pushBackToMainModal() {
        $("#hapus_reset_pengguna").modal('hide');
        setTimeout(() => {
            $("#pengguna").modal('show');
        }, 500);
    }
    // init datatables
    $('.table').DataTable({
        language: {
            url: '<?= BaseURL(); ?>/public/vendor/datatables/indonesia.json'
        }
    });
</script>
<?php getFooterDashboard(); ?>