<?php getNavbarAdmin(); ?>
<?php getSidebarAdmin() ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profil</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <form method="POST" action="<?= BaseUrl() ?>/admin/profil/update" enctype="multipart/form-data" class="needs-validation" novalidate="">
                    <div class="card-body">
                        <input type="text" class="d-none" name="update" value="<?= $data["profile"]["id"] ?>">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" placeholder="Ketikkan Nama Lengkap" value="<?= $data["profile"]["nama"] ?>" required="">
                                <div class="invalid-feedback">
                                    Harap Ketikkan Nama Lengkap
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Ketikkan Email" required="" value="<?= $data["profile"]["email"] ?>" readonly>
                                <div class="invalid-feedback">
                                    Harap Ketikkan Email
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir" id="tanggal_lahir" value="<?= $data["profile"]["tgl_lahir"] ?>" />
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="jenis-kelamin">Jenis Kelamin</label>
                                    <div class="input-group">
                                        <select class="form-control" id="jenis-kelamin" name="jenis_kelamin" value="perempuan">
                                            <option value="laki-laki" <?= $data["profile"]["jenis_kelamin"] == "laki-laki" ? "selected" : "" ?>>Laki - Laki</option>
                                            <option value="perempuan" <?= $data["profile"]["jenis_kelamin"] == "perempuan" ? "selected" : "" ?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Ketikkan Alamat" required="" value="<?= $data["profile"]["alamat"] ?>">
                                    <div class="invalid-feedback">
                                        Harap Ketikkan Alamat
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>No Telp / Whatapps</label>
                                <input type="number" class="form-control" placeholder="Ketikkan No Telp / Whatapps" name="kontak" required="" value="<?= $data["profile"]["kontak"] ?>">
                                <div class="invalid-feedback">
                                    Harap Ketikkan No Telp / Whatapps
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="input-group">
                                        <select class="form-control" id="status" name="status" disabled>
                                            <option value="administrator" <?= $data["profile"]["status"] == "administrator" ? "selected" : "" ?>>Administartor</option>
                                            <option value="staf" <?= $data["profile"]["status"] == "staf" ? "selected" : "" ?>>Staf</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="status">Foto</label>
                                    <div class="author-box">
                                        <div class="">
                                            <div class="author-box-left">
                                                <img id="foto" alt="foto" src="<?= BaseURL(); ?>/public/upload/assets/images/<?= $data["profile"]["foto"] ?>" class="rounded-circle author-box-picture" height="100">
                                            </div>
                                            <div class="author-box-details">
                                                <div class="author-box-description">
                                                    <div class="input-groups mb-2">
                                                        <div class="custom-file">
                                                            <input type="text" class="d-none" name="foto_lama" value="<?= $data["profile"]["foto"] ?>">
                                                            <input type="file" name="foto" class="custom-file-input" id="input-foto" accept="" onchange="updateFoto(this)">
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
                    </div>
                    <div class=" card-footer text-right">
                        <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    function updateFoto(foto) {
        const img = foto.files[0];
        $("#foto").attr("src", window.URL.createObjectURL(img));
        $("#label-input-foto").text(img.name);
    }
</script>
<?php getFooterDashboard(); ?>