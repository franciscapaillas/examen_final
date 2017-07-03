<?php include('header.php');?>

<section id="page">

<div class="container">
<div class="row">
  <div class="col-lg-12 text-center">
    <h2 class="page-heading">Acreditaciones</h2>
  </div>
  <div class="col-lg-10 col-lg-offset-1">

    <?php
    $csv = array_map('str_getcsv', file('datos/acreditacion.csv'));
    array_walk($csv, function(&$a) use ($csv) {$a = array_combine($csv[0], $a);});
    array_shift($csv);
    ?>



    <table id="tablesorter" class="tablesorter" border="0" cellpadding="0" cellspacing="1">
    		<thead>
    			<tr>
    				<th><h6>Carrera</h6></th>
    				<th><h5>Institución</h5></th>
            <th><h5>Acreditación Institución</h5></th>
    				<th><h5>Periodo Acreditacion Carrera</h5></th>
    				<th><h5>Documento Acreditador</h5></th>

    			</tr>
    		</thead>
    		<tbody>

    			<?php for($a = 0; $a < $total = count($csv); $a++){?>

    			<tr>
    				<td><?php echo($csv[$a]["carrera"])?></td>
    				<td><?php echo($csv[$a]["institucion"])?></td>
            <td><?php echo($csv[$a]["acreditacion_institucion"])?></td>
    				<td><?php echo($csv[$a]["periodo_acreditacion_carrera"])?></td>
            <td><?php
            if ($csv[$a]["Documento_Acreditador"] == "Acuerdo") { ?>
                <a href="<?php echo($csv[$a]["Enlace"] )?>"target="_blank"><?php echo($csv[$a]["Documento_Acreditador"])?></a>
                <?php
            }
            if ($csv[$a]["Documento_Acreditador"] == "No Acreditada") {
                echo ($csv[$a]["Documento_Acreditador"]);
            }
            ?></td>
    			</tr>



    			<?php };?>

    		</tbody>
    	</table>
      <br>
      <br>




    <center>  <form method="get" action="datos/acreditacion.csv">
<button type="submit" class="btn btn-info btn-lg">Descarga los datos</button>
</form> </center>

      <br>
      <br>


      <center><p5>Los datos de acreditación fueron extraídos de <a href="http://www.mifuturo.cl/index.php/futuro-laboral/buscador-por-carrera-d-institucion">http://www.mifuturo.cl</a>
        <br>
        Ministerio de Educación, Gobierno de Chile.
        <br>
        Comisión Nacional de acreditación<a href="https://www.cnachile.cl/">https://www.cnachile.cl</a>,
        <br>
        AcreditAcción <a href="http://www.acreditaccion.cl/resultado_de_acreditacion.php">http://www.acreditaccion.cl</a>
        <br>
        Agencia Acreditadora De Arquitectura Arte y Diseño <a href="http://www.aadsa.cl/convenios/">http://www.aadsa.cl</a>.

      </center></p5>






  </div>
</div>
</div>

</section>

<?php include('footer.php');?>
