<!-- Hero -->
<section class="hero">
    <?php getNavbarHome(); ?>
</section>
<!-- Login -->
<section id="form-lapor" class="mt-[-570px] lg:mt-[-550px]">
    <div class="container flex flex-col items-center text-center text-white max-w-[950px] mt-36">
        <h1 class="md:text-4xl text-3xl font-bold tracking-wide">Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember</h1>
        <p class="md:text-xl text-lg mt-8 font-light">Sampaikan laporan Anda langsung kepada divisi yang berwenang</p>
        <hr class="w-[200px] my-[50px] border-t-4 ">
    </div>
    <div class="container drop-shadow-xl max-w-3xl">
        <div class="bg-white py-11 px-10">
            <div class="flex text-blue-800 font-bold justify-center mb-11">
                <i data-feather="log-in" style="width:35px;height: 35px;left: 140px;top: 17px; margin-right:10px"></i>
                <h5 class="md:text-3xl text-xl"> Daftar</h5>
            </div>
            <form action="<?= BaseURL() ?>/auth/daftar" method="POST">
                <div class="flex flex-col mb-5">
                    <label for="nama_lengkap" class="text-gray-700">Nama Lengkap</label>
                    <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="nama_lengkap" aria-describedby="nama_lengkap" name="nama_lengkap" placeholder="Ketikkan Nama Lengkap" maxlength="64" required>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="status" class="text-gray-700">Tanggal Lahir</label>
                    <input type="date" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="tgl_lahir" aria-describedby="tgl_lahir" value="<?= date("Y-m-d") ?>" name="tgl_lahir">
                </div>
                <div class="flex flex-col mb-5">
                    <label for="status" class="text-gray-700">Jenis Kelamin</label>
                    <select class="mt-3 border border-gray-400 py-3 px-2 rounded" name="jenis_kelamin" id="jenis-kelamin">
                        <option value="laki-laki">Laki - Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="email" class="text-gray-700">Email</label>
                    <input type="email" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="email" aria-describedby="email" name="email" placeholder="Ketikkan Email" maxlength="45" required>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="password" class="text-gray-700">Password</label>
                    <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="password" aria-describedby="password" name="password" placeholder="Ketikkan Password" maxlength="64" required>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="password2" class="text-gray-700">Konfirmasi Password</label>
                    <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="password2" aria-describedby="password2" name="password2" placeholder="Ketikkan Konfirmasi Password" maxlength="64" required>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="notelp" class="text-gray-700">No Telp / Whatapps</label>
                    <input type="number" class="mt-3 border border-gray-400 py-3 px-2 rounded" maxlength="13" minlength="10" id="notelp" aria-describedby="notelp" name="kontak" placeholder="Ketikkan No Telp / Whatapps" maxlength="18" required>
                </div>
                <div class="flex flex-col mb-10">
                    <label for="status" class="text-gray-700">Status</label>
                    <select class="mt-3 border border-gray-400 py-3 px-2 rounded" name="status" id="status">
                        <option value="mahasiswa_mahasiswi">Mahasiswa / Mahasiswi</option>
                        <option value="dosen">Dosen</option>
                        <option value="staf">Staf</option>
                        <option value="masyarakat">Masyarakat</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="text-xl text-white w-full rounded bg-blue-800 py-4 font-bold tracking-wide hover:bg-blue-900 hover:drop-shadow-lg">DAFTAR</button>
                <div class="flex space-x-3 mt-5">
                    <p>Sudah punya akun ?</p>
                    <a href="<?= BaseURL() ?>/auth" class="text-blue-800 font-ligth">Masuk</a>
                </div>
            </form>
        </div>
    </div>
</section>
<?php getFooterCopyright(); ?>