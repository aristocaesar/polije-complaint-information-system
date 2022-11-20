<?php getNavbarAdmin(); ?>
<?php getSidebarAdmin() ?>
<!-- Main Content -->
<div class="main-content">
    <!-- Modal Tambah / Update -->
    <div class="modal fade" tabindex="-1" role="dialog" id="petugas">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Petugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="mt-4 fromAddUpdate" enctype="multipart/form-data" action="<?= BaseURL() ?>/admin/petugas/save" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div id="id" class="col-12">
                                <div class="form-group">
                                    <label for="id-petugas">ID</label>
                                    <input id="id-petugas" type="text" name="id" class="form-control" readonly>
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
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Ketikkan Email">
                                </div>
                            </div>
                            <div class="password col-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" class="form-control" name="password" id="password" placeholder="Ketikkan Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
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
                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" />
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
                                            <option value="administrator">Administartor</option>
                                            <option value="staf">Staf</option>
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
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="status">Foto</label>
                                    <div class="author-box">
                                        <div class="mb-5">
                                            <div class="author-box-left">
                                                <img id="foto" alt="foto" src="<?= BaseURL() ?>/public/upload/assets/images/USER-default.png" class="rounded-circle author-box-picture" height="100">
                                            </div>
                                            <div class="author-box-details">
                                                <div class="author-box-description">
                                                    <div class="input-groups mb-2">
                                                        <div class="custom-file">
                                                            <input type="text" class="d-none" name="foto-lama" id="fotoLama">
                                                            <input type="file" class="custom-file-input" id="input-foto" name="foto" accept="" onchange=" updateFoto(this)">
                                                            <label class="custom-file-label" id="label-input-foto" for="foto">Pilih foto</label>
                                                        </div>
                                                    </div>
                                                    <small>Maksimal 2 MB ( JPEG, JPG, PNG )</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="informasi-akun">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="aktifitas_terakhir">Aktifitas Terakhir</label>
                                    <input type="datetime" class="form-control" id="aktifitas_terakhir" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="tanggal_terdaftar">Tanggal Terdaftar</label>
                                    <input type="datetime" class="form-control" id="tanggal_terdaftar" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="tanggal_diperbarui">Tanggal Diperbarui</label>
                                    <input type="datetime" class="form-control" id="tanggal_diperbarui" readonly>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="hapus_petugas">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Petugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="mt-4" action="<?= BaseURL() ?>/admin/petugas/delete" method="POST">
                    <div class="modal-body">
                        <input id="id-petugas-hapus" type="text" name="delete" class="d-none">
                        <input id="id-petugas-hapus-foto" type="text" name="foto" class="d-none">
                        <p>Menghapus petugas dapat menyebabkan perubahan data yang signifikan terhadap data laporan</p>
                    </div>
                    <div class="modal-footer bg-whitesmoke">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="submit" class="btn btn-primary">Ya, Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="section-header">
            <h1>Petugas</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Data Petugas</h4>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#petugas" onclick="Add()">Tambah</button>
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
                                        foreach ($data["petugas"] as $petugas) : ?>
                                            <?php if ($petugas["id"] != $_SESSION["admin"]["id"]) : ?>
                                                <tr>
                                                    <td>
                                                        <?= $i++; ?>
                                                    </td>
                                                    <td><?= $petugas["nama"] ?></td>
                                                    <td><?= $petugas["email"] ?></td>
                                                    <td><?= ucfirst($petugas["status"]) ?></td>
                                                    <td><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#petugas" onclick="Detail(`<?= $petugas['id'] ?>`)">Detail</button></td>
                                                </tr>
                                            <?php endif; ?>
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
    // foto onchange
    function updateFoto(foto) {
        const img = foto.files[0];
        $("#foto").attr("src", window.URL.createObjectURL(img));
        $("#label-input-foto").text(img.name);
    }

    function Add() {
        // Modal Tambah
        $("#id").hide();
        $("#id-petugas").val("");
        $("#id-petugas").attr("name", "add");
        $(".modal-title")[0].textContent = "Tambah Petugas";
        $(".fromAddUpdate").attr("action", "<?= BaseURL() ?>/admin/petugas/save");

        // set value
        $("#nama").val("");
        $("#email").val("");
        $("#email").attr("readonly", false);
        $(".password").show();
        $("#tgl_lahir").val("");
        $("#jenis_kelamin").val("laki-laki");
        $("#alamat").val("");
        $("#kontak").val("");
        $("#status").val("administrator");
        $("#akses").val("aktif");
        $("#fotoLama").val("");
        $("#foto").attr("src", `<?= BaseURL() ?>/public/upload/assets/images/USER-default.png`);
        $("#aktifitas_terakhir").val();
        $("#tanggal_terdaftar").val();
        $("#tanggal_diperbarui").val();

        $(".akses").hide();
        $("#informasi-akun").hide();
        $(".btn-hapus").hide();
    }

    async function Detail(id) {
        const petugas = await fetch(`<?= BaseURL() ?>/api/petugas/${id}`);
        const response = await petugas.json();
        const result = response.data;
        // Modal Update & Hapus
        $("#id").show();
        $("#id-petugas").val(id);
        $("#id-petugas").attr("name", "update");
        $(".modal-title")[0].textContent = "Edit Petugas";
        $(".fromAddUpdate").attr("action", "<?= BaseURL() ?>/admin/petugas/update");

        // set value
        $("#nama").val(result.nama);
        $("#email").val(result.email);
        $("#email").attr("readonly", true);
        $(".password").hide();
        $("#tgl_lahir").val(result.tgl_lahir);
        $("#jenis_kelamin").val(result.jenis_kelamin);
        $("#alamat").val(result.alamat);
        $("#kontak").val(result.kontak);
        $("#status").val(result.status);
        $("#akses").val(result.akses);
        $("#fotoLama").val(result.foto);
        $("#foto").attr("src", `<?= BaseURL() ?>/public/upload/assets/images/${result.foto}`);
        $("#aktifitas_terakhir").val(result.last_login);
        $("#tanggal_terdaftar").val(result.created_at);
        $("#tanggal_diperbarui").val(result.updated_at);

        $(".akses").show();
        $("#informasi-akun").show();
        $(".btn-hapus").show();
    }

    function konfirmasiDelete() {
        $("#petugas").modal('hide');
        $("#hapus_petugas").modal('show');
        $("#id-petugas-hapus").val($("#id-petugas").val());
        $("#id-petugas-hapus-foto").val($("#fotoLama").val());
    }
    $('.table').DataTable({
        language: {
            url: '<?= BaseURL(); ?>/public/vendor/datatables/indonesia.json'
        }
    });
</script>
<?php getFooterDashboard(); ?>