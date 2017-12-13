<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Panel Dashboard</div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Manage Maps >
  </button>
  <div class="dropdown-menu">
    
    <li><a class="dropdown-item" href="/peopleShow">People</a></li>
    <li><a class="dropdown-item" href="/geofencing">Geofencing</a></li>
    <li><a class="dropdown-item" href="/buildingShow">Building</a></li>
    <li><a class="dropdown-item" href="#">Paths</a></li>
    <li><a class="dropdown-item" href="#">Exit Points</a></li>
    
  </div>
  <button type="button" class="btn btn-default"> <a href="users">Manage Users</a></button>
  <button type="button" class="btn btn-default"> <a href="approvedashboard">Map</a></button>
  
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>