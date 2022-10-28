<?php getNavbarAdmin(); ?>
<?php getSidebarAdmin() ?>
<!-- Main Content -->
<div class="main-content">
    <!-- Modal Tambah / Update -->
    <div class="modal fade" tabindex="-1" role="dialog" id="divisi">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Divisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="mt-4" action="<?= BaseURL() ?>/admin/divisi/save" method="POST">
                    <div class="modal-body">
                        <input id="id-divisi" type="text" name="id" class="d-none">
                        <div class="form-group">
                            <label for="nama_divisi">Nama Divisi</label>
                            <input type="text" class="form-control" name="nama_divisi" id="nama_divisi" aria-describedby="kategori" placeholder="Ketikkan Nama Divisi">
                        </div>
                        <div class="form-group">
                            <label for="deksripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deksripsi" rows="6" placeholder="Ketikkan Deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nama_penanggung_jawab">Nama Penanggung Jawab</label>
                            <input type="nama_penanggung_jawab" class="form-control" name="nama_penanggung_jawab" id="nama_penanggung_jawab" aria-describedby="nama_penanggung_jawab" placeholder="Ketikkan Nama Penanggung Jawab">
                        </div>
                        <div class="form-group">
                            <label for="kontak">Kontak Penanggung Jawab</label>
                            <input type="number" class="form-control" name="kontak" id="kontak" aria-describedby="kontak" placeholder="Ketikkan Kontak Penanggung Jawab">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Penanggung Jawab</label>
                            <input type="alamat" class="form-control" name="alamat" id="alamat" aria-describedby="alamat" placeholder="Ketikkan Alamat Penanggung Jawab">
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
    <div class="modal fade" tabindex="-1" role="dialog" id="hapus_divisi">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Divisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="mt-4" action="<?= BaseURL() ?>/admin/divisi/delete" method="POST">
                    <div class="modal-body">
                        <input id="id-divisi-hapus" type="text" name="id" class="d-none">
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
            <h1>Divisi</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Data Divisi</h4>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#divisi" onclick="Add()">Tambah</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>Nama Divisi</th>
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
                                            <td><button type="button" id="5" class="btn btn-secondary" data-toggle="modal" data-target="#divisi" onclick="Detail(this.id)">Detail</button></td>
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
        $("#id-divisi").val("");
        $(".modal-title")[0].textContent = "Tambah Divisi";
        $(".btn-hapus").hide();
    }

    function Detail(id) {
        // Modal Update & Hapus
        console.log("Detail ", id);
        $("#id-divisi").val(id);
        $(".modal-title")[0].textContent = "Edit Divisi";
        $(".btn-hapus").show();
    }

    function Save() {
        const id = $("#id-divisi").val();
        if (id == "") {
            console.log("tambah");
        } else {
            console.log("update");
        }
    }

    function konfirmasiDelete() {
        $("#divisi").modal('hide');
        $("#hapus_divisi").modal('show');
        $("#id-divisi-hapus").val($("#id-divisi").val());
    }
    $('.table').DataTable({
        language: {
            url: '<?= BaseURL(); ?>/public/vendor/datatables/indonesia.json'
        }
    });
</script>
<?php getFooterDashboard(); ?>