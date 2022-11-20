<?php getNavbarAdmin(); ?>
<?php getSidebarAdmin() ?>
<!-- Main Content -->
<div class="main-content">
    <!-- Modal Pengelola pengaduan -->
    <div class="modal fade" tabindex="-1" role="dialog" id="pengaduan">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pengaduan</h5>
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
                                <input type="text" class="form-control" id="judul" placeholder="Judul Pengaduan" required="" readonly>
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
                                <input type="text" class="form-control" id="tanggal_terkirim" readonly>
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
                                <label>Status pengaduan</label>
                                <div class="input-group status-pengaduan-terproses">
                                    <select class="form-control" id="status-pengaduan-terproses" name="status">
                                        <option value="proses">Dalam Tindak Lanjut</option>
                                        <option value="selesai">Selesai</option>
                                    </select>
                                </div>
                                <div class="input-group status-pengaduan-blm-proses">
                                    <input type="text" class="form-control" id="status-pengaduan-blm-proses" readonly>
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label>Divisi</label>
                                <div class="input-group">
                                    <select class="form-control" id="divisi">
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
                                        <div class="form-group col-12 lampiran-tanggapan">
                                            <label>Lampiran</label>
                                            <div class="input-groups mb-2">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="lampiran" id="lampiran_tanggapan">
                                                    <label class="custom-file-label" id="label-input-foto" for="foto">Pilih Lampiran</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 downloard-lampiran">
                                            <label>Lampiran</label>
                                            <a id="lampiran" target="_blank" class="form-control" href="">Downloard - Judul Lampiran</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke py-4">
                        <button type="button" class="btn btn-secondary btn-batal" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-danger btn-tangguhkan">Tangguhkan Pengaduan</button>
                        <button type="button" class="btn btn-info btn-sampaikan-tanggapan">Sampaikan Kedivisi</button>
                        <button type="button" class="btn btn-warning btn-proses-tanggapan">Proses Pengaduan</button>
                        <button type="submit" class="btn btn-primary btn-selesai-tanggapan">Selesai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Aksi Detail pengaduan -->
    <div class="modal fade" tabindex="-1" role="dialog" id="detail-pengaduan">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title modal-title-detail-pengaduan">Detail Pengaduan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="info-user">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="id">ID User</label>
                                    <input type="text" class="form-control" id="id-pengirim" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama-pengirim" placeholder="Ketikkan Nama Lengkap" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email-pengirim" placeholder="Ketikkan Email" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal-lahir-pengirim" disabled />
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat-pengirim" placeholder="Ketikkan Alamat" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="kontak">No Telp / Whatapps</label>
                                    <input type="number" class="form-control" id="kontak-pengirim" placeholder="Ketikkan Kontak" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="input-group">
                                        <select class="form-control" id="status-pengirim" disabled>
                                            <option value="mahasiswa_mahasiswi">Mahasiswa / Mahasiswi</option>
                                            <option value="dosen">Dosen</option>
                                            <option value="staf">Staf</option>
                                            <option value="masyarakat">Masyarakat</option>
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
                                                <img id="foto-user" class="rounded-circle" alt="foto" src="" height="150">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke">
                        <button type="submit" class="btn btn-primary" onclick="closeDetailInfo()">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="section-header">
            <h1>Pengaduan</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Data Pengaduan Selesai</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-pengaduan" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Bobot Masalah</th>
                                    <th>Tanggal Diterima</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($data["pengaduan"] as $pengaduan) :
                                ?>
                                    <tr>
                                        <td>
                                            <?= $i++; ?>
                                        </td>
                                        <td><?= $pengaduan["judul"] ?></td>
                                        <td><?= $pengaduan["kategori"] ?></td>
                                        <td><?= $pengaduan["bobot"] ?></td>
                                        <td><?= date("d-m-Y s:m:h", strtotime($pengaduan["created_at"])) ?></td>
                                        <td>
                                            <div class="badge badge-<?= $pengaduan["status"] == "ditangguhkan" ? "danger" : "success"  ?>"><?= ucwords(str_replace("_", " ", $pengaduan["status"])); ?></div>
                                        </td>
                                        <td><button type="button" class="btn btn-secondary" onclick="getDetail(`<?= $pengaduan['id'] ?>`)">Detail</button></td>
                                    </tr>
                                <?php
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    // UTILS
    function Ucfirst(str) {
        return str[0].toUpperCase() + str.slice(1);
    }

    function Ucwords(str) {
        let string = [];
        let letters = str.split("_");
        letters.forEach(letter => string.push(Ucfirst(letter)));
        return string.join(" ");
    }

    function StringToURI(str) {
        return str.replaceAll(/ /g, "%20");
    }

    $('.table-pengaduan').DataTable({
        language: {
            url: '<?= BaseURL(); ?>/public/vendor/datatables/indonesia.json'
        }
    });

    // GET DIVISI
    async function getDivisi() {
        $("#divisi option").remove();
        const divisi = await fetch("<?= BaseURL() ?>/api/divisi");
        const response = await divisi.json();
        const result = response.data;
        if (result.length == 0) return Swal.fire("ERROR", `Gagal mengambil data divisi`, "error");
        return result;
    }

    // GET DETAIL
    async function getDetail(id) {
        // Data Divisi
        const divisi = await getDivisi();
        divisi.forEach((item) => {
            $("#divisi").append(`
            <option value='${item.nama}'>${item.nama}</option>
            `);
        })
        // Data Detail
        const detail = await fetch(`<?= BaseURL() ?>/api/pengaduan/${id}`);
        const response = await detail.json();
        const result = response.data;
        if (result.length == 0) {
            Swal.fire("ERROR", `Gagal mengambil detail pengaduan ${id}`, "error");
        } else {
            $("#pengaduan").modal("show");
            $("#id_antrian").val(result.id);
            $("#judul").val(result.judul);
            $("#deskripsi").val(result.deskripsi);
            $("#kategori").val(result.kategori);
            $("#tanggal_terkirim").val(result.created_at);
            $(".info-user")[0].dataset.user = result.pengirim;
            $("#pengirim").val(result.pengirim);
            $(".location")[0].dataset.location = result.lokasi;
            $("#lokasi").val(result.lokasi);
            // Status pengaduan
            if (result.status == "ditangguhkan") {
                // Bussines status pengaduan
                $(".status-pengaduan-terproses").hide();
                $(".status-pengaduan-blm-proses").show();
                $("#status-pengaduan-blm-proses").val(Ucwords(result.status));
                if (result.status == "ditangguhkan") {
                    $("#divisi").attr("disabled", "disabled");
                    $(".form-tanggapan").show();
                    // Button
                    $(".modal-footer").hide();
                    $(".lampiran-tanggapan").hide();
                    $("#deskripsi_tanggapan").attr("disabled", "disabled");
                } else {
                    $("#divisi").removeAttr("disabled");
                    $(".form-tanggapan").hide();
                    // All Buttton
                    $(".modal-footer").show();
                    $(".btn-tangguhkan").show();
                    $(".btn-sampaikan-tanggapan").hide();
                    $(".btn-proses-tanggapan").show();
                    $(".btn-selesai-tanggapan").hide();
                }
            } else {
                $(".status-pengaduan-blm-proses").hide();
                $(".status-pengaduan-terproses").show();
                $("#status-pengaduan-terproses").val(result.status);
                $("#divisi").attr("disabled", "disabled");
                // Jika status dalam tindak lanjut
                if (result.status == "proses") {
                    $(".form-tanggapan").hide();
                    $("#status-pengaduan-terproses").removeAttr("disabled");
                    // All Buttton
                    $(".modal-footer").show();
                    $(".btn-tangguhkan").show();
                    $(".btn-sampaikan-tanggapan").show();
                    $(".btn-proses-tanggapan").hide();
                    $(".btn-selesai-tanggapan").hide();
                } else {
                    $(".form-tanggapan").show();
                    $("#status-pengaduan-terproses").attr("disabled", "disabled");
                    $("#deskripsi_tanggapan").attr("disabled", "disabled");
                    $(".lampiran-tanggapan").show();
                    $("#lampiran_tanggapan").attr("disabled", "disabled");
                    $(".modal-footer").hide();
                }
            }
            // Divisi
            $("#divisi").val(result.divisi);
            $("#deskripsi_tanggapan").val(result.tanggapan);
            $(".lampiran-tanggapan").hide();
            if (result.lampiran != null) {
                $(".downloard-lampiran").show();
                $("#lampiran").removeAttr("disabled");
                $("#lampiran").text(result.lampiran);
                $("#lampiran").attr("href", `<?= BaseURL() ?>/public/upload/assets/document/pengaduan/${result.lampiran}`);
            } else {
                $(".downloard-lampiran").hide();
            }
        };
    }
    // SHOW USER
    $(".info-user").click(async (e) => {
        const id = e.currentTarget.dataset.user;
        const users = await fetch(`<?= BaseURL() ?>/api/pengguna/${id}`);
        const response = await users.json();
        const result = response.data;
        $(".modal-title-detail-pengaduan").text("Pengirim Aduan");
        $("#id-pengirim").val(result.id);
        $("#nama-pengirim").val(result.nama);
        $("#email-pengirim").val(result.email);
        $("#tanggal-lahir-pengirim").val(result.tgl_lahir);
        $("#alamat-pengirim").val(result.alamat);
        $("#kontak-pengirim").val(result.kontak);
        $("#status-pengirim").val(result.status);
        $("#foto-user").attr("src", "<?= BaseURL(); ?>/public/upload/assets/images/" + result.foto);
        $("#pengaduan").modal("hide");
        $("#info-user").show();
        $("#konfirmasi-tindak-lanjut").hide();
        setTimeout(() => {
            $("#detail-pengaduan").modal("show");
        }, 500);
    });

    // WHEN CLOSE DETAIL INFO
    function closeDetailInfo() {
        $("#detail-pengaduan").modal("hide");
        setTimeout(() => {
            $("#pengaduan").modal("show");
        }, 500);
    }

    // SHOW LOCATION
    $(".location").click((e) => {
        const location = e.currentTarget.dataset.location;
        if (location != "Akses tidak diberikan")
            window.open(`https://www.google.com/maps?q=${location}`, '_blank');
    });
</script>
<?php getFooterDashboard(); ?>