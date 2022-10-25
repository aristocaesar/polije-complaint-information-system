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
                <form method="POST" class="needs-validation" novalidate="">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" placeholder="Ketikkan Nama Lengkap" required="">
                                <div class="invalid-feedback">
                                    Harap Ketikkan Nama Lengkap
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Ketikkan Email" required="">
                                <div class="invalid-feedback">
                                    Harap Ketikkan Email
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
                                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Ketikkan Alamat" required="">
                                    <div class="invalid-feedback">
                                        Harap Ketikkan Alamat
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>No Telp / Whatapps</label>
                                <input type="number" class="form-control" placeholder="Ketikkan No Telp / Whatapps" required="">
                                <div class="invalid-feedback">
                                    Harap Ketikkan No Telp / Whatapps
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="input-group">
                                        <select class="form-control" id="status" name="status" disabled>
                                            <option value="administrator">Administartor</option>
                                            <option value="staf">Staf</option>
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
                                                <img id="foto" alt="foto" src="https://media-exp1.licdn.com/dms/image/C5603AQED8L0BQbsIdw/profile-displayphoto-shrink_200_200/0/1654088905112?e=2147483647&v=beta&t=l683DweslHzwVt376iZoViKr9i9uG0GzhcDREE6eAHg" class="rounded-circle author-box-picture" height="100">
                                            </div>
                                            <div class="author-box-details">
                                                <div class="author-box-description">
                                                    <div class="input-groups mb-2">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="input-foto" accept="" onchange="updateFoto(this)">
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
                        <button class="btn btn-primary">Simpan Perubahan</button>
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