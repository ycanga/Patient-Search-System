<?php
require 'settings.php';

$name = strtoupper(clearInput($_POST['name']));

if ($name && strlen($name) > 1) {

	function clearInput($input)
	{
		return htmlspecialchars(strip_tags(trim($input)));
	}


	$query = $db->prepare("SELECT * FROM data WHERE name LIKE ?");
	$query->execute([$name]);
	$search = $query->fetchAll(PDO::FETCH_ASSOC);
	if ($search) {
?>
		<?php if ($search) { ?>
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
						foreach ($search as $order => $result) {
						?>
							<tr>
								<th scope="row"><?php echo $order; ?></th>
								<td><?php echo $result["name"]; ?></td>
								<td><?php echo $result["section"]; ?></td>
								<td><?php echo $result["location"]; ?></td>
								<td><?php echo $result["status"]; ?></td>
								<td><?php echo $result["last-location"]; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
<?php }
	} else {
		echo "<div class='container text-center alert alert-danger' role='alert'>
			  Bir sonuç bulunamadı :(
			</div>";
	}
}
?>
