<!-- Hero -->
<section class="hero">
    <?php getNavbarHome(); ?>
</section>
<!-- Form -->
<section id="form-lapor" class="mt-[-570px] lg:mt-[-550px]">
    <div class="container flex flex-col items-center text-center text-white max-w-[950px] mt-36">
        <h1 class="md:text-4xl text-3xl font-bold tracking-wide">Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember</h1>
        <p class="md:text-xl text-lg mt-8 font-light">Sampaikan laporan Anda langsung kepada divisi yang berwenang</p>
        <hr class="w-[200px] my-[50px] border-t-4 ">
    </div>
    <div class="container drop-shadow-xl max-w-5xl">
        <div class="bg-white py-11 px-10">
            <div class="flex text-blue-800 font-bold justify-center mb-11">
                <i data-feather="users" style="width:35px;height: 35px;left: 140px;top: 17px; margin-right:10px"></i>
                <h5 class="md:text-3xl text-xl"> User Area</h5>
            </div>
            <div class="mt-16">
                <div id="user-menu" class="grid grid-cols-3 gap-x-5">
                    <button type="button" id="laporan" class="user-menu-items py-4 hover:bg-blue-900 hover:drop-shadow-lg font-bold bg-blue-800 text-white flex items-center justify-center text-xl"><i data-feather="edit-3" style="width:35px;height: 35px;left: 140px;top: 17px;" class="md:pr-3"></i> <span class="hidden md:block">LAPORAN</span></button>
                    <button type="button" id="pengaturan" class="user-menu-items py-4 hover:bg-blue-900 hover:drop-shadow-lg font-bold bg-blue-800 text-white flex items-center justify-center text-xl"><i data-feather="settings" style="width:35px;height: 35px;left: 140px;top: 17px;" class="md:pr-3"></i> <span class="hidden md:block">AKUN</span></button>
                    <button type="button" id="keluar" onclick="Modal(this.id)" class="user-menu-items py-4 hover:bg-blue-900 hover:drop-shadow-lg font-bold bg-blue-800 text-white flex items-center justify-center text-xl"><i data-feather="log-in" style="width:35px;height: 35px;left: 140px;top: 17px;" class="md:pr-3"></i> <span class="hidden md:block">KELUAR</span></button>
                </div>

                <div class="user-content">
                    <div id="content-user-laporan" class="grid grid-cols-1 gap-y-5">
                        <div class="my-11 text-center">
                            <a href="<?= BaseURL(); ?>" class="text-blue-800 hover:text-blue-900 hover:underline">Buat Laporan Baru</a>
                        </div>
                        <div class="flex flex-col md:flex-row border py-5 px-5 items-center">
                            <div>
                                <h6 class="font-bold text-gray-800 mb-3">UKT saya tinggi</h6>
                                <h6 class="text-gray-500 font-light">Labore consequat commodo dolor dolore sit excepteur culpa. Aliquip ad ad ut labore nostrud Lorem in tempor in ut reprehenderit. Pariatur occaecat magna mollit sunt duis aute cillum aliqua consectetur.</h6>
                                <div>
                                    <small class="text-gray-8000">Senin, 26 September 2022 - 16:03:01 -</small>
                                    <small class="text-blue-800">Proses Tindak Lanjut</small>
                                </div>
                            </div>
                            <div class="m-5">
                                <i data-feather="more-vertical" class="cursor-pointer hidden md:block" style="width:35px;height: 35px;left: 140px;top: 17px;"></i>
                                <i data-feather="more-horizontal" class="cursor-pointer block md:hidden" style="width:35px;height: 35px;left: 140px;top: 17px;"></i>
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row border py-5 px-5 items-center">
                            <div>
                                <h6 class="font-bold text-gray-800 mb-3">UKT saya tinggi</h6>
                                <h6 class="text-gray-500 font-light">Labore consequat commodo dolor dolore sit excepteur culpa. Aliquip ad ad ut labore nostrud Lorem in tempor in ut reprehenderit. Pariatur occaecat magna mollit sunt duis aute cillum aliqua consectetur.</h6>
                                <div>
                                    <small class="text-gray-8000">Senin, 26 September 2022 - 16:03:01 -</small>
                                    <small class="text-blue-800">Proses Tindak Lanjut</small>
                                </div>
                            </div>
                            <div class="m-5">
                                <i data-feather="more-vertical" class="cursor-pointer hidden md:block" style="width:35px;height: 35px;left: 140px;top: 17px;"></i>
                                <i data-feather="more-horizontal" class="cursor-pointer block md:hidden" style="width:35px;height: 35px;left: 140px;top: 17px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="content-user-setting">
                    <div class="flex flex-col text-grey-800 space-y-8 mt-11">
                        <div>
                            <h5 class="text-blue-800 font-bold text-2xl mb-2">Email</h5>
                            <p class="">hi@aristoc.space - <span class="text-green-500 italic">Terverifikasi</span> <button type="button" class="ml-2 text-blue-800 underline" onclick="Modal('ganti-email')"><u>Ganti Email</u></button></p>
                        </div>
                        <div>
                            <h5 class="text-blue-800 font-bold text-2xl mb-2">Password</h5>
                            <p class="text-dark">Terakhir diperbarui - Senin, 26 September 2022 - 16:26:09<a href="#" class="ml-2 text-blue-800 underline"><u>Ganti Password</u></a></p>
                        </div>
                        <div>
                            <h5 class="text-blue-800 font-bold text-2xl mb-2">Verifikasi</h5>
                            <p class="text-dark">Akun belum terverifikasi <a href="#" class="ml-2 text-blue-800 underline"><u>Verifikasi Sekarang</u></a></p>
                        </div>
                        <div>
                            <h5 class="text-blue-800 font-bold text-2xl mb-2">Aktifitas Terakhir</h5>
                            <p class="text-dark">Senin, 26 September 2022 - 16:29:25</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Logout -->
