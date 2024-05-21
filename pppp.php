<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pilihan Tarian</title>
<style>
  /* CSS untuk layout dan desain tarian */
  body {
    font-family: Arial, sans-serif; /* Mengatur font family */
  }
  
  .tarian-container {
    display: flex; /* Membuat tarian berbaris secara horizontal */
    justify-content: space-around; /* Menyeimbangkan jarak di antara tarian */
    flex-wrap: wrap; /* Mengizinkan baris tarian untuk berbaris secara otomatis */
  }
  
  .tarian {
    width: 300px; /* Lebar tarian diperbesar */
    margin: 20px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Memperbesar bayangan */
    text-align: center;
  }
  
  .tarian img {
    max-width: 100%;
    border-radius: 10px;
    margin-bottom: 15px; /* Memberikan ruang antara gambar dan deskripsi */
  }
  
  .tarian .judul {
    font-weight: bold;
    font-size: 1.5em; /* Memperbesar ukuran judul */
    margin-bottom: 10px; /* Memberikan ruang antara judul dan deskripsi */
  }
  
  .tarian .deskripsi {
    font-size: 1.1em; /* Ukuran deskripsi */
    margin-bottom: 15px; /* Memberikan ruang antara deskripsi dan tombol */
  }
  
  /* Tombol */
  .tombol {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
  }
  
  .tombol:hover {
    background-color: #0056b3;
  }
</style>
</head>
<body>

