 
<?php $__env->startSection('content'); ?>
<!-- main content -->
<?php
$yearx=date('Y');
$enero=0;
$febrero=0;
$marzo=0;
$abril=0;
$mayo=0;
$junio=0;
$julio=0;
$agosto=0;
$septiembre=0;
$octubre=0;
$noviembre=0;
$diciembre=0;

$enerox=0;
$febrerox=0;
$marzox=0;
$abrilx=0;
$mayox=0;
$juniox=0;
$juliox=0;
$agostox=0;
$septiembrex=0;
$octubrex=0;
$noviembrex=0;
$diciembrex=0;


foreach($status[2] as $contra){
   $fcrea=explode(" ",  $contra->lead_created);
   $fc=explode("-",$fcrea[0]);
   $fecreacion=$fc[2]."-".$fc[1]."-".$fc[0];
   
  switch($fc[1]){
     case 1;
        $enero++;
        break;
    case 2;
        $febrero++;
        break;
    case 3;
        $marzo++;
        break;
    case 4;
        $abril++;
        break;
    case 5;
        $mayo++;
        break;
    case 6;
        $junio++;
        break;
    case 7;
        $julio++;
        break;
    case 8;
        $agosto++;
        break;
    case 9;
        $septiembre++;
        break;
    case 10;
        $octubre++;
        break;
    case 11;
        $noviembre++;
        break;
    case 12;
        $diciembre++;
        break;
        
   
  }


}

foreach($status[9] as $contra){
   $fcrea=explode(" ",  $contra->lead_created);
   $fc=explode("-",$fcrea[0]);
   $fecreacion=$fc[2]."-".$fc[1]."-".$fc[0];
   
  switch($fc[1]){
     case 1;
        $enerox++;
        break;
    case 2;
        $febrerox++;
        break;
    case 3;
        $marzox++;
        break;
    case 4;
        $abrilx++;
        break;
    case 5;
        $mayox++;
        break;
    case 6;
        $juniox++;
        break;
    case 7;
        $juliox++;
        break;
    case 8;
        $agostox++;
        break;
    case 9;
        $septiembrex++;
        break;
    case 10;
        $octubrex++;
        break;
    case 11;
        $noviembrex++;
        break;
    case 12;
        $diciembrex++;
        break;
        
   
  }


}

$data1=$enero.",".$febrero.",".$marzo.",".$abril.",".$mayo.",".$junio.",".$julio.",".$agosto.",".$septiembre.",".$octubre.",".$noviembre.",".$diciembre;

$data2=$enerox.",".$febrerox.",".$marzox.",".$abrilx.",".$mayox.",".$juniox.",".$juliox.",".$agostox.",".$septiembrex.",".$octubrex.",".$noviembrex.",".$diciembrex;

?>
<div class="container-fluid">
<div class="row">
<?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card col-2 shadow-lg p-1 m-5 bg-white rounded">
    <div class="card-body">
        <div class="row">
            <div class="col-12" style="text-align:center">
                <h3 id="stats-widget-value-1"><?php echo e($item->leadstatus_title); ?></h3>
               
                <h2 class=" m-b-5"><?php echo e(count($status[$item->leadstatus_id])." Leads"); ?></h2>
                <h3 id="stats-widget-value-1"><?php echo e(number_format((count($status[$item->leadstatus_id])*100)/$total,2,",",".")." %"); ?></h3>
              
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="row">
  <div class="card col-6 shadow-lg p-1 m-5 bg-white rounded">
    <div class="card-body">
        <select name="year" id="year" class="form-control" style="width: 100px;">
         <?php for($i=2021;$i<=$yearx;$i++): ?>
          <option value="<?php echo e($i); ?>" <?php if($yearx==$i): ?> selected="selected" <?php endif; ?>><?php echo e($i); ?> </option> 
         <?php endfor; ?>
         
        </select>   
        
        <img src="https://quickchart.io/chart/render/zm-dc16711c-e4a2-416c-990d-90afc503c19d?data1=<?php echo e($data1); ?>&data2=<?php echo e($data2); ?>" class="img-fluid" alt="Responsive image">
    </div>
  </div>
  
  <div class="card col-5 shadow-lg p-1 m-5 bg-white rounded">
      
  <form action="<?php echo e(route('exportar')); ?>" method="POST">
   <?php echo csrf_field(); ?>
    <div class="card-body">
      <div class="row">
        <div class="col-12">
        <h2>Exportar leads</h2>
        </div>
        <div class="col-6">
          <div class="input-group pt-3" style="width:65px; float:left">
             <span><strong>Desde</strong></span>
          </div>
          <div class="input-group m-1" style="width:120px; float:left">
                <select class="form-select form-control"  name="mesdesde" id="mesdesde" required>
                  <option value="" selected>Mes</option>
                  <option value="1">Enero</option>
                  <option value="2">Febrero</option>
                  <option value="3">Marzo</option>
                  <option value="4">Abril</option>
                  <option value="5">Mayo</option>
                  <option value="6">Junio</option>
                  <option value="7">Julio</option>
                  <option value="8">Agosto</option>
                  <option value="9">Septiembre</option>
                  <option value="10">Octubre</option>
                  <option value="11">Noviembre</option>
                  <option value="12">Diciembre</option>
                </select>
          </div>
          <div class="input-group m-1" style="width:100px; float:left">
          <select class="form-select form-control" name="yeardesde" id="yeardesde" required>
              <option value="" selected>Año</option>
                <?php for($i=2021;$i<=$yearx;$i++): ?>
              <option value="<?php echo e($i); ?>" <?php if($yearx==$i): ?> selected="selected" <?php endif; ?>><?php echo e($i); ?> </option> 
             <?php endfor; ?>
             
        </select>
        </div>
        </div>
        <div class="col-6">
             <div class="input-group pt-3" style="width:65px; float:left">
             <span><strong>Hasta</strong></span>
          </div>
           <div class="input-group m-1" style="width:120px; float:left">
                <select class="form-select form-control"  name="meshasta" id="meshasta" required>
                  <option value="" selected>Mes</option>
                  <option value="1">Enero</option>
                  <option value="2">Febrero</option>
                  <option value="3">Marzo</option>
                  <option value="4">Abril</option>
                  <option value="5">Mayo</option>
                  <option value="6">Junio</option>
                  <option value="7">Julio</option>
                  <option value="8">Agosto</option>
                  <option value="9">Septiembre</option>
                  <option value="10">Octubre</option>
                  <option value="11">Noviembre</option>
                  <option value="12">Diciembre</option>
                </select>
          </div>
          <div class="input-group m-1" style="width:100px; float:left">
          <select class="form-select form-control" name="yearhasta" id="yearhasta" required>
              <option value="" selected>Año</option>
               <?php for($i=2021;$i<=$yearx;$i++): ?>
          <option value="<?php echo e($i); ?>" <?php if($yearx==$i): ?> selected="selected" <?php endif; ?>><?php echo e($i); ?> </option> 
         <?php endfor; ?>
             
        </select>
        </div>
        </div>
        
        <div class="col-6">
         <div class="input-group pt-3">
             <span><strong>Estado del lead</strong></span>
          </div>
          <div class="input-group mb-3" style=" float:left">
                <select class="form-select form-control" name="estadoleads" id="estadoleads">
                  <option selected>Todos</option>
                  <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($item2->leadstatus_id); ?>"><?php echo e($item2->leadstatus_title); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
          </div>
        </div>
        <div class="col-6">
            <div class="input-group pt-3">
             <span><strong>Usuarios</strong></span>
          </div>
          <div class="input-group mb-3" style=" float:left">
                <select class="form-select form-control"  name="usuariolead" id="usuariolead">
                  <option selected>Todos</option>
                  <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($user2->id); ?>"><?php echo e($user2->first_name." ".$user2->last_name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
          </div>
        </div>
        
        <div class="col-3">
          <div class="input-group mb-3" style=" float:left">
              <input type="submit"  class="btn btn-success"  value="exportar">
                
          </div>
        </div>
      </div>
     </div>
       </form> 
    </div>
  
 </div>

    <!--admin dashboard-->
    <?php if(auth()->user()->is_team): ?>
    <?php if(auth()->user()->is_admin): ?>
    
    <?php else: ?>
     
    <?php endif; ?>
    <?php endif; ?>

    <?php if(auth()->user()->is_client): ?>
   
    <?php endif; ?>



</div>
<!--main content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mimet.etasoft.cl/public_html/application/resources/views/pages/reportes/reports.blade.php ENDPATH**/ ?>