<!-- Navbar -->
<div id="navVertikal" class="fixed bg-white z-50 h-full w-full p-10 transition-all -right-full">
    <div class="flex flex-row justify-end">
        <i id="nav-menu-close" data-feather="x" style="width:35px;height: 35px;left: 140px;top: 17px;"></i>
    </div>
    <ul class="flex flex-col space-y-8 font-bold">
        <li>
            <a class="text-gray-800 hover:text-gray-500 drop-shadow-sm " href="<?= BaseURL(); ?>">Home</a>
        </li>
        <li>
            <a class="text-gray-800 hover:text-gray-500 drop-shadow-sm" href="<?= BaseURL(); ?>/laporan">Laporan</a>
        </li>
        <li>
            <a class="text-gray-800 hover:text-gray-500 drop-shadow-sm" href="<?= BaseURL(); ?>/tentang">Tentang</a>
        </li>
        <li>
            <a href="<?= BaseURL() ?>/auth" class="text-gray-800 hover:text-gray-500 drop-shadow-sm">Masuk</a>
        </li>
        <li>
            <a href="<?= BaseURL() ?>/auth/daftar" class="text-white bg-blue-800 hover:drop-shadow-lg py-2 px-5 rounded">Daftar</a>
        </li>
    </ul>
</div>
<nav class="navbar-user transition duration-300 ease-in-out w-full bg-transparent flex py-5 justify-between items-center px-[2rem] md:px-[5rem] lg:px-[12rem] fixed z-10">
    <div class="flex items-center">
        <a class="mr-10 drop-shadow-lg" href="#">
            <img src="<?= BaseURL() ?>/public/images/logo-politeknik-negeri-jember.png" width="80" alt="logo-politeknik-negeri-jember">
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
        <a href="<?= BaseURL() ?>/auth" id="nav-items-btn-masuk-hor" class="text-white hover:text-gray-200">Masuk</a>
        <a href="<?= BaseURL() ?>/auth/daftar" id="nav-items-btn-daftar-hor" class="border text-white hover:drop-shadow-lg py-2 px-5 rounded">Daftar</a>
    </div>
    <div class="block md:hidden text-white cursor-pointer ">
        <i id="nav-menu-open" data-feather="menu" style="width:35px;height: 35px;left: 140px;top: 17px; margin-right:10px"></i>
    </div>
</nav>
<!-- Hero -->
<section class="xl:h-[100vh] h-[700px] bg-polije bg-no-repeat bg-center bg-cover flex flex-row items-center">
</section>