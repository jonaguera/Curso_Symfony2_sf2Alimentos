<?php ob_start() ?>

<form name="formBusqueda" action="index.php?ctl=buscarAlimentosCombinada" method="POST">

  <table>
      <tr>
          <td>energía:</td>
          <td><input type="text" name="energia_min" value="<?php echo $params['energia_min']?>"></td>
          <td><input type="text" name="energia_max" value="<?php echo $params['energia_max']?>"></td>
      </tr>
      <tr>
          <td>proteina:</td>
          <td><input type="text" name="proteina_min" value="<?php echo $params['proteina_min']?>"></td>
          <td><input type="text" name="proteina_max" value="<?php echo $params['proteina_max']?>"></td>
      </tr>
      <tr>
          <td>hidratos de carbono:</td>
          <td><input type="text" name="hidratocarbono_min" value="<?php echo $params['hidratocarbono_min']?>"></td>
          <td><input type="text" name="hidratocarbono_max" value="<?php echo $params['hidratocarbono_max']?>"></td>
      </tr>
      <tr>
          <td>fibra:</td>
          <td><input type="text" name="fibra_min" value="<?php echo $params['fibra_min']?>"></td>
          <td><input type="text" name="fibra_max" value="<?php echo $params['fibra_max']?>"></td>
      </tr>
      <tr>
          <td>Grasa total:</td>
          <td><input type="text" name="grasatotal_min" value="<?php echo $params['grasatotal_min']?>"></td>
          <td><input type="text" name="grasatotal_max" value="<?php echo $params['grasatotal_max']?>"></td>
      </tr>
      <tr>
          <td></td>
          <td></td>
          <td><input type="submit" value="buscar"></td>
      </tr>
  </table>

  </table>

</form>

<?php if (count($params['resultado'])>0): ?>
<table>
 <tr>
     <th>alimento (por 100g)</th>
     <th>energía (Kcal)</th>
     <th>proteina (g)</th>
     <th>hidratos (g)</th>
     <th>fibra (g)</th>
     <th>grasa (g)</th>
 </tr>
 <?php foreach ($params['resultado'] as $alimento) : ?>
     <tr>
         <td><a href="index.php?ctl=ver&id=<?php echo $alimento['id'] ?>">
                 <?php echo $alimento['nombre'] ?></a></td>
         <td><?php echo $alimento['energia'] ?></td>
         <td><?php echo $alimento['proteina'] ?></td>
         <td><?php echo $alimento['hidratocarbono'] ?></td>
         <td><?php echo $alimento['fibra'] ?></td>
         <td><?php echo $alimento['grasatotal'] ?></td>
     </tr>
 <?php endforeach; ?>

</table>
<?php endif; ?>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>