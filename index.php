<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
  </head>
  <body>
	<div class="container my-5">
	<h2>CRUD DATA MAHASISWA</h2>
	<br/>
	<a href="add.php" class="btn btn-primary mb-3">+ Add Data Mahasiswa</a>
	<br/>
	<br/>
	<table class="table table-hover table-striped">
		<thead class="table-danger">
		<tr>
			<th>NO</th>
			<th>Nama</th>
			<th>NIM</th>
			<th>Email</th>
			<th>Prodi</th>
			<th>Gambar</th>
			<th>Action</th>
		</tr>
		</thead>
	
		<?php 
		include_once 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"SELECT * FROM tbl_mahasiswa ORDER BY id DESC");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['nama']; ?></td>
				<td><?php echo $d['nim']; ?></td>
				<td><?php echo $d['email']; ?></td>
				<td><?php echo $d['prodi']; ?></td>
				<td><img src="img/<?= $d['gambar']; ?>" alt="Gambar Manusia" width="100"></td>
				<td>
					<a href="edit.php?id=<?php echo $d['id']; ?>" class="btn btn-warning btn-sm">EDIT</a>
					<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>

					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Kamu Yakin ??</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							Yakin Nich Mau dihapus Datanya
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
							<a href="hapus.php?id=<?php echo $d['id']; ?>" class="btn btn-primary">Iya</a>
							
						</div>
						</div>
					</div>
					</div>
				</td>
					

			</tr>
			<?php 
		}
		?>
	</table>

	</div>

  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
 
	

