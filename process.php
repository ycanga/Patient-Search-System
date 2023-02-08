<?php 
	require 'settings.php';
	$name = $_POST['name'];
	$name = strtoupper($name);
	$btn = $_POST['click'];


	$search = $db->query("SELECT * FROM data WHERE name LIKE '%$name%'")->fetchAll(PDO::FETCH_ASSOC);
	if ($search) {
  ?>
	<?php if($search){ ?>	
  <div class="container text-center bg-light table-responsive">
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">İsim Soyisim</th>
	      <th scope="col">Bulunduğu Bölüm</th>
	      <th scope="col">Bulunduğu Hastane</th>
	      <th scope="col">Durumu</th>
	      <th scope="col">Geldiği Yer</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php 
	  	$count = 0;
	  	foreach ($search as $search) {
	  	$count++;
	  	?>
		<tr>
	      <th scope="row"><?php echo $count; ?></th>
	      <td><?php echo $search["name"]; ?></td>
	      <td><?php echo $search["section"]; ?></td>
	      <td><?php echo $search["location"]; ?></td>
	      <td><?php echo $search["status"]; ?></td>
	      <td><?php echo $search["last-location"]; ?></td>
	    </tr>
		<?php } ?>
	  </tbody>
	</table>
	</div>
<?php }

	}else
		echo "<div class='container text-center alert alert-danger' role='alert'>
			  Bir sonuç bulunamadı :(
			</div>";

 ?>