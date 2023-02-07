<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<title>Hasta Arama</title>
</head>

<body>

<div class="text-center p-5">
	<h1>Nakil Yapılan Hastalar</h1>
</div>

<div class="container d-flex justify-content-center mt-5">
	<form class="form-inline" action="#" method="post">
		  <div class="form-group mx-sm-3 mb-2">
		    	<input type="text" class="form-control" name="name" onchange="sending()" id="inputPassword2" placeholder="Hasta Adı Giriniz.">
		  </div>
	  <button type="submit" name="click" class="btn btn-primary mb-2">Hastayı Ara</button>
	</form>
</div>

<div class="ana">

	<input type="text" id="name" />

	<div class="kelimeler">

	</div>

</div>

<div class="container text-center mt-5 bg-light">
<?php if($search){ ?>
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
<?php } ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">

$(function(){
	$("#name").keyup(function(){//inputta bir tuşa basılırsa
		var kelime = $(this).val();//değerini al
		$.post("process.php",{
			"name" : kelime
			},function(al){ //ara.php ye gönder

			$(".kelimeler").html(al);//gelen verileri .kerlimeler clasına ait divin içine yaz
		});
	});

});

function tamamla(al){//tamamla fonsiyonu çağırılınca gönderilen veriyi al

	$("#name").val(al);//inputa koy

	$(".kelimeler").text("");//kelimeler clasına ait divi temizle

}

</script>

</body>
</html>