<h1>Sistem Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember</h1>

![Banner](https://raw.githubusercontent.com/aristocaesar/polije-complaint-information-system/debug/public/images/readmd.png)

## Apa itu Sistem Layanan Aspirasi dan Pengaduan?

Pengelolaan pengaduan pelayanan publik di Politeknik Negeri Jember belum terkelola secara efektif dan terintegrasi. Masing-masing penyelenggara mengelola pengaduan secara parsial dan tidak terkoordinir dengan baik. Akibatnya terjadi duplikasi penanganan pengaduan, atau bahkan bisa terjadi suatu pengaduan tidak ditangani oleh satupun penyelenggara, dengan alasan pengaduan bukan kewenangannya. Oleh karena itu, untuk mencapai visi dalam good governance maka perlu untuk mengintegrasikan sistem pengelolaan pengaduan pelayanan publik dalam satu pintu. Tujuannya, Politeknik Negeri Jember memiliki satu saluran pengaduan yang baik dan tertata.

## Fitur apa saja yang tersedia di Sistem Layanan Aspirasi dan Pengaduan?

**User**

- Autentikasi User
- Penyampaian Pengaduan, Aspirasi dan Informasi
- Tracking Laporan
- Dan lain-lain

**Administartor**

- Autentikasi Admin
- User CRUD
- Admin CRUD
- Kategori CRUD
- Divisi CRUD
- Mengelola Pengaduan, Aspirasi dan Informasi

---

## Default Account

**User default account**

- URL: https://your_domain/auth
- Email: aristocaesar@outlook.co.id
- Password: user

**Admin default account**

- URL: https://your_domain/admin
- Email: aristo.belakang@gmail.com
- Password: admin

---

## Install

1. **Clone repository**

```bash
git clone https://github.com/aristocaesar/polije-complaint-information-system.git E-Lapor_Polije

cd E-Lapor_Polije

composer install

yarn install

cp .env.example .env
```

2. **Buka `.env` lalu ubah baris berikut sesuai dengan database dan konfigurasi email yang ingin dipakai**

```bash
DB_HOST=host
DB_NAME=name_database
DB_USER=username
DB_PASS=password

EMAIL_HOST=host
EMAIL_NAME=name
EMAIL_USER=email
EMAIL_PASS=password
```

3. **Instalasi database**

Buat sebuah database MySql dan beri nama sesuai konfigurasi pada .env , Setelah itu import database, untuk mendapatkan file database silakan menghubungi Author yang tersedia.

4. **Jalankan website**

```bash
https://your_domain.com/
```

## Author

- Whatsapp : <a href="https://api.whatsapp.com/send?phone=85235119101&text=Hallo%20Aristo,%20Saya%20ingin%20mendapatkan%20mengakses%20database%20E-Lapor%20Polije" target="_blank"> 085235119101 - Aristo Caesar Pratama</a>

## Contributing

Contributions, issues and feature requests di persilahkan, Jangan ragu untuk memeriksa halaman masalah jika Anda ingin berkontribusi.

## License

- Copyright © 2022 Politeknik Negeri Jember . DKODE Creative.
- **Sistem Layanan Aspirasi dan Pengaduan is software licensed under the MIT license.**
