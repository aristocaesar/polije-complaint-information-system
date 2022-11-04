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
                <form class="mt-4 formSave" action="<?= BaseURL(); ?>/admin/divisi/save" method="POST">
                    <div class="modal-body">
                        <input id="id-divisi" type="text" name="add" class="d-none">
                        <div class="form-group">
                            <label for="nama_divisi">Nama Divisi</label>
                            <input type="text" class="form-control" name="nama" id="nama_divisi" placeholder="Ketikkan Nama divisi">
                        </div>
                        <div class="form-group">
                            <label for="deksripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="6" placeholder="Ketikkan Deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="penanggung_jawab">Nama Penanggung Jawab</label>
                            <input type="text" class="form-control" name="penanggung_jawab" id="penanggung_jawab" placeholder="Ketikkan Nama Divisi">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Ketikkan Email">
                        </div>
                        <div class="form-group">
                            <label for="kontak">No Telp / Whatsapp</label>
                            <input type="tel" class="form-control" name="kontak" id="kontak" placeholder="Ketikkan No Telp / Divisi">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="6" placeholder="Ketikkan Alamat"></textarea>
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
                        <input id="id-divisi-divisi" type="text" name="delete" class="d-none" value="">
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
                                            <th>Penanggung Jawab</th>
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
    async function getDivisi() {
        const divisies = await fetch("<?= BaseURL(); ?>/api/divisi/");
        const response = await divisies.json();
        let tableItems = [];
        response.data.forEach((divisi, index) => {
            tableItems.push(
                `<tr>
                    <td>
                        ${index + 1}
                    </td>
                    <td>${divisi.nama}</td>
                    <td>${divisi.deskripsi}</td>
                    <td>${divisi.penanggung_jawab}</td>
                    <td><button type="button" id="${divisi.nama}" class="btn btn-secondary" data-toggle="modal" data-target="#divisi" onclick="Detail(this.id)">Detail</button></td>
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
    getDivisi();

    function Add() {
        // Modal Tambah
        $("#id-divisi").attr("name", "add");
        $("#id-divisi").val("");
        $(".modal-title").html("Tambah Divisi");
        $(".formSave").attr("action", "<?= BaseURL(); ?>/admin/divisi/save");
        $("#nama_divisi").val("");
        $("#deskripsi").val("");
        $("#penanggung_jawab").val("");
        $("#email").val("");
        $("#kontak").val("");
        $("#alamat").val("");
        $(".btn-hapus").hide("");
    }

    async function Detail(nama) {
        nama = nama.replaceAll(/ /g, "-");
        const divisi = await fetch(`<?= BaseURL(); ?>/api/divisi/${nama}`);
        const response = await divisi.json();

        $("#id-divisi").attr("name", "update");
        $("#id-divisi").val(nama);
        $(".modal-title").html("Edit Divisi");
        $(".formSave").attr("action", "<?= BaseURL(); ?>/admin/divisi/update");
        $("#nama_divisi").val(response.data.nama);
        $("#deskripsi").val(response.data.deskripsi);
        $("#penanggung_jawab").val(response.data.penanggung_jawab);
        $("#email").val(response.data.email);
        $("#kontak").val(response.data.kontak);
        $("#alamat").val(response.data.alamat);
        $(".btn-hapus").show();
    }

    function konfirmasiDelete() {
        $("#divisi").modal('hide');
        $(".modal-title").html("Hapus Divisi");
        $("#hapus_divisi").modal('show');
        $("#id-divisi-divisi").val($("#id-divisi").val());
    }
</script>
<?php getFooterDashboard(); ?>