<?php
require_once 'koneksi.php';

if (isset($_GET['action']) && $_GET['action'] == 'get_sales') {
  header('Content-Type: application/json');

  $query = "SELECT tahun, SUM(total_penjualan) AS total_penjualan 
               FROM penjualan_tahunan 
               WHERE tahun BETWEEN 2017 AND 2026 
               GROUP BY tahun 
               ORDER BY tahun ASC";

  $result = mysqli_query($koneksi, $query);

  $data = array();
  if ($result) {
    foreach ($result as $row) {
      $data[] = array(
        "tahun" => (int) $row['tahun'],
        "total_penjualan" => (int) $row['total_penjualan']
      );
    }
  }
  echo json_encode($data);
  mysqli_close($koneksi);
  exit; 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
  $email = mysqli_real_escape_string($koneksi, $_POST['email']);
  $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);

  $query = "INSERT INTO pesan (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

  if (mysqli_query($koneksi, $query)) {
    echo "success";
  } else {
    echo "error: " . mysqli_error($koneksi);
  }
  mysqli_close($koneksi);
  exit; 
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Lanmak Patung - Elemen Statis</title>
  <link rel="stylesheet" href="asset/css/bootstrap.min.css" />
  <link rel="stylesheet" href="style.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="asset/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg fixed-top bg-white shadow-sm">
      <a class="navbar-brand" href="#" style="padding-left: 10%">
        <img class="logo" src="asset/img/lanmak-logo.png" />
      </a>

      <button style="margin-right: 10%" class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav"
        style="align-items: right; padding-right: 10%">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#homeid">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#tentang-kamiid">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#solusiid">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#kontakid">Contact</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <hr />

  <div class="home pt-5 mt-5" id="homeid">
    <div class="teks-tangan">
      <div>
        <h3 style="font-weight: bold">
          Jasa Pembuatan Patung Berkualitas untuk Berbagai Kebutuhan<br />
        </h3>
        <img class="patung-tangan-home" src="asset/img/patung-tangan.jpeg" />
      </div>
      <div>
        <p class="teks-home">
          Lanmak Studio adalah pengrajin patung yang telah banyak memiliki
          pengalaman dalam membuat patung untuk keperluan monumen, lanskap dan
          taman, maskot event dan brand komersial, juga patung untuk dekorasi
          rumah dan hotel. Beroperasi sejak tahun 1998, Lanmak Studio melayani
          jasa pembuatan patung fiber dan logam berkualitas dengan harga
          terjangkau. Studio patung kami dioperasikan oleh tim seniman dan
          tukang patung ahli yang sangat berpengalaman, memiliki ketrampilan
          tinggi, selalu menjaga ketelitian, serta memperhatikan setiap detail
          dalam menangani semua pekerjaan patung.
        </p>
      </div>
    </div>
  </div>

  <div class="tentang-kami" id="tentang-kamiid">
    <a href="#homeid" target="_blank" style="color: rgb(94, 93, 93)">Tentang Kami</a>
    <div class="container text-center; text-light">
      <div class="row">
        <div class="col-md-5">
          <h3 style="
                font-weight: bold;
                font-family: 'Lucida Sans', 'Lucida Sans Regular',
                  'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana,
                  sans-serif;
                padding-top: 2%;
              ">
            Studio Patung dan Karya Seni
          </h3>
          <br />
          <p style="text-align: justify">
            Lanmak Studio adalah tempat pembuatan patung dan elemen estetik
            terkemuka yang berlokasi di Yogyakarta. Kami berspesialisasi dalam
            membuat patung, ornamen, tugu dan seni relief dinding khusus
            dengan fokus pada seni yang bermakna dan menonjolkan estetika.
            Perusahaan kami memiliki pengalaman 25 tahun dalam menyediakan
            layanan pembuatan patung dan karya seni kepada klien yang dibuat
            sesuai dengan spesifikasi dan keinginan mereka. Kami fokus
            terhadap detail dan selalu berkomitmen pada kepuasan pelanggan.
            Dengan tim pematung elit, kami menjamin bahwa setiap karya seni
            yang kami hasilkan memiliki kualitas tertinggi dan akan memberikan
            kenangan seumur hidup.
          </p>
        </div>

        <div class="col-md-6">
          <br /><br />
          <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active" style="max-width: 400px">
                <img src="asset/img/patung15.jpeg" class="d-block w-100" alt="sapi" />
              </div>
              <div class="carousel-item" style="max-width: 400px">
                <img src="asset/img/patung9.jpeg" class="d-block w-100" alt="ungu" />
              </div>
              <div class="carousel-item" style="max-width: 400px">
                <img src="asset/img/patung16.jpeg" class="d-block w-100" alt="biru" />
              </div>
              <div class="carousel-item" style="max-width: 400px">
                <img src="asset/img/patung17.jpeg" class="d-block w-100" alt="luffy" />
              </div>
            </div>

            <button style="max-width: 400px" class="carousel-control-prev" type="button"
              data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <br /><br />
  </div>

  <div class="solusi-kebutuhan" id="solusiid">
    <div class="teks-solusi">
      <h3 style="
            font-weight: bold;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande',
              'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
          ">
        Jasa Pembuatan Patung
      </h3>
      <p>
        Kami memiliki keahlian, rekam jejak, dan kualifikasi untuk mendukung
        pekerjaan pembuatan dan pendirian semua jenis patung, bahkan di lokasi
        terpencil sekalipun di Indonesia.
      </p>
      <img class="patung-tangan-home" src="asset/img/patung8.jpeg" />
    </div>

    <div class="container text-center" style="padding-top: 5%">
      <div class="row">
        <div class="col">
          <h4 style="font-weight: bold">Proses Pemesanan Patung</h4>
          <br />
          <p>
            Tim berpengalaman kami, siap berdiskusi untuk membantu menentukan
            pilihan terbaik untuk patung yang ingin Anda pesan.
          </p>
          <br />
        </div>
        <div class="col">
          <h4 style="font-weight: bold">Proses Pembuatan Patung</h4>
          <br />
          <p>
            Kami selalu meningkatkan kemampuan teknis dan pengetahuan bahan
            untuk menghasilkan patung dengan kualitas terbaik.
          </p>
        </div>
        <div class="col">
          <h4 style="font-weight: bold">Jasa Patung Custom</h4>
          <br />
          <p>
            Tim kami akan selalu mendengar dan memahami setiap kebutuhan Anda,
            untuk bersama-sama, menghasilkan patung sesuai harapan dan standar
            kualitas yang Anda inginkan.
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="proyek-terbaru">
    <div class="teks-solusi">
      <h3 style="
            font-weight: bold;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande',
              'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            color: black;
          ">
        Proyek Yang Telah Selesai
      </h3>
      <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="asset/img/patung1.jpeg" class="d-block w-100" alt="..." />
            <br />
            <p>"Patung Kursi Wanita 45cm Taman Pinang Indah, Sidoarjo"</p>
          </div>
          <div class="carousel-item">
            <img src="asset/img/patung2.jpeg" class="d-block w-100" alt="..." />
            <br />
            <p>"Maskot Tinggi 170cm PT.Mentari Berkah Makmur, Jakarta"</p>
          </div>
          <div class="carousel-item">
            <img src="asset/img/patung3.jpeg" class="d-block w-100" alt="..." />
            <br />
            <p>"Maskot Tinggi 100cm PT.Tumbuh Semangat Makmur, Bogor"</p>
          </div>
          <div class="carousel-item">
            <img src="asset/img/patung4.jpeg" class="d-block w-100" alt="..." />
            <br />
            <p>"Maskot Bakpia Tugu, Yogyakarta"</p>
          </div>
          <div class="carousel-item">
            <img src="asset/img/patung6.jpeg" class="d-block w-100" alt="..." />
            <br />
            <p>"Maskot Memorabilia Akmil di SMA BOPKRI 1, Yogyakarta"</p>
          </div>
          <div class="carousel-item">
            <img src="asset/img/patung14.jpeg" class="d-block w-100" alt="..." />
            <br />
            <p>"Tugu Bono, Pekanbaru"</p>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>

  <div class="container my-1 py-1" id="statistikid">
    <div class="text-center mb-2">
      <h3 style="font-weight: bold; font-family: 'Lucida Sans', Geneva, Verdana, sans-serif;">Statistik Penjualan Lanmak
        Studio</h3>
      <p class="text-muted">Data performa total penjualan patung tahunan Lanmak Studio</p>
    </div>
    <div class="card shadow-sm p-2">
      <div style="position: relative; height:30vh; width:100%">
        <canvas id="canvasGrafik"></canvas>
      </div>
    </div>
  </div>

  <div class="lokasi">
    <div class="teks-lokasi">
      <h1 style="font-weight: bold" class="text-light">
        Pengrajin Patung Terpercaya
      </h1>
      <p class="text-light">
        Selama 25 tahun, Jasa pembuatan patung Lanmak Studio telah menjadi
        mitra terpercaya bagi museum, kontraktor, pengembang kawasan,
        perusahaan BUMN, perusahaan swasta, amusement park, instansi
        pemerintah dan militer, bahkan rumah ibadah serta individu di berbagai
        tempat di Indonesia, untuk menyediakan patung yang mereka butuhkan.
      </p>

      <div class="d-flex gap-3 justify-content-center mt-3">
        <a href="https://maps.app.goo.gl/JH71rN7w7wSKZmtR7" target="_blank" class="btn-lokasi"
          style="color: rgb(255, 255, 255)">Kunjungi Lokasi Kami</a>
        <a href="https://wa.me/6281804156857?text=Halo%20Lanmak%20Studio,%20saya%20ingin%20konsultasi%20mengenai%20pembuatan%20patung."
          target="_blank" class="btn-lokasi" style="color: rgb(255, 255, 255)">Konsultasi Patung</a>
      </div>

    </div>
  </div>

  <div class="kontak py-5 bg-light" id="kontakid">
    <div class="container">
      <div class="row g-5">

        <div class="col-md-6">
          <h5 style="font-weight: bold;" class="mb-4 text-dark text-center">Tinggalkan Pesan</h5>

          <div id="notif-sukses" class="alert d-none text-center fw-bold mb-3 shadow-sm rounded"
            style="background-color: rgba(231, 111, 81, 0.1); color: #E76F51; border: 1px solid #E76F51;">
            ✓ Terimakasih Atas Pesan Yang Anda Kirim
          </div>

          <form id="form-saran" action="index.php" method="POST" class="p-4 bg-white rounded shadow-sm">
            <div class="mb-3 text-start">
              <label for="nama" class="form-label fw-semibold text-secondary">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
            </div>

            <div class="mb-3 text-start">
              <label for="email" class="form-label fw-semibold text-secondary">Alamat Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="nama@email.com" required>
            </div>

            <div class="mb-3 text-start">
              <label for="pesan" class="form-label fw-semibold text-secondary">Pesan</label>
              <textarea class="form-control" id="pesan" name="pesan" rows="4"
                placeholder="Tuliskan pesan Anda di sini..." required></textarea>
            </div>

            <button type="submit" class="btn text-white w-100 fw-bold"
              style="background-color: #E76F51; border-color: #E76F51;">
              Kirim Pesan
            </button>
          </form>
        </div>

        <div class="col-md-6 text-start d-flex flex-column justify-content-center">
          <h5 style="font-weight: bold;" class="mb-4 text-dark text-center">Kontak Resmi</h5>
          <ul class="list-group list-group-flush rounded shadow-sm bg-white p-3">
            <li class="list-group-item py-3">
              <strong class="text-dark">Telp / WhatsApp:</strong> <br>
              <span class="text-secondary">0818 0415 6857</span>
            </li>
            <li class="list-group-item py-3">
              <strong class="text-dark">Email:</strong> <br>
              <span class="text-secondary">lanmakstudio@gmail.com</span>
            </li>
            <li class="list-group-item py-3">
              <strong class="text-dark">Alamat Studio:</strong> <br>
              <span class="text-secondary">Jalan Donotirto, RT 07, Donotirto, Bangunjiwo, Kasihan, Bantul, Yogyakarta
                55184</span>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </div>

  <footer>
    <div>
      Copyright © 2026 Pengrajin patung, Jasa Pembuatan Patung Lanmak Studio
      |<br />
      Powered by Pengrajin Patung Jogja
    </div>
  </footer>

  <script>
    // Bikin semua link dengan href diawali '#' jadi scroll halus
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener("click", function (e) {
        e.preventDefault(); // biar tidak langsung loncat
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
          target.scrollIntoView({
            behavior: "smooth", // scroll halus
          });
        }
      });
    });

    fetch('index.php?action=get_sales')
      .then(response => response.json())
      .then(data => {
        // Memisahkan data dari database ke array khusus Label dan Angka
        const labelTahun = data.map(item => item.tahun);
        const totalAngka = data.map(item => item.total_penjualan);

        // Menggambar Grafik menggunakan Chart.js
        const ctx = document.getElementById('canvasGrafik').getContext('2d');
        new Chart(ctx, {
          type: 'bar', // Menggunakan grafik model batang
          data: {
            labels: labelTahun, // Sumbu X (Tahun 2018-2026)
            datasets: [{
              label: 'Jumlah Penjualan Patung',
              data: totalAngka, // Sumbu Y (Jumlah Penjualan)
              backgroundColor: 'rgba(231, 111, 81, 0.6)', // Warna batang grafik
              borderColor: 'rgba(231, 111, 81, 0.6)',
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              y: {
                beginAtZero: true // Sumbu Y selalu mulai dari angka 0
              }
            }
          }
        });
      })
      .catch(error => console.error('Error mengambil data:', error));


    // SCRIPT UNTUK MENGIRIM FORM SECARA DIAM-DIAM (AJAX)
    document.getElementById('form-saran').addEventListener('submit', function (e) {
      e.preventDefault(); // Menahan form agar tidak refresh/pindah halaman

      const form = this;
      const formData = new FormData(form);
      const notif = document.getElementById('notif-sukses');

      fetch('index.php', {
        method: 'POST',
        body: formData
      })
        .then(response => response.text())
        .then(data => {
          if (data.trim() === 'success') {
            notif.classList.remove('d-none');

            form.reset();

            setTimeout(function () {
              notif.classList.add('d-none');
            }, 2000);
          } else {
            alert('Terjadi kesalahan sistem: ' + data);
          }
        })
        .catch(error => console.error('Error:', error));
    });

  </script>
</body>

</html>