<div class="container">
  <div class="col-md-8 offset-md2">
    <h2>View User : </h2>
    <hr>

    <div class="form-group">
      <h4>Name :- <?php echo e($post->name); ?></h4>
    </div>
    <div class="form-group">
      <h4>Email :- <?php echo e($post->email); ?></h4>
    </div>
    <!-- <div class="form-group">
      <h4>Nic :- <?php echo e($post->nic); ?></h4>
    </div>
    <div class="form-group">
      <h4>Job Title :- <?php echo e($post->job_title); ?></h4>
    </div>
    <div class="form-group">
      <h4>Password :- <?php echo e($post->Password); ?></h4>
    </div> -->
    <div class="form-group">
      <h4>Is Admin :- <?php echo e($post->admin); ?></h4>
    </div>
    <div class="form-group">
      <h4>Approve :- <?php echo e($post->approve); ?></h4>
    </div>
    <div class="form-group">
      <h4>Description :- <?php echo e($post->description); ?></h4>
    </div>

    <a class="btn btn-xs btn-danger" href="javascript:ajaxLoad('<?php echo e(url('users')); ?>')">Back</a>
  </div>
</div>
