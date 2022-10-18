<!-- Hero -->
<section class="hero">
    <?php getNavbarHome(); ?>
</section>
<!-- Tentang -->
<section id="form-lapor" class="mt-[-570px] lg:mt-[-550px]">
    <div class="container flex flex-col items-center text-center text-white max-w-[950px] mt-36">
        <h1 class="md:text-4xl text-3xl font-bold tracking-wide">Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember</h1>
        <p class="md:text-xl text-lg mt-8 font-light">Sampaikan laporan Anda langsung kepada divisi yang berwenang</p>
        <hr class="w-[200px] my-[50px] border-t-4 ">
    </div>
    <div class="container drop-shadow-xl max-w-5xl">
        <div class="bg-white py-11 px-10">
            <div class="flex text-blue-800 font-bold justify-center mb-11">
                <i data-feather="info" style="width:35px;height: 35px;left: 140px;top: 17px; margin-right:10px"></i>
                <h5 class="md:text-3xl text-xl"> Tentang</h5>
            </div>
            <div class="mt-16">
                <p>Laboris non occaecat do minim qui laboris duis ad occaecat officia exercitation ex reprehenderit qui. Culpa reprehenderit minim adipisicing veniam ullamco eiusmod aliqua esse et. Cillum fugiat deserunt et excepteur irure eu cillum. Non consequat ex ullamco do. Sint do consectetur eiusmod mollit tempor et non Lorem et consectetur.</p>
                <?= $_SERVER["HTTP_USER_AGENT"] ?>
            </div>
        </div>
    </div>
</section>
<!-- Footer -->
<?php getFooterCopyright(); ?>