<div class="tarian-container">
  <!-- Tarian pertama -->
  <div class="tarian">
    <img src="gtau.jpeg" alt="Tari Topeng Malangan">
    <div class="judul">Tari Topeng Malangan</div>
    <div class="deskripsi"> kesenian tradisional yang berasal dari Kabupaten Malang, Jawa Timur, Indonesia. Kabupaten Malang menjadi salah satu pusat 
        persebaran seni topeng di Jawa. Kesenian Tari Topeng Malangan merupakan hasil dari perpaduan antara budaya yang 
        berasal dari Jawa Tengah, Jawa Barat dan Jawa Timur (Blambangan dan Osing). Gerakan pada Tari Topeng Malangan 
        mengandung unsur kekayaan dinamis dan musik dari etnik Jawa, Madura dan Bali. Tari Topeng Malangan memiliki maksa sebagai lambang sifat manusia,
         misalnya seperti topeng yang menggambarkan situasi menangis, tertawa, sedih, malu dan lain sebagainya..</div>
    <a href="pemesanan.php" class="tombol">Beli Tiket</a>
  </div>

  <!-- Tarian kedua -->
  <div class="tarian">
    <img src="tari remo.jpeg" alt="Tari Remo">
    <div class="judul">Tari Remo</div>
    <div class="deskripsi">berasal dari Kabupaten Jombang, Jawa Timur. Tarian ini diciptakan oleh seniman Jombang yang dikenal dengan Cak Mo yang pernah menjadi Gemblak dari
         sebuah Grup Reog di Ponorogo. karena kemarau yang panjang membuat cak Mo mencari pemasukan dari sumber lainnya, bermodalkan keahlian menari, cak mo dengan pakaian
          ala Jathilan tanpa anyaman bambu berkeliling dari desa ke desa menarikan tarian diiringi musik sepasang kenong yang ditabuh Istrinya..</div>
          <a href="pemesanan.php" class="tombol">Beli Tiket</a>
  </div>

  <!-- Tarian ketiga -->
  <div class="tarian">
    <img src="reog.jpeg" alt="Reog Ponorogo">
    <div class="judul">Reog Ponorogo</div>
    <div class="deskripsi">Reog[1] (aksara Jawa: ꦫꦺꦪꦺꦴꦒ꧀, Réyog) merupakan tarian tradisional dari Ponorogo, Jawa Timur dalam arena terbuka yang berfungsi sebagai
         hiburan rakyat, mengandung unsur magis, penari utama adalah orang berkepala singa dengan hiasan bulu merak, dengan berat topeng mencapai
          50-60 kg. Ditambah beberapa penari bertopeng dan berkuda lumping dan Reog asli dari Indonesia</div>
    <a href="pemesanan.php" class="tombol">Beli Tiket</a>
  </div>

    <!-- Tarian ketiga -->
    <div class="tarian">
    <img src="anyep.jpeg" alt="Tari Gandrung Sewu">
    <div class="judul">Tari Gandrung Sewu</div>
    <div class="deskripsi">Tari Gandrung merupakan tari tradisional yang khas dari Banyuwangi, Jawa Timur dan telah dipentaskan sejak ratusan tahun yang lalu. Tari Gandrung
         mulanya berasal dari kebudayaan Suku Osing dan menjadi wujud dari rasa syukur atas hasil panen pertanian. Dalam pementasannya, Tari
          Gandrung dibawakan oleh penari laki-laki maupun perempuan yang masing-masing penarinya memiliki nama.</div>
          <a href="pemesanan.php" class="tombol">Beli Tiket</a>
  </div>

    <!-- Tarian ketiga -->
    <div class="tarian">
    <img src="thengul.jpeg" alt="Tari Thengul">
    <div class="judul">Tari Thengul</div>
    <div class="deskripsi">Tari Thengul merupakan tari yang diciptakan oleh seniman Bojonegoro pada tahun 1992 yaitu Joko
            Santoso dan dibantu penata iringan Ibnu Sutawa (alm) selaku pihak P dan K kabupaten Bojonegoro. Tarian tersebut
            dikenal oleh masyarakat dan menjadi ikon Bojonegoro.</div>
            <a href="pemesanan.php" class="tombol">Beli Tiket</a>
  </div>

    <!-- Tarian ketiga -->
    <div class="tarian">
    <img src="muang.jpeg" alt="Tari Muang Sangkal">
    <div class="judul">Tari Muang Sangkal</div>
    <div class="deskripsi">Tari Muang Sangkal lahir dilatar belakangi oleh kepedulian seorang seniman Sumenep bernama Taufiqurrachman terhadap kekayaan yang dimiliki Pulau Madura. Sejak munculnya tari Muang Sangkal hingga sekarang, sudah melekat sebagai salah satu ikon budaya yang ada di Kabupaten Sumenep.
         Kemunculan tari Muang Sangkal tidak terpisahkan dari Keraton Sumenep. Keberadaan Keraton Sumenep telah melahirkan tradisi budaya, baik terkait dengan upacara adat maupun kesenian.
        </div>
        <a href="pemesanan.php" class="tombol">Beli Tiket</a>
  </div>

    <!-- Tarian ketiga -->
    <div class="tarian">
    <img src="tiban.jpeg" alt="Tari Tiban">
    <div class="judul">Tari Tiban</div>
    <div class="deskripsi">Tiban merupakan tari atau ritual rakyat yang turun temurun menjadi bagian kebudayaan masyarakat Jawa Timur, terutama pada daerah Trenggalek, Blitar, Kediri dan Tulungagung. Tari Tiban selalu dipertujukkan saat musim kemarau.
         Tarian tiban adalah sebuah permintaan permohonan kepada yang maha kuasa berharap untuk diturunkanya hujan. Ada makna dalam dibalik ritual tarian tiban yaitu sebuah harapan sebuah pesan yang luhur demi lestarinya alam. Bukanlah kekerasan yang
          ditonjolkan melainkan nilai-nilai luhur atau sebuah pesan untuk menjaga keseimbangan alam.</div>
          <a href="pemesanan.php" class="tombol">Beli Tiket</a>
  </div>

      <!-- Tarian ketiga -->
      <div class="tarian">
    <img src="ambarang.jpg" alt="Tari Ambarang">
    <div class="judul">Tari Ambarang</div>
    <div class="deskripsi">Tari Ambarang adalah tarian Jawa Timur yang berasal dari Tulungagung. Tarian ini bercerita tentang pengamen jalanan di kota tersebut. Ada tiga kelompok penari dalam tarian ini yaitu penari pentul, jaranan, dan barong.
             Tari Ambarang diciptakan oleh seorang seniman Jawa Timur, yaitu Bimo Wijayanto. Ia mengambil landasan dari kesenian jaranan yaitu jaranan serentewe. Ciri khas dari tarian ini
              adalah gerakannya yang agresif.</div>
              <a href="pemesanan.php" class="tombol">Beli Tiket</a>
  </div>

</div>

<!-- Tombol kembali ke halaman utama di luar div -->
<a href="tugas-sms-1.php" class="tombol">Kembali ke Halaman Utama</a>

</body>
</html>
