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
                <form class="mt-4" action="<?= BaseURL() ?>/admin/pengaduan/toselesai" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Nomor Antrian</label>
                                <input type="text" class="form-control" id="id_antrian" name="id" placeholder="Nomor Antrian" required="" readonly>
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
                                    <select class="form-control" id="status-pengaduan-terproses">
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
                                            <textarea class="form-control" name="tanggapan" id="deskripsi_tanggapan" rows="6" placeholder="Ketikkan Tanggapan"></textarea>
                                        </div>
                                        <div class="form-group col-12 lampiran-tanggapan">
                                            <label>Lampiran</label>
                                            <div class="input-groups mb-2">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="foto" id="lampiran_tanggapan" onchange="lampiranOnChange(this)">
                                                    <label class="custom-file-label" id="label-input-lampiran" for="foto">Pilih Lampiran</label>
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
                        <button type="button" class="btn btn-danger btn-tangguhkan">Tangguhkan pengaduan</button>
                        <button type="button" class="btn btn-info btn-sampaikan-tanggapan">Sampaikan Kedivisi</button>
                        <button type="button" class="btn btn-warning btn-proses-tanggapan">Proses pengaduan</button>
                        <button type="submit" name="submit" class="btn btn-primary btn-selesai-tanggapan">Selesai</button>
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
                <div id="konfirmasi-tangguhkan">
                    <form action="<?= BaseURL() ?>/admin/pengaduan/tangguhkan" method="post">
                        <div class="modal-body">
                            <input type="text" id="id-konfirmasi-tangguhkan" name="id" class="d-none">
                            <p>Setelah pengaduan ditangguhkan, status tidak dapat dirubah</p>
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
                <div id="konfirmasi-penyampaian-ulang">
                    <div class="modal-body">
                        <div class="row">
                            <input type="text" class="d-none" name="id-divisi-tindak-lanjut" id="id-divisi-tindak-lanjut">
                            <div class="form-group col-12">
                                <label>Deskripsi</label>
                                <textarea class="form-control tindak-lanjut-deskripsi" rows="6" placeholder="Ketikkan Deskripsi" readonly></textarea>
                            </div>
                            <div class="form-group col-12">
                                <label>Divisi</label>
                                <div class="input-group">
                                    <input type="text" class="form-control tindak-lanjut-divisi" placeholder="Divisi" readonly>
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
                                                <p class="kontak-divisi-email">hi@aristoc.space</p>
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
                                                <p class="kontak-divisi-notelp">085235119101</p>
                                                <button type="button" class="btn btn-link p-0 card-cta" data-toggle="modal" onclick="contactDivisiWA()">Hubungi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke footer-HAPUS">
                        <button type="button" class="btn btn-secondary btn-batal" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" onclick="closeDetailInfo()">Sudah Tersampaikan</button>
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
                    <h4>Data Pengaduan Tindak Lanjut</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-pengaduan" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th>Deskripsi</th>
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
                                        <?php
                                        $pengaduan_deskripsi = strlen($pengaduan["deskripsi"]) > 50 ? substr($pengaduan["deskripsi"], 0, 30) . " ..." : $pengaduan["deskripsi"];
                                        ?>
                                        <td><?= $pengaduan_deskripsi ?></td>
                                        <td><?= $pengaduan["kategori"] ?></td>
                                        <td><?= $pengaduan["bobot"] ?></td>
                                        <td><?= date("d-m-Y s:m:h", strtotime($pengaduan["created_at"])) ?></td>
                                        <td>
                                            <div class="badge badge-primary"><?= ucwords(str_replace("_", " ", $pengaduan["status"])); ?></div>
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

    function lampiranOnChange(e) {
        const file = e.files[0];
        $("#label-input-lampiran").text(file.name);
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
            $("#deskripsi").val(result.deskripsi);
            $("#kategori").val(result.kategori);
            $("#tanggal_terkirim").val(result.created_at);
            $(".info-user")[0].dataset.user = result.pengirim;
            if (result.pengirim != null) {
                $("#pengirim").val(result.pengirim);
            } else {
                $("#pengirim").val("Dirahasiakan");
            }
            $(".location")[0].dataset.location = result.lokasi;
            $("#lokasi").val(result.lokasi);
            // Status pengaduan
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
                $("#lampiran_tanggapan").attr("disabled", "disabled");

                $(".modal-footer").hide();
            }
            // Divisi
            $("#divisi").val(result.divisi);
            if (result.lampiran_pengirim != null) {
                $("#lampiran_pengirim_none").hide();
                $("#lampiran_pengirim_link").show();
                $("#lampiran_pengirim_link").text(result.lampiran_pengirim);
                $("#lampiran_pengirim_link").attr("href", `<?= BaseURL() ?>/public/upload/assets/document/pengaduan/${result.lampiran_pengirim}`);
            } else {
                $("#lampiran_pengirim_none").show();
                $("#lampiran_pengirim_link").hide();
                $("#lampiran_pengirim_link").text("");
                $("#lampiran_pengirim_link").attr("href", "");
            }
        };
    }

    // CHANGE PROSES TO SELESAI
    $("#status-pengaduan-terproses").change((e) => {
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
        if (id != "null") {
            const users = await fetch(`<?= BaseURL() ?>/api/pengguna/${id}`);
            const response = await users.json();
            const result = response.data;
            $("#pengaduan").modal("hide");
            setTimeout(() => {
                $(".modal-footer-info-user").show();
                $("#detail-pengaduan").modal("show");
                // content detail pengaduan
                $("#konfirmasi-tangguhkan").hide();
                $("#info-user").show();
                $("#konfirmasi-penyampaian-ulang").hide();
                // set value
                $(".modal-title-detail-pengaduan").text("Pengirim Aduan");
                $("#id-pengirim").val(result.id);
                $("#nama-pengirim").val(result.nama);
                $("#email-pengirim").val(result.email);
                $("#tanggal-lahir-pengirim").val(result.tgl_lahir);
                $("#alamat-pengirim").val(result.alamat);
                $("#kontak-pengirim").val(result.kontak);
                $("#status-pengirim").val(result.status);
                $("#foto-user").attr("src", "<?= BaseURL(); ?>/public/upload/assets/images/" + result.foto);
            }, 500);
        }
    });

    // TANGGUHKAN pengaduan
    $(".btn-tangguhkan").click((e) => {
        $("#id-konfirmasi-tangguhkan").val($("#id_antrian").val());
        $("#pengaduan").modal("hide");
        setTimeout(() => {
            $("#detail-pengaduan").modal("show");
            // content detail pengaduan
            $(".modal-title-detail-pengaduan").text("Tangguhkan Pengaduan");
            $("#konfirmasi-tangguhkan").show();
            $("#info-user").hide();
            $("#konfirmasi-penyampaian-ulang").hide();
        }, 500);
    })

    // KONTAK DIVISI EMAIL
    function contactDivisiEmail() {
        const id = $("#id-divisi-tindak-lanjut").val();
        const email = $(".kontak-divisi-email").text();
        const judul = $(".tindak-lanjut-judul").val();
        const deskripsi = $(".tindak-lanjut-deskripsi").val();
        let subject = `POLIJE - pengaduan | ${id}`;
        let message = `Judul : ${judul} | Pesan : ${deskripsi}`;
        window.open(`mailto:${email}?subject=${StringToURI(subject)}&body=${message}`);
    }

    // KONTAK DIVISI WHATAPPS
    function contactDivisiWA() {
        const id = $("#id-divisi-tindak-lanjut").val();
        const notelp = $(".kontak-divisi-notelp").text();
        const judul = $(".tindak-lanjut-judul").val();
        const deskripsi = $(".tindak-lanjut-deskripsi").val();
        let subject = `*POLIJE - pengaduan | ${id}*`;
        let message = `*Judul :* ${judul} | *Pesan :* ${deskripsi}`;
        window.open(`https://wa.me/${notelp}?text=${subject}, ${message}`);
    }

    // Sampaikan ulang kedivisi
    $(".btn-sampaikan-tanggapan").click((e) => {
        const judul = $("#judul").val();
        const deskripsi = $("#deskripsi").val();
        const divisi = $("#divisi").val();
        $("#pengaduan").modal("hide");
        setTimeout(async () => {
            $("#detail-pengaduan").modal("show");
            // get divisi
            const allDivisi = await getDivisi();
            const confirmDivisi = allDivisi.filter(div => div.nama == divisi);
            // content detail pengaduan
            $(".modal-title-detail-pengaduan").text("Sampaikan Ulang Pengaduan");
            $("#konfirmasi-tangguhkan").hide();
            $("#info-user").hide();
            $("#konfirmasi-penyampaian-ulang").show();

            // set value
            $("#id-divisi-tindak-lanjut").val($("#id_antrian").val());
            $(".tindak-lanjut-judul").val(judul);
            $(".tindak-lanjut-deskripsi").val(deskripsi);
            $(".tindak-lanjut-divisi").val(divisi);
            $(".kontak-divisi-email").text(confirmDivisi[0].email);
            $(".kontak-divisi-notelp").text(confirmDivisi[0].kontak);
        }, 500);
    })

    // WHEN CLOSE DETAIL INFO
    function closeDetailInfo() {
        $("#detail-pengaduan").modal("hide");
        setTimeout(() => {
            $("#pengaduan").modal("show");
            getDetail($("#id_antrian").val());
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