<div id="modal-keluar" class="modal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b">
                <h3 class="text-xl font-semibold text-gray-800 ">
                    Konfirmasi Keluar
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" onclick="ModalClose()">
                    <svg aria-hidden=" true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500">
                    Apakah anda ingin keluar ?
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <a href="<?= BaseURL() ?>/auth" class="text-white bg-blue-800 hover:bg-blue-900 hover:drop-shadow-md font-medium rounded-lg text-sm px-5 py-2.5 text-cente">Ya, Logout</a>
                <button type="button" class="text-gray-800 border border-gray-800 hover:drop-shadow-md font-medium rounded-lg text-sm px-5 py-2.5 text-center" onclick="ModalClose()">Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ganti Email -->
<div id="modal-ganti-email" class="modal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b">
                <h3 class="text-xl font-semibold text-gray-800 ">
                    Ganti Email
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" onclick="ModalClose()">
                    <svg aria-hidden=" true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <form action="" method="">
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <p>Perhatikan</p>
                    <ul>
                        <li>Email harus aktif.</li>
                        <li>Jika link verifikasi tidak tersedia, harap cek pada bagian spam.</li>
                        <li>Setelah anda mengklik konfirmasi, anda akan otomatis keluar.</li>
                    </ul>
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button type="submit" class="text-white bg-blue-800 hover:bg-blue-900 hover:drop-shadow-md font-medium rounded-lg text-sm px-5 py-2.5 text-cente">Ya, Ganti Email</button>
                    <button type="button" class="text-gray-800 border border-gray-800 hover:drop-shadow-md font-medium rounded-lg text-sm px-5 py-2.5 text-center" onclick="ModalClose()">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- <div class="modal fade" id="gantiEmail" tabindex="-1" role="dialog" aria-labelledby="gantiEmail" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Ganti Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan email baru">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Konfirmasi Email</label>
                        <input type="email" name="email2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Konfirmasi email baru">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <p>Perhatikan</p>
                        <ul>
                            <li>Email harus aktif.</li>
                            <li>Jika link verifikasi tidak tersedia, harap cek pada bagian spam.</li>
                            <li>Setelah anda mengklik konfirmasi, anda akan otomatis keluar.</li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="gantiEmail" class="btn btn-blue font-weight-bold py-2">Ya, Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>
</div> -->
<!-- Modal Ganti Password -->
<!-- <div class="modal fade" id="gantiPassword" tabindex="-1" role="dialog" aria-labelledby="gantiPassword" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Ganti Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Password Lama</label>
                        <input type="text" name="passwordlama" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan password lama">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Password Baru</label>
                        <input type="text" name="password1" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan password baru">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Konfirmasi Password Baru</label>
                        <input type="text" name="password2" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan kembali password baru">
                    </div>
                    <div class="form-group">
                        <p>Perhatikan</p>
                        <ul>
                            <li>Setelah anda mengklik konfirmasi, anda akan otomatis keluar.</li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="gantiPassword" class="btn btn-blue font-weight-bold py-3">Ya, Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>
</div> -->
<!-- Modal Verifikasi Keaslian Akun -->
<!-- <div class="modal fade" id="verifikasiAkun" tabindex="-1" role="dialog" aria-labelledby="verifikasiAkun" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Verifikasi Keaslian Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputStatus">Verifikasi Status Sebagai</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputStatus" name="status" onchange="userVerifikasiSelected(this)">
                                <option value="mahasiswa">Mahasiswa / Mahasiswi</option>
                                <option value="dosen">Dosen</option>
                                <option value="staf">Staf</option>
                            </select>
                        </div>
                    </div>
                    <div id="form-verifikasi">
                        <div id="form-verifikasi-mahasiswa">
                            <p>Form mahasiswa</p>
                        </div>
                        <div id="form-verifikasi-dosen">
                            <p>Form dosen</p>
                        </div>
                        <div id="form-verifikasi-staf">
                            <p>Form staf</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="verifikasiAkun" class="btn btn-blue font-weight-bold py-3">Verifikasi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> -->
<?php getFooterCopyright(); ?>