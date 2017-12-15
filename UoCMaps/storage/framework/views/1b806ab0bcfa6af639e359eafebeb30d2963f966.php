<?php $__env->startSection('css'); ?>
  <style>
      .loading {
          background: lightgrey;
          padding: 15px;
          position: fixed;
          border-radius: 4px;
          left: 50%;
          top: 50%;
          text-align: center;
          margin: -40px 0 0 -50px;
          z-index: 2000;
          display: none;
      }

      .form-group.required label:after {
          content: " *";
          color: red;
          font-weight: bold;
      }
  </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <div id="content">
    <?php echo $__env->make('users.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>
  <div class="loading">
    <i class="fa fa-refresh fa-spin fa-2x fa-tw"></i>
    <br>
    <span>Loading</span>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
  <script src="<?php echo e(asset('js/ajaxcrud.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>