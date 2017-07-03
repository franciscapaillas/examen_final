<?php include('header.php');?>

<section id="page">

<div class="container">
<div class="row">
  <div class="col-lg-12 text-center">
    <h2 class="page-heading">Aranceles</h2>
  </div>
  <div class="col-lg-10 col-lg-offset-1">

    <?php
    $csv = array_map('str_getcsv', file('datos/arancel.csv'));
    array_walk($csv, function(&$a) use ($csv) {$a = array_combine($csv[0], $a);});
    array_shift($csv);
    ?>
                        <table id="tablesorter" class="tablesorter" border="0" cellpadding="0" cellspacing="1">
                      		<thead>
                      			<tr>
                      				<th>Carrera</th>
                      				<th>Institución</th>
                      				<th>Arancel anual</th>
                      				<th>Arancel total formal considerando la duración formal de la carrera</th>
                      				<center><th>Arancel total real considerando la duración real de la carrera</th></center>


                      			</tr>
                      		</thead>
                      		<tbody>

                      			<?php for($a = 0; $a < $total = count($csv); $a++){?>

                      			<tr>
                      				<td><?php echo($csv[$a]["carrera"])?></td>
                      				<td><?php echo($csv[$a]["escuela"])?></td>
                      				<td><?php echo($csv[$a]["arancel_anual"]);?></td>
                              <td><?php echo($csv[$a]["arancel_formal"]);?></td>
                              <td><?php echo($csv[$a]["arancel_real"]);?></td>


                      			</tr>

                      			<?php };?>


                      		</tbody>
                      	</table>
                        <br>
                        <br>


                        <center><p5>Los datos de arancel fueron extraídos de <a href="http://www.mifuturo.cl/">http://www.mifuturo.cl</a>
                          <br>
                          Ministerio de Educación, Gobierno de Chile.
                          <br>
                        </center></p5>

                      <center>  <form method="get" action="datos/arancel_final.csv">
                  <button type="submit" class="btn btn-info btn-lg">Descarga los datos</button>
                  </form> </center>


  </div>
</div>
</div>

</section>

<?php include('footer.php');?>
