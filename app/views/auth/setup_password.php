<!-- Hero -->
<section class="hero">
    <?php getNavbarHome(); ?>
</section>
<!-- Recovery -->
<section id="form-lapor" class="mt-[-570px] lg:mt-[-550px]">
    <div class="container flex flex-col items-center text-center text-white max-w-[950px] mt-36">
        <h1 class="md:text-4xl text-3xl font-bold tracking-wide">Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember</h1>
        <p class="md:text-xl text-lg mt-8 font-light">Sampaikan laporan Anda langsung kepada divisi yang berwenang</p>
        <hr class="w-[200px] my-[50px] border-t-4 ">
    </div>
    <div class="container drop-shadow-xl max-w-3xl">
        <div class="bg-white py-11 px-10">
            <div class="flex text-blue-800 font-bold justify-center mb-11">
                <i data-feather="refresh-cw" style="width:35px;height: 35px;left: 140px;top: 17px; margin-right:10px"></i>
                <h5 class="md:text-3xl text-xl"> Recovery Password</h5>
            </div>
            <form action="<?= BaseURL() ?>/auth/recovery/<?= $data["token"] ?>" method="POST">
                <input type="text" class="hidden" name="token" value="<?= $data["token"] ?>">
                <input type="text" class="hidden" name="email" value="<?= $data["email"] ?>">
                <div class="flex flex-col mb-5">
                    <label for="Password" class="text-gray-700">Password Baru</label>
                    <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="password" aria-describedby="password" name="password" placeholder="Masukkan Password" required>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="password2" class="text-gray-700">Konfirmasi Password Baru</label>
                    <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="password2" aria-describedby="password2" name="password2" placeholder="Masukkan Password" required>
                </div>
                <button type="submit" name="submit" class="text-xl text-white w-full rounded bg-blue-800 py-4 font-bold tracking-wide hover:bg-blue-900 hover:drop-shadow-lg">GANTI PASSWORD</button>
            </form>
        </div>
    </div>
</section>
<?php getFooterCopyright(); ?>