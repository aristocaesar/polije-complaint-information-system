<?php getNavbarAdmin(); ?>
<?php getSidebarAdmin() ?>
<!-- Main Content -->
<div class="main-content">
    <!-- Modal Tambah / Update -->
    <div class="modal fade" tabindex="-1" role="dialog" id="kategori">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="mt-4 formSave" action="<?= BaseURL(); ?>/admin/kategori/save" method="POST">
                    <div class="modal-body">
                        <input id="id-kategori" type="text" name="add" class="d-none">
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" name="nama" id="nama_kategori" placeholder="Ketikkan Nama Kategori">
                        </div>
                        <div class="form-group">
                            <label for="deksripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="6" placeholder="Ketikkan Deskripsi"></textarea>
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
                <form class="mt-4" action="<?= BaseURL() ?>/admin/kategori/delete" method="POST">
                    <div class="modal-body">
                        <input id="id-divisi-kategori" type="text" name="delete" class="d-none" value="">
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
    async function getKategori() {
        const kategories = await fetch("<?= BaseURL(); ?>/api/kategori/");
        const response = await kategories.json();
        let tableItems = [];
        response.data.forEach((kategori, index) => {
            tableItems.push(
                `<tr>
                    <td>
                        ${index + 1}
                    </td>
                    <td>${kategori.nama}</td>
                    <td>${kategori.deskripsi}</td>
                    <td><button type="button" id="${kategori.nama}" class="btn btn-secondary" data-toggle="modal" data-target="#kategori" onclick="Detail(this.id)">Detail</button></td>
                </tr>`);
        });
        const htmlData = tableItems.join("");
        $("tbody").html(htmlData).promise().done(() => {
            $('.table').DataTable({
                language: {
                    url: '<?= BaseURL(); ?>/public/vendor/datatables/indonesia.json'
                }
            });
        });
    }
    getKategori();

    function Add() {
        // Modal Tambah
        $("#id-kategori").attr("name", "add");
        $("#id-kategori").val("");
        $(".modal-title").html("Tambah Kategori");
        $(".formSave").attr("action", "<?= BaseURL(); ?>/admin/kategori/save");
        $("#nama_kategori").val("");
        $("#deskripsi").val("");
        $(".btn-hapus").hide();
    }

    async function Detail(nama) {
        nama = nama.replaceAll(/ /g, "-");
        const kategori = await fetch(`<?= BaseURL(); ?>/api/kategori/${nama}`);
        const response = await kategori.json();

        $("#id-kategori").attr("name", "update");
        $("#id-kategori").val(nama);
        $(".modal-title").html("Edit Kategori");
        $(".formSave").attr("action", "<?= BaseURL(); ?>/admin/kategori/update");
        $("#nama_kategori").val(response.data.nama);
        $("#deskripsi").val(response.data.deskripsi);
        $(".btn-hapus").show();
    }

    function konfirmasiDelete() {
        $("#kategori").modal('hide');
        $(".modal-title").html("Hapus Kategori");
        $("#hapus_kategori").modal('show');
        $("#id-divisi-kategori").val($("#id-kategori").val());
    }
</script>
<?php getFooterDashboard(); ?>