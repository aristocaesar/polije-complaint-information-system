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
                <h5 class="md:text-3xl text-xl"> Lupa Password</h5>
            </div>
            <form action="<?= BaseURL() ?>/auth/recovery" method="POST">
                <div class="flex flex-col mb-5">
                    <label for="email" class="text-gray-700">Email</label>
                    <input type="email" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="email" aria-describedby="email" name="email" placeholder="Masukkan Email" minlength="6" maxlength="45" required>
                </div>
                <button type="submit" name="submit" class="text-xl text-white w-full rounded bg-blue-800 py-4 font-bold tracking-wide hover:bg-blue-900 hover:drop-shadow-lg">KIRIM</button>
                <div class="flex justify-center space-x-3 mt-5">
                    <a href="<?= BaseURL() ?>/auth" class="text-blue-800 font-ligth">Masuk</a>
                    <span class="text-gray-300">|</span>
                    <a href="<?= BaseURL() ?>/auth/daftar" class="text-blue-800 font-ligth">Daftar</a>
                </div>
            </form>
        </div>
    </div>
</section>
<?php getFooterCopyright(); ?>