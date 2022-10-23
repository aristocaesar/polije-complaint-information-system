<?php getNavbarAdmin(); ?>
<?php getSidebarAdmin() ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard </h1>
        </div>
        <div class="section-body">
            <!-- HEADLINE BOX -->
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pengaduan</h4>
                            </div>
                            <div class="card-body">
                                2408
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-paper-plane"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Aspirasi</h4>
                            </div>
                            <div class="card-body">
                                425
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-info"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Informasi</h4>
                            </div>
                            <div class="card-body">
                                124
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pengguna</h4>
                            </div>
                            <div class="card-body">
                                2344
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Statistik Data Pengaduan, Aspirasi dan Informasi & Aktiftas Terbaru -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistik Laporan</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart" height="158"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Aktifitas Terbaru</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                <li class="media">
                                    <img class="mr-3 rounded-circle" width="50" src="https://media-exp1.licdn.com/dms/image/C5603AQED8L0BQbsIdw/profile-displayphoto-shrink_200_200/0/1654088905112?e=2147483647&v=beta&t=l683DweslHzwVt376iZoViKr9i9uG0GzhcDREE6eAHg" alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right text-primary">Sekarang</div>
                                        <div class="media-title">Aristo Caesar</div>
                                        <span class="text-small text-muted">Baru saja melakukan sebuah laporan. #4982342</span>
                                    </div>
                                </li>
                            </ul>
                            <div class="text-center pt-1 pb-1">
                                <a href="#" class="btn btn-primary btn-lg btn-round">
                                    Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Statistik Pengguna -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pengguna</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="text-title mb-2">July</div>
                                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                        <li class="media">
                                            <img class="img-fluid mt-1 img-shadow" src="../node_modules/flag-icon-css/flags/4x3/id.svg" alt="image" width="40">
                                            <div class="media-body ml-3">
                                                <div class="media-title">Indonesia</div>
                                                <div class="text-small text-muted">3,282 <i class="fas fa-caret-down text-danger"></i></div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="img-fluid mt-1 img-shadow" src="../node_modules/flag-icon-css/flags/4x3/my.svg" alt="image" width="40">
                                            <div class="media-body ml-3">
                                                <div class="media-title">Malaysia</div>
                                                <div class="text-small text-muted">2,976 <i class="fas fa-caret-down text-danger"></i></div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="img-fluid mt-1 img-shadow" src="../node_modules/flag-icon-css/flags/4x3/us.svg" alt="image" width="40">
                                            <div class="media-body ml-3">
                                                <div class="media-title">United States</div>
                                                <div class="text-small text-muted">1,576 <i class="fas fa-caret-up text-success"></i></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 mt-sm-0 mt-4">
                                    <div class="text-title mb-2">August</div>
                                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                        <li class="media">
                                            <img class="img-fluid mt-1 img-shadow" src="../node_modules/flag-icon-css/flags/4x3/id.svg" alt="image" width="40">
                                            <div class="media-body ml-3">
                                                <div class="media-title">Indonesia</div>
                                                <div class="text-small text-muted">3,486 <i class="fas fa-caret-up text-success"></i></div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="img-fluid mt-1 img-shadow" src="../node_modules/flag-icon-css/flags/4x3/ps.svg" alt="image" width="40">
                                            <div class="media-body ml-3">
                                                <div class="media-title">Palestine</div>
                                                <div class="text-small text-muted">3,182 <i class="fas fa-caret-up text-success"></i></div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="img-fluid mt-1 img-shadow" src="../node_modules/flag-icon-css/flags/4x3/de.svg" alt="image" width="40">
                                            <div class="media-body ml-3">
                                                <div class="media-title">Germany</div>
                                                <div class="text-small text-muted">2,317 <i class="fas fa-caret-down text-danger"></i></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = [
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember',
    ];

    const data = {
        labels: labels,
        datasets: [{
                label: 'Pengaduan',
                backgroundColor: 'rgb(103, 119, 239)',
                borderColor: 'rgb(103, 119, 239)',
                data: [0, 20, 35, 42, 67, 10, 45, 90, 67, 98, 67, 32, 45],
            },
            {
                label: 'Aspirasi',
                backgroundColor: 'rgb(252, 84, 75)',
                borderColor: 'rgb(252, 84, 75)',
                data: [0, 5, 2, 4, 10, 23, 39],
            },
            {
                label: 'Informasi',
                backgroundColor: 'rgb(255, 164, 38)',
                borderColor: 'rgb(255, 164, 38)',
                data: [0, 5, 5, 7, 20, 54, 33],
            }
        ]
    };

    const config = {
        type: 'line',
        data: data,
        options: {}
    };
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>
<?php getFooterDashboard(); ?>