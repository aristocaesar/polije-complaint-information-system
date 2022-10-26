<?php getNavbarAdmin(); ?>
<?php getSidebarAdmin() ?>
<!-- Main Content -->
<div class="main-content">
    <!-- Modal Pengelola Informasi -->
    <div class="modal fade" tabindex="-1" role="dialog" id="informasi">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Informasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="mt-4" action="<?= BaseURL() ?>/" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Nomor Antrian</label>
                                <input type="text" class="form-control" id="id_antrian" placeholder="Nomor Antrian" required="" readonly>
                            </div>
                            <div class="form-group col-12">
                                <label>Judul</label>
                                <input type="text" class="form-control" id="judul" placeholder="Judul Informasi" required="" readonly>
                            </div>
                            <div class="form-group col-12">
                                <label>Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" rows="6" placeholder="Ketikkan Deskripsi" readonly></textarea>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label>Kategori</label>
                                <input type="text" class="form-control" id="kategori" placeholder="Kategori" readonly>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label>Tanggal Terkirim</label>
                                <input type="date" class="form-control" id="tanggal_terkirim" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label>Pengirim</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text info-user" data-user="" style="cursor: pointer;">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="pengirim" placeholder="Pengirim" readonly>
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label>Lokasi</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text location" data-location="" style="cursor: pointer;">
                                            <i class="fas fa-map"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="lokasi" placeholder="Lokasi" readonly>
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label>Status Informasi</label>
                                <div class="input-group status-informasi-terproses">
                                    <select class="form-control" id="status-informasi-terproses" name="status">
                                        <option value="proses">Dalam Tindak Lanjut</option>
                                        <option value="selesai">Selesai</option>
                                    </select>
                                </div>
                                <div class="input-group status-informasi-blm-proses">
                                    <input type="text" class="form-control" id="status-informasi-blm-proses" readonly>
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label>Divisi</label>
                                <div class="input-group">
                                    <select class="form-control" id="divisi">
                                        <option value="mahasiswa_mahasiswi">Mahasiswa / Mahasiswi</option>
                                        <option value="dosen">Dosen</option>
                                        <option value="staf">Staf</option>
                                        <option value="masyarakat">Masyarakat</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-tanggapan">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Tanggapan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Deskripsi</label>
                                            <textarea class="form-control" name="Tanggapan" id="deskripsi_tanggapan" rows="6" placeholder="Ketikkan Tanggapan"></textarea>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Lampiran</label>
                                            <div class="input-groups mb-2">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="lampiran" id="lampiran_tanggapan">
                                                    <label class="custom-file-label" id="label-input-foto" for="foto">Pilih Lampiran</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke py-4">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-danger btn-tangguhkan">Tangguhkan Informasi</button>
                        <button type="button" class="btn btn-info btn-sampaikan-tanggapan">Sampaikan</button>
                        <button type="button" class="btn btn-warning btn-proses-tanggapan">Proses Informasi</button>
                        <button type="submit" class="btn btn-primary btn-selesai-tanggapan">Selesai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="section-header">
            <h1>Informasi</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Data Informasi Masuk</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Tanggal Terkirim</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        #INFO2510202266
                                    </td>
                                    <td>Apakah layanan ini dikelola dengan baik </td>
                                    <td>Terkait Aplikasi</td>
                                    <td>25/10/2021</td>
                                    <td>
                                        <div class="badge badge-warning">Belum Ditanggapi</div>
                                    </td>
                                    <td><button type="button" id="INFO2510202266 " class="btn btn-secondary" onclick="getDetail(this.id)">Detail</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    // GET DETAIL
    async function getDetail(id) {
        const detail = await fetch(`http://localhost:3000/informasi?id=${id}`);
        const response = await detail.json();
        if (response.length == 0) {
            Swal.fire("ERROR", `Gagal mengambil detail informasi ${id}`, "error");
        } else {
            const result = response[0];
            $("#informasi").modal("show");
            $("#id_antrian").val(result.id);
            $("#judul").val(result.judul);
            $("#deskripsi").val(result.deskripsi);
            $("#kategori").val(result.kategori);
            $("#tanggal_terkirim").val();
            $(".info-user")[0].dataset.user = result.id_pengirim;
            $("#pengirim").val(result.id_pengirim);
            $(".location")[0].dataset.location = result.lokasi;
            $("#lokasi").val(result.lokasi);
            // Status Informasi
            if (result.status == "belum_ditanggapi" || result.status == "ditangguhkan") {
                $(".status-informasi-blm-proses").show();
                $(".status-informasi-terproses").hide();
                $("#status-informasi-blm-proses").val(Ucwords(result.status));
                // Form Tanggapan
                $(".form-tanggapan").hide();
            } else {
                $(".status-informasi-blm-proses").hide();
                $("#status-informasi-terproses").val(result.status);
                // Jika status dalam tindak lanjut
                if (result.status == "proses") {
                    $(".form-tanggapan").hide();
                } else {
                    $(".form-tanggapan").show();
                    $("#status-informasi-terproses").attr("disabled", "disabled");
                    $("#divisi").attr("disabled", "disabled");
                    $("#deskripsi_tanggapan").attr("disabled", "disabled");
                    $("#lampiran_tanggapan").attr("disabled", "disabled");
                }
            }
        };

    }

    // CHANGE PROSES TO SELESAI
    $("#status-informasi-terproses").change((e) => {
        if (e.currentTarget.value == "selesai") {
            $("#divisi").attr("disabled", "disabled");
            $(".form-tanggapan").show();
        } else {
            $("#divisi").removeAttr("disabled");
            $(".form-tanggapan").hide();
        }
    })

    // SHOW USER
    $(".info-user").click((e) => console.log(e));

    // SHOW LOCATION
    $(".location").click((e) => {
        const location = e.currentTarget.dataset.location;
        if (location != "Akses tidak diberikan")
            window.open(`https://www.google.com/maps?q=${location}`, '_blank');
    });

    // IF CHANGE VALUE ON STATUS INFORMASI
</script>
<?php getFooterDashboard(); ?>