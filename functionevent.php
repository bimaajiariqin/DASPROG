<?
function register ($data){

$tanggal_pembayaran =$data['tanggal_pembayaran'];
$email=$data['email'];
$nama=$data['nama'];
$jumlah_pembelian=$data['jumlah_pembelian'];
$total =$data["total"];

$mysqli = new mysqli('localhost', 'root', '', 'web tanaman langka');

$query = "INSERT INTO laporan_masalah VALUES ('','$tanggal_pembayaran','$email', '$nama','$jumlah_pembelian','$total')";
if ($mysqli->query($query)) {

echo "<script>
alert('Data Sudah Terkirim!')</script>";

} else {
echo "Error: " . $mysqli->error;
}

$mysqli->close();

}

?>