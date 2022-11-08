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
                <div id="konfirmasi-tangguhkan">
                    <form action="<?= BaseURL() ?>/admin/pengaduan/tangguhkan" method="post">
                        <div class="modal-body">
                            <input type="text" id="id-konfirmasi-tangguhkan" class="d-none">
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
                            <button type="submit" name="tangguhkan" class="btn btn-primary">Ya, Tangguhkan</button>
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
                                                <img id="foto-user" class="rounded-circle" alt="foto" src="<?= BaseURL() ?>/public/upload/assets/images/USER-default.png" height="150">
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
                <div id="konfirmasi-tindak-lanjut">
                    <form action="<?= BaseURL() ?>/admin/pengaduan/toproses" method="post">
                        <div class="modal-body">
                            <div class="row">
                                <input type="text" class="d-none" name="id-konfir-tindak-lanjut" id="id-konfir-tindak-lanjut">
                                <div class="form-group col-12">
                                    <label>Judul</label>
                                    <input type="text" class="form-control" id="tindak-lanjut-judul" placeholder="Judul pengaduan" required="" readonly>
                                </div>
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
                                            Saya sudah menyampaikan pengaduan kepada divisi yang berwenang
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke footer-konfirmasi-tindak-lanjut">
                            <button type="button" class="btn btn-secondary btn-batal" data-dismiss="modal">Batal</button>
                            <button type="submit" name="ubah-status-tindak-lanjut" class="btn btn-primary">Ubah status ke Tindak Lanjut</button>
                        </div>
                    </form>
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
                    <h4>Data Pengaduan Masuk</h4>
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
                                    <th>Bobot</th>
                                    <th>Tanggal Diterima</th>
                                    <th>Status</th>
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

    // GET DIVISI
    async function getDivisi() {
        $("#divisi option").remove();
        const divisi = await fetch("http://localhost:3000/divisi");
        const response = await divisi.json();
        if (response.length == 0) return Swal.fire("ERROR", `Gagal mengambil data divisi`, "error");
        return response;
    }

    // GET pengaduan != SELESAI
    async function getPengaduan() {
        const pengaduan = await fetch("http://localhost:3000/pengaduan?status=belum_ditanggapi");
        const response = await pengaduan.json();
        let htmlBody = [];
        response.forEach((adu) => {
            htmlBody.push(
                ` <tr>
                    <td>
                        ${adu.id}
                    </td>
                    <td>${adu.judul}</td>
                    <td>${adu.kategori}</td>
                    <td>${adu.bobot}</td>
                    <td>${adu.created_at}</td>
                    <td>
                        <div class="badge badge-${adu.status == "ditangguhkan" ? "danger" : adu.status == "belum_ditanggapi" ? "warning" : adu.status == "proses" ? "primary" : adu.status == "selesai" ? "success" : ""}">${Ucwords(adu.status)}</div>
                    </td>
                    <td><button type="button" id="${adu.id}" class="btn btn-secondary" onclick="getDetail(this.id)">Detail</button></td>
                </tr>`
            );
        })
        const htmlData = htmlBody.join("");
        $("tbody").html(htmlData).promise().done(() => {
            $('.table-pengaduan').DataTable({
                language: {
                    url: '<?= BaseURL(); ?>/public/vendor/datatables/indonesia.json'
                }
            });
        });
    }
    getPengaduan();

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
        const detail = await fetch(`http://localhost:3000/pengaduan?id=${id}`);
        const response = await detail.json();
        if (response.length == 0) {
            Swal.fire("ERROR", `Gagal mengambil detail pengaduan ${id}`, "error");
        } else {
            const result = response[0];
            $("#pengaduan").modal("show");
            $("#id_antrian").val(result.id);
            $("#judul").val(result.judul);
            $("#deskripsi").val(result.deskripsi);
            $("#kategori").val(result.kategori);
            $("#tanggal_terkirim").val();
            $(".info-user")[0].dataset.user = result.id_pengirim;
            $("#pengirim").val(result.id_pengirim);
            $(".location")[0].dataset.location = result.lokasi;
            $("#lokasi").val(result.lokasi);
            // Status pengaduan
            if (result.status == "belum_ditanggapi") {
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
            }
            // Divisi
            $("#divisi").val(result.divisi);
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
        const users = await fetch(`http://localhost:3000/users?id=${id}`);
        const response = await users.json();
        const result = response[0];
        $(".modal-title-detail-pengaduan").text("Pengirim Aduan");
        $("#id-pengirim").val(result.id);
        $("#nama-pengirim").val(result.nama);
        $("#email-pengirim").val(result.email);
        $("#tanggal-lahir-pengirim").val(result.tgl_lahir);
        $("#alamat-pengirim").val(result.alamat);
        $("#kontak-pengirim").val(result.kontak);
        $("#status-pengirim").val(result.status);
        $("#foto-user").attr("src", "<?= BaseURL(); ?>/" + result.foto);
        $("#pengaduan").modal("hide");
        $("#info-user").show();
        setTimeout(() => {
            $("#konfirmasi-tangguhkan").hide();
            $("#detail-pengaduan").modal("show");
            $("#konfirmasi-tindak-lanjut").hide();
        }, 500);
    });

    // TANGGUHKAN pengaduan
    $(".btn-tangguhkan").click((e) => {
        $("#id-konfirmasi-tangguhkan").val($("#id_antrian").val());
        console.log($("#id-konfirmasi-tangguhkan").val());
        $("#pengaduan").modal("hide");
        setTimeout(() => {
            $("#detail-pengaduan").modal("show");
            $(".modal-title-detail-pengaduan").text("Tangguhkan pengaduan");
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
        $("#pengaduan").modal("hide");
        setTimeout(async () => {
            const allDivisi = await getDivisi();
            const confirmDivisi = allDivisi.filter(div => div.nama == divisi);
            $("#detail-pengaduan").modal("show");
            $(".modal-title-detail-pengaduan").text("Proses pengaduan");
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
        let subject = `POLIJE - pengaduan | ${id}`;
        let message = `Judul : ${judul} | Pesan : ${deskripsi}`;
        window.open(`mailto:${email}?subject=${StringToURI(subject)}&body=${message}`);
    }

    // KONTAK DIVISI WHATAPPS
    function contactDivisiWA() {
        const id = $("#id-konfir-tindak-lanjut").val();
        const notelp = $("#kontak-divisi-notelp").text();
        const judul = $("#tindak-lanjut-judul").val();
        const deskripsi = $("#tindak-lanjut-deskripsi").val();
        let subject = `*POLIJE - pengaduan | ${id}*`;
        let message = `*Judul :* ${judul} | *Pesan :* ${deskripsi}`;
        window.open(`https://wa.me/${notelp}?text=${subject}, ${message}`);
    }

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