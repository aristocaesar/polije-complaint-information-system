<?php getNavbarHome(); ?>
<!-- NOT FOUND -->
<section id="not-found" class="mt-[-570px] lg:mt-[-550px]">
    <div class="container flex flex-col items-center text-center text-white max-w-[950px] mt-36">
        <h1 class="md:text-4xl text-3xl font-bold tracking-wide">Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember</h1>
        <p class="md:text-xl text-lg mt-8 font-light">Sampaikan laporan Anda langsung kepada divisi yang berwenang</p>
        <hr class="w-[200px] my-[50px] border-t-4 ">
    </div>
    <div class="container drop-shadow-xl max-w-5xl">
        <div class="bg-white py-11 px-10">
            <div class="flex flex-col items-center text-center mb-11">
                <p class="text-[100px] font-bold text-blue-800">404</p>
                <div class="font-light text-gray-800">
                    <p class="font-bold text-lg mb-2">Halaman Tidak Ditemukan</p>
                    <p>Mohon maaf, halaman yang anda minta tidak tersedia</p>
                    <p>Silakan kembali kehalaman menu</p>
                </div>
                <a href="<?= BaseUrl() ?>" class="mt-5 bg-blue-800 w-64 text-white hover:bg-blue-900 font-semibold py-2 l rounded-lg">Kembali Home</a>
            </div>
        </div>
    </div>
</section>
<!-- Footer -->
<?php getFooterCopyright(); ?>