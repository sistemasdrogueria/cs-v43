<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Canje Comunidad Sur</title>
</head>

<body>
<table width="560" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F5F5F5">
  <tbody>
    <tr>
      <td width="560" align="center"><table width="560" cellspacing="0" cellpadding="0" border="0" bgcolor="#F5F5F5">
        <tbody>
          <tr>
            <td width="30" height="15"></td>
            <td width="500"></td>
            <td width="30" height="15"></td>
          </tr>
          <tr>
            <td width="30"></td>
            <td width="500" align="center"><img src="http://www.drogueriasur.com.ar/cs/webroot/img/logo_comunidad_sur300.png" alt="Comunidad Sur" width="200" height="60" border="0" /></td>
            <td width="30"></td>
          </tr>
          <tr>
            <td width="30"></td>
            <td width="500" height="15"></td>
            <td width="30"></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td width="560" align="center"><table width="560" cellspacing="0" cellpadding="0" border="0" bgcolor="#0094D4">
        <tbody>
          <tr>
            <td width="30"></td>
            <td width="500" height="20"></td>
            <td width="30"></td>
          </tr>
          <tr>
            <td width="30"></td>
            <td width="500">Resumen de tu canje</td>
            <td width="30"></td>
          </tr>
          <tr>
            <td width="30"></td>
            <td width="500" height="20"></td>
            <td width="30"></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td width="560" align="center"><table width="560" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff">
        <tbody>
          <tr>
            <td width="30" ></td>
            <td width="500" height="30" ></td>
            <td width="30" ></td>
          </tr>
          <tr>
            <td width="30" ></td>
            <td width="500" ><div align="left">Hola <?php echo $cliente['nombre']?>, </div></td>
            			
			<td width="30" ></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td width="560" align="center"><table width="560" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff">
        <tbody>
          <tr>
            <td width="30" ></td>
            <td height="15" colspan="2" ></td>
            <td width="30" ></td>
          </tr>
          <tr>
            <td width="30" ></td>
            <td colspan="2" ><div align="left">Este es el resumen de tu canje: </div></td>
            <td width="30" ></td>
          </tr>
          <tr>
            <td width="30" ></td>
            <td height="30" colspan="2" ></td>
            <td width="30" ></td>
          </tr>
          <tr>
		  
            <td width="30" ></td>
            <td width="319" ><div align="left"> 
			  <strong>Número de canje: </strong>	<?php echo $canje['id']?> 				<br />
              <strong>Beneficio: </strong>			<?php echo $beneficio['nombre']?>		<br />
			  <strong>Total de puntos: </strong> 	<?php echo $canje['cantidad_puntos']?>	<br />
              <strong>Dirección de entrega:</strong><?php echo $cliente['nombre']?>			<br />
              <?php echo $cliente['domicilio'] ?>    <br />
              <?= $cliente->has('provincia') ? $cliente->provincia->nombre : '' ?><br />
			  <?= $cliente->has('localidad') ? $cliente->localidad->nombre : '' ?><br />
			  <?= $cliente['codigo_postal'] ?>  <br />
			  <?= $cliente['telefono'] ?>  <br />
			  </div></td>
            <td width="181" align="center" valign="middle" ><img src="http://www.drogueriasur.com.ar/cs/img/beneficios/<?php echo $beneficio['imagen']?>" alt="Beneficio" width="176" /></td>
            <td width="30" ></td>
          </tr>
          <tr>
            <td width="30" ></td>
            <td height="30" colspan="2" ></td>
            <td width="30" ></td>
          </tr>
          <tr>
            <td width="30" ></td>
            <td colspan="2" ><div align="left"> El plazo de entrega es de <strong>hasta 4 semanas</strong> según producto y disponibilidad del fabricante. </div></td>
            <td width="30" ></td>
          </tr>
          <tr>
            <td width="30" ></td>
            <td height="15" colspan="2" ></td>
            <td width="30" ></td>
          </tr>
          <tr>
            <td width="30" ></td>
            <td colspan="2" ><div align="left">Cuando tu beneficio esté en camino, <strong> te enviaremos un email avisándote de la fecha estimada de entrega.</strong></div></td>
            <td width="30" ></td>
          </tr>
          <tr>
            <td width="30" ></td>
            <td height="15" colspan="2" ></td>
            <td width="30" ></td>
          </tr>
          <tr>
            <td width="30" ></td>
            <td colspan="2" ><div align="left">Muchas gracias por tu confianza. Seguí acumulando puntos con tus compras en Drogueria Sur. </div></td>
            <td width="30" ></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td width="560" align="center"><table width="560" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff">
        <tbody>
          <tr>
            <td width="30" ></td>
            <td width="500" height="30" ></td>
            <td width="30" ></td>
          </tr>
          <tr>
            <td width="30" ></td>
            <td width="500" ><div align="left">¡Disfrutá de tu beneficio! </div></td>
            <td width="30" ></td>
          </tr>
          <tr>
            <td width="30" ></td>
            <td width="500" height="15" ></td>
            <td width="30" ></td>
          </tr>
          <tr>
            <td width="30" ></td>
            <td width="500" ><div>
              <p><strong>Comunidad Sur</strong><br />
              </p>
            </div></td>
            <td width="30" ></td>
          </tr>
          <tr>
            <td width="30" ></td>
            <td width="500" height="30" ></td>
            <td width="30" ></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td width="560" bgcolor="#f5f5f5"><table width="560" cellspacing="0" cellpadding="0" border="0" align="center">
        <tbody>
          <tr>
            <td width="30"></td>
            <td width="500" height="15"></td>
            <td width="30"></td>
          </tr>
          <tr>
            <td width="30" height="51"></td>
            <td width="500">
        
                 <p><a href="mailto:comunidadsur@drogueriasur.com.ar" target="_blank">comunidadsur@drogueriasur.com.ar</a><br>			<a href="" target="_blank" data-saferedirecturl="">comunidadsur.com.ar</a></p>
             
              </td>
            <td width="30"></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td width="560" align="center"><table width="560" cellspacing="0" cellpadding="0" border="0">
        <tbody>
          <tr>
            <td width="30"></td>
            <td width="500" height="30"></td>
            <td width="30"></td>
          </tr>
          <tr>
            <td width="30"></td>
            <td width="500"><div align="left">Si tenés cualquier pregunta relativa a tu beneficio, envianos un email a <strong><a href="mailto:comunidadsur@drogueriasur.com.ar" target="_blank">comunidadsur@drogueriasur.com.ar</a></strong> indicando en el asunto del mensaje tu número de canje: <?php echo $canje['id']?>.</div></td>
            <td width="30"></td>
          </tr>
          <tr>
            <td width="30"></td>
            <td width="500" height="15"></td>
            <td width="30"></td>
          </tr>
          <tr>
            <td width="30"></td>
            <td width="500"><div align="left">Te   recordamos que no se permitirá la cancelación de canjes  y su   correspondiente devolución de puntos 24h después de la realización   del canje.</div></td>
            <td width="30"></td>
          </tr>
          <tr>
            <td width="30"></td>
            <td width="500" height="15"></td>
            <td width="30"></td>
          </tr>
          <tr>
            <td width="30"></td>
            <td width="500"><div align="left">Conocé en detalle nuestra <a href="" target="_blank" data-saferedirecturl="">información legal.</a> Si no querés recibir más emails de Comunidad Sur hacé click <a href="" target="_blank" data-saferedirecturl=""><strong>aquí</strong></a>.</div></td>
            <td width="30"></td>
          </tr>
          <tr>
            <td width="30"></td>
            <td width="500" height="20"></td>
            <td width="30"></td>
          </tr>
          <tr>
            <td width="30"></td>
            <td width="500"><div align="left"> © Drogueria Sur S.A..  (+54) 291 458 3077</div></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
</body>
</html>
