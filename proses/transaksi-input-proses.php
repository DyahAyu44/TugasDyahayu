<html>
	<body>
		<?php
include'../koneksi.php';
$id_transaksi=$_POST['id_transaksi'];
$id_anggota=$_POST['id_anggota'];
$id_mobil=$_POST['id_mobil'];
$tgl_sewa=$_POST['tgl_sewa'];
$tgl_kembali=$_POST['tgl_kembali'];
	
if(isset($_POST['simpan'])){
		extract($_POST);
		$nama_file   = $_FILES['foto']['name'];
		if(!empty($nama_file)){
		// Baca lokasi file sementar dan nama file dari form (fupload)
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
		$file_foto = $id_anggota.".".$tipe_file;

		// Tentukan folder untuk menyimpan file
		$folder = "../images/$file_foto";
		// Apabila file berhasil di upload
		move_uploaded_file($lokasi_file,"$folder");
		}
		else
			$file_foto="-";
	
	$sql = 
	"INSERT INTO tbtransaksi
		VALUES('$id_transaksi','$id_anggota','$id_mobil','$tgl_sewa','$tgl_kembali')";
	$query = mysqli_query($db, $sql);

	header("location:../index.php?p=transaksi");
}
?>
</body>
</html>