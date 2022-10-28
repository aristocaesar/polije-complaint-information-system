<?php getNavbarAdmin(); ?>
<?php getSidebarAdmin() ?>
<!-- Main Content -->
<div class="main-content">
    <!-- Modal Tambah / Update -->
    <div class="modal fade" tabindex="-1" role="dialog" id="kategori">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategoti</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="mt-4" action="<?= BaseURL() ?>/admin/kategori/save" method="POST">
                    <div class="modal-body">
                        <input id="id-kategori" type="text" name="id" class="d-none">
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Ketikkan Nama Kategori">
                        </div>
                        <div class="form-group">
                            <label for="deksripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deksripsi" rows="6" placeholder="Ketikkan Deskripsi"></textarea>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="hapus_kategori">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="mt-4" action="<?= BaseURL() ?>/admin/divisi/delete" method="POST">
                    <div class="modal-body">
                        <input id="id-divisi-kategori" type="text" name="id" class="d-none">
                        <p>Menghapus divisi dapat menyebabkan perubahan data yang signifikan pada terhadap data laporan</p>
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
            <h1>Kategori</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Data Kategori</h4>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kategori" onclick="Add()">Tambah</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>Nama Kategori</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>Create a mobile app</td>
                                            <td>
                                                <p>Nostrud officia Lorem et sit voluptate cillum anim ullamco minim sunt sint anim labore sint.</p>
                                            </td>
                                            <td><button type="button" id="5" class="btn btn-secondary" data-toggle="modal" data-target="#kategori" onclick="Detail(this.id)">Detail</button></td>
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
        console.log("add");
        $("#id-kategori").val("");
        $(".modal-title")[0].textContent = "Tambah Kategori";
        $(".btn-hapus").hide();
    }

    function Detail(id) {
        // Modal Update & Hapus
        console.log("Detail ", id);
        $("#id-kategori").val(id);
        $(".modal-title")[0].textContent = "Edit Kategori";
        $(".btn-hapus").show();
    }

    function konfirmasiDelete() {
        $("#kategori").modal('hide');
        $("#hapus_kategori").modal('show');
        $("#id-divisi-kategori").val($("#id-kategori").val());
    }
    $('.table').DataTable({
        language: {
            url: '<?= BaseURL(); ?>/public/vendor/datatables/indonesia.json'
        }
    });
</script>
<?php getFooterDashboard(); ?>