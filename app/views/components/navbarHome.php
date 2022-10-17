<!-- Navbar -->
<nav class="navbar-user transition duration-300 ease-in-out w-full bg-transparent flex py-5 justify-between items-center px-[2rem] md:px-[5rem] lg:px-[12rem] fixed z-10">
    <div class="flex items-center">
        <a class="mr-10 drop-shadow-lg" href="#">
            <img src="<?= BaseURL(); ?>/public/images/logo-politeknik-negeri-jember.png" width="80" alt="logo-politeknik-negeri-jember">
        </a>
        <div class="items-center hidden md:block">
            <ul class="flex space-x-8">
                <li>
                    <a class="nav-items-horizontal text-white hover:text-gray-200" href="<?= BaseURL(); ?>">Home</a>
                </li>
                <li>
                    <a class="nav-items-horizontal text-white hover:text-gray-200" href="<?= BaseURL(); ?>/laporan">Laporan</a>
                </li>
                <li>
                    <a class="nav-items-horizontal text-white hover:text-gray-200" href="<?= BaseURL(); ?>/tentang">Tentang</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="text-white space-x-8 hidden md:block">
        <a href="<?= BaseURL() ?>/auth" class="">Masuk</a>
        <a href="<?= BaseURL() ?>/auth/daftar" class="border border-white py-2 px-4 rounded">Daftar</a>
    </div>
    <div class="block md:hidden text-white cursor-pointer">
        <i data-feather="menu" style="width:35px;height: 35px;left: 140px;top: 17px; margin-right:10px"></i>
    </div>
</nav>
<!-- Hero -->
<section class="h-[700px] bg-polije bg-no-repeat bg-center bg-cover flex flex-row items-center">
</section>