<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
  <tr>
    <th>Nombre</th>
    <th>Apellido Paterno</th>
    <th>Apellido Materno</th>
    <th>Correo</th>
    <th>Telefono</th>
    <th>Origen</th>
    <th>Formulario</th>
    <th>Observación Cliente</th>
    <th>Valor del lead</th>
    <th>Curso</th>
    <th>Sede</th>
    <th>Estado Leads</th>
    <th>Fecha Creación</th>
    <th>Hora Creación</th>
    <th>Inscrito por</th>
    <th>Fecha Ultima actualización</th>
    <th>Hora Ultima actualización</th>
  </tr>
  <?php $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php
   $fcrea=explode(" ", $item->lead_created);
   $fc=explode("-",$fcrea[0]);
   $fecreacion=$fc[2]."-".$fc[1]."-".$fc[0];
   
   $correo = preg_replace('/\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|$!:,.;]*[A-Z0-9+&@#\/%=~_|$]/i', '', $item->lead_email);
   
   
   $factua=explode(" ", $item->lead_updated);
   $fact=explode("-",$factua[0]);
   $feactualiza=$fact[2]."-".$fact[1]."-".$fact[0];
   
   /*if($item->leadsassigned_userid==NULL){
     $nombreasignado="";
   }else{
   $userasig=DB::table('users')->where('id', '=',$item->leadsassigned_userid)->get();
     $nombreasignado= $userasig[0]->first_name." ".$userasig[0]->last_name;
   }
   <td>{{ $nombreasignado }}</td>
    <td>{{ $item->lead_custom_field_5 }}</td>
   */
   
  ?>
  <tr>
    <td><?php echo e($item->lead_firstname); ?></td>
    <td><?php echo e($item->lead_lastname); ?></td>
    <td><?php echo e($item->lead_materno); ?></td>
   
    <td><?php echo e($correo); ?></td>
    <td><?php echo e($item->lead_phone); ?></td>
    <td><?php echo e($item->lead_source); ?></td>
    <td><?php echo e($item->lead_title); ?></td>
    <td><?php echo e($item->lead_description); ?></td>
    <td><?php echo e(number_format($item->lead_value,0,",",".")); ?></td>
    <td><?php echo e($item->lead_custom_field_1); ?></td>
    <td><?php echo e($item->lead_custom_field_2); ?></td>
    <td><?php echo e($item->leadstatus_title); ?></td>
    <td><?php echo e($fecreacion); ?></td>
    <td><?php echo e($fcrea[1]); ?></td>
    <?php if(isset($item->idInstructor)): ?>
        <td><?php echo e($item->nombreInstructor." ".$item->apellidoInstructor); ?></td>
    <?php else: ?>
        <td></td>
    <?php endif; ?>
    <td><?php echo e($feactualiza); ?></td>
    <td><?php echo e($factua[1]); ?></td>
    
  </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</table>
</body>
</html><?php /**PATH /home/mimet.etasoft.cl/public_html/application/resources/views/pages/reportes/exportar.blade.php ENDPATH**/ ?>