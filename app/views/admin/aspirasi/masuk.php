<?php getNavbarAdmin(); ?>
<?php getSidebarAdmin() ?>
<!-- Main Content -->
<div class="main-content">
    <!-- Modal Pengelola aspirasi -->
    <div class="modal fade" tabindex="-1" role="dialog" id="aspirasi">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Aspirasi</h5>
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
                                <label>Status Aspirasi</label>
                                <div class="input-group status-aspirasi-terproses">
                                    <select class="form-control" id="status-aspirasi-terproses" name="status">
                                        <option value="proses">Dalam Tindak Lanjut</option>
                                        <option value="selesai">Selesai</option>
                                    </select>
                                </div>
                                <div class="input-group status-aspirasi-blm-proses">
                                    <input type="text" class="form-control" id="status-aspirasi-blm-proses" readonly>
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label>Divisi</label>
                                <div class="input-group">
                                    <select class="form-control" id="divisi">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label>Lampiran</label>
                                <div class="input-group">
                                    <p id="lampiran_pengirim_none">Tidak Ada Lampiran</p>
                                    <a href="#" target="_blank" rel="noopener noreferrer" id="lampiran_pengirim_link"></a>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke py-4">
                        <button type="button" class="btn btn-secondary btn-batal" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-danger btn-tangguhkan">Tangguhkan aspirasi</button>
                        <button type="button" class="btn btn-info btn-sampaikan-tanggapan">Sampaikan Kedivisi</button>
                        <button type="button" class="btn btn-warning btn-proses-tanggapan">Proses Aspirasi</button>
                        <button type="submit" class="btn btn-primary btn-selesai-tanggapan">Selesai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Aksi Detail aspirasi -->
    <div class="modal fade" tabindex="-1" role="dialog" id="detail-aspirasi">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title modal-title-detail-aspirasi">Detail Aspirasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="konfirmasi-tangguhkan">
                    <form action="<?= BaseURL() ?>/admin/aspirasi/tangguhkan" method="post">
                        <div class="modal-body">
                            <input type="text" id="id-konfirmasi-tangguhkan" name="id" class="d-none">
                            <p>Setelah Aspirasi ditangguhkan, status tidak dapat dirubah</p>
                            <div class="row alasan-konfirmasi-tangguhkan">
                                <div class="form-group col-12">
                                    <label>Alasan Ditangguhkan</label>
                                    <textarea class="form-control" name="alasan-ditangguhkan" rows="6" placeholder="Ketikkan Alasan" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-batal" data-dismiss="modal">Batal</button>
                            <button type="submit" name="submit" class="btn btn-primary">Ya, Tangguhkan</button>
                        </div>
                    </form>
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
                    <div class="modal-footer modal-footer-info-user bg-whitesmoke">
                        <button type="submit" class="btn btn-primary" onclick="closeDetailInfo()">OK</button>
                    </div>
                </div>
                <div id="konfirmasi-tindak-lanjut">
                    <form action="<?= BaseURL() ?>/admin/aspirasi/toproses" method="post">
                        <div class="modal-body">
                            <div class="row">
                                <input type="text" class="d-none" name="id-konfir-tindak-lanjut" id="id-konfir-tindak-lanjut">
                                <div class="form-group col-12">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" id="tindak-lanjut-deskripsi" rows="6" placeholder="Ketikkan Deskripsi" readonly></textarea>
                                </div>
                                <div class="form-group col-12">
                                    <label>Divisi</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="tindak-lanjut-divisi" placeholder="Divisi" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <label>Kontak Divisi</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card card-large-icons">
                                                <div class="card-icon bg-primary text-white">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                                <div class="card-body">
                                                    <p class="font-weight-bold text-dark">Email</p>
                                                    <p id="kontak-divisi-email">hi@aristoc.space</p>
                                                    <button type="button" class="btn btn-link p-0 card-cta" onclick="contactDivisiEmail()">Hubungi</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card card-large-icons">
                                                <div class="card-icon bg-primary text-white">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                                <div class="card-body">
                                                    <p class="font-weight-bold text-dark">No Telp / Whatappas</p>
                                                    <p id="kontak-divisi-notelp">085235119101</p>
                                                    <button type="button" class="btn btn-link p-0 card-cta" data-toggle="modal" onclick="contactDivisiWA()">Hubungi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" id="check-penyampain-divisi" type="checkbox">
                                        <label class="form-check-label">
                                            Saya sudah menyampaikan aspirasi kepada divisi yang berwenang
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke footer-konfirmasi-tindak-lanjut">
                            <button type="button" class="btn btn-secondary btn-batal" data-dismiss="modal">Batal</button>
                            <button type="submit" name="submit" class="btn btn-primary">Ubah status ke Tindak Lanjut</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="section-header">
            <h1>Aspirasi</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Data Aspirasi Masuk</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-aspirasi" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th>Deskripsi</th>
                                    <th>Kategori</th>
                                    <th>Tanggal Diterima</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($data["aspirasi"] as $aspirasi) :
                                ?>
                                    <tr>
                                        <td>
                                            <?= $i++; ?>
                                        </td>
                                        <?php
                                        $aspirasi_deskripsi = strlen($aspirasi["deskripsi"]) > 50 ? substr($aspirasi["deskripsi"], 0, 30) . " ..." : $aspirasi["deskripsi"];
                                        ?>
                                        <td><?= $aspirasi_deskripsi ?></td>
                                        <td><?= $aspirasi["kategori"] ?></td>
                                        <td><?= date("d-m-Y s:m:h", strtotime($aspirasi["created_at"])) ?></td>
                                        <td>
                                            <div class="badge badge-warning"><?= ucwords(str_replace("_", " ", $aspirasi["status"])); ?></div>
                                        </td>
                                        <td><button type="button" class="btn btn-secondary" onclick="getDetail(`<?= $aspirasi['id'] ?>`)">Detail</button></td>
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

    $('.table-aspirasi').DataTable({
        language: {
            url: '<?= BaseURL(); ?>/public/vendor/datatables/indonesia.json'
        }
    });

    // GET DIVISI
    async function getDivisi() {
        $("#divisi option").remove();
        const divisi = await fetch("<?= BaseURL() ?>/api/divisi");
        const response = await divisi.json();
        const result = response.data
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
        const detail = await fetch(`<?= BaseURL() ?>/api/aspirasi/${id}`);
        const response = await detail.json();
        const result = response.data;
        if (result.length == 0) {
            Swal.fire("ERROR", `Gagal mengambil detail aspirasi ${id}`, "error");
        } else {
            $("#aspirasi").modal("show");
            $("#id_antrian").val(result.id);
            $("#deskripsi").val(result.deskripsi);
            $("#kategori").val(result.kategori);
            $("#tanggal_terkirim").val(moment(result.created_at, "DD-MM-YYYY ss:mm:hh"));
            $(".info-user")[0].dataset.user = result.pengirim;
            $("#pengirim").val(result.pengirim);
            $(".location")[0].dataset.location = result.lokasi;
            $("#lokasi").val(result.lokasi);
            // Status aspirasi
            if (result.status == "belum_ditanggapi") {
                // Bussines status aspirasi
                $(".status-aspirasi-terproses").hide();
                $(".status-aspirasi-blm-proses").show();
                $("#status-aspirasi-blm-proses").val(Ucwords(result.status));
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
            }
            // Divisi
            $("#divisi").val(result.divisi);
            // lampiran
            if (result.lampiran_pengirim != null) {
                $("#lampiran_pengirim_none").hide();
                $("#lampiran_pengirim_link").show();
                $("#lampiran_pengirim_link").text(result.lampiran_pengirim);
                $("#lampiran_pengirim_link").attr("href", `<?= BaseURL() ?>/public/upload/assets/document/aspirasi/${result.lampiran_pengirim}`);
            } else {
                $("#lampiran_pengirim_none").show();
                $("#lampiran_pengirim_link").hide();
                $("#lampiran_pengirim_link").text("");
                $("#lampiran_pengirim_link").attr("href", "");
            }
        };
    }

    // CHANGE PROSES TO SELESAI
    $("#status-aspirasi-terproses").change((e) => {
        if (e.currentTarget.value == "selesai") {
            $(".form-tanggapan").show();
            $("#deskripsi_tanggapan").removeAttr("disabled");
            $("#lampiran_tanggapan").removeAttr("disabled");
            $(".btn-tangguhkan").hide();
            $(".btn-sampaikan-tanggapan").hide();
            $(".btn-proses-tanggapan").hide();
            $(".btn-selesai-tanggapan").show();
        } else {
            $(".form-tanggapan").hide()
            $("#deskripsi_tanggapan").attr("disabled", "disabled");
            $("#lampiran_tanggapan").attr("disabled", "disabled");
            $(".btn-tangguhkan").show();
            $(".btn-sampaikan-tanggapan").show();
            $(".btn-proses-tanggapan").hide();
            $(".btn-selesai-tanggapan").hide();
        }
    })

    // SHOW USER
    $(".info-user").click(async (e) => {
        const id = e.currentTarget.dataset.user;
        const users = await fetch(`<?= BaseURL() ?>/api/pengguna/${id}`);
        const response = await users.json();
        const result = response.data;
        $(".modal-title-detail-aspirasi").text("aspirasi Pengirim");
        $("#id-pengirim").val(result.id);
        $("#nama-pengirim").val(result.nama);
        $("#email-pengirim").val(result.email);
        $("#tanggal-lahir-pengirim").val(result.tgl_lahir);
        $("#alamat-pengirim").val(result.alamat);
        $("#kontak-pengirim").val(result.kontak);
        $("#status-pengirim").val(result.status);
        $("#foto-user").attr("src", "<?= BaseURL(); ?>/public/upload/assets/images/" + result.foto);
        $("#aspirasi").modal("hide");
        $("#info-user").show();
        $(".modal-footer-info-user").show();
        setTimeout(() => {
            $("#konfirmasi-tangguhkan").hide();
            $("#detail-aspirasi").modal("show");
            $("#konfirmasi-tindak-lanjut").hide();
        }, 500);
    });

    // TANGGUHKAN aspirasi
    $(".btn-tangguhkan").click((e) => {
        $("#id-konfirmasi-tangguhkan").val($("#id_antrian").val());
        console.log($("#id-konfirmasi-tangguhkan").val());
        $("#aspirasi").modal("hide");
        setTimeout(() => {
            $("#detail-aspirasi").modal("show");
            $(".modal-title-detail-aspirasi").text("Tangguhkan aspirasi");
            $("#konfirmasi-tangguhkan").show();
            $("#info-user").hide();
            $("#konfirmasi-tindak-lanjut").hide();
        }, 500);
    })

    // PROSES INFROMASI
    $(".btn-proses-tanggapan").click((e) => {
        const id = $("#id_antrian").val();
        const judul = $("#judul").val();
        const deskripsi = $("#deskripsi").val();
        const divisi = $("#divisi").val();
        $("#aspirasi").modal("hide");
        setTimeout(async () => {
            const allDivisi = await getDivisi();
            const confirmDivisi = allDivisi.filter(div => div.nama == divisi);
            $("#detail-aspirasi").modal("show");
            $(".modal-title-detail-aspirasi").text("Proses aspirasi");
            $("#info-user").hide();
            $("#konfirmasi-tangguhkan").hide();
            $("#konfirmasi-tindak-lanjut").show();
            $("#konfirmasi-tangguhkan").hide();
            $("#id-konfir-tindak-lanjut").val(id);
            $("#tindak-lanjut-judul").val(judul);
            $("#tindak-lanjut-deskripsi").val(deskripsi);
            $("#tindak-lanjut-divisi").val(divisi);
            $("#kontak-divisi-email").text(confirmDivisi[0].email);
            $("#kontak-divisi-notelp").text(confirmDivisi[0].kontak);
            $("#check-penyampain-divisi").prop('checked', false);
            $(".footer-konfirmasi-tindak-lanjut").hide();
        }, 500);
    });

    // PROSES CHECKBOX SUDAH DISAMPAIKAN
    $("#check-penyampain-divisi").change((e) => {
        if (e.currentTarget.checked) {
            $(".footer-konfirmasi-tindak-lanjut").show();
        } else {
            $(".footer-konfirmasi-tindak-lanjut").hide();
        }
    })

    // KONTAK DIVISI EMAIL
    function contactDivisiEmail() {
        const id = $("#id-konfir-tindak-lanjut").val();
        const email = $("#kontak-divisi-email").text();
        const judul = $("#tindak-lanjut-judul").val();
        const deskripsi = $("#tindak-lanjut-deskripsi").val();
        let subject = `POLIJE - aspirasi | ${id}`;
        let message = `Judul : ${judul} | Pesan : ${deskripsi}`;
        window.open(`mailto:${email}?subject=${StringToURI(subject)}&body=${message}`);
    }

    // KONTAK DIVISI WHATAPPS
    function contactDivisiWA() {
        const id = $("#id-konfir-tindak-lanjut").val();
        const notelp = $("#kontak-divisi-notelp").text();
        const judul = $("#tindak-lanjut-judul").val();
        const deskripsi = $("#tindak-lanjut-deskripsi").val();
        let subject = `*POLIJE - aspirasi | ${id}*`;
        let message = `*Judul :* ${judul} | *Pesan :* ${deskripsi}`;
        window.open(`https://wa.me/${notelp}?text=${subject}, ${message}`);
    }

    // WHEN CLOSE DETAIL INFO
    function closeDetailInfo() {
        $("#detail-aspirasi").modal("hide");
        setTimeout(() => {
            $("#aspirasi").modal("show");
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