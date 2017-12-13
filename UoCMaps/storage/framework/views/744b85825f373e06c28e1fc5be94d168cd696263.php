<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="row">
        <div class="col-sm-7">
          <h3>User Management</h3>
          <div class="btn-group">
  <button type="button" class="btn btn-warning"> <a href="dashboard">Back to Panel</a></button>
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
</div>
        </div>

        <div class="col-sm-5">
          <div class="pull-right">
            <div class="input-group">
              <!-- <div class="col-md-7"> -->
                <input class="form-control" id="search"
                       value="<?php echo e(request()->session()->get('search')); ?>"
                       onkeydown="if (event.keyCode == 13) ajaxLoad('<?php echo e(url('users')); ?>?search='+this.value)"
                       placeholder="Search Email" name="search"
                       type="text" id="search"/>
                       
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-primary"
                            onclick="ajaxLoad('<?php echo e(url('users')); ?>?search='+$('#search').val())">
                            <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
              <!-- </div> -->
            </div>

          </div>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>

            <th width="60px">No</th>
            <th><a href="javascript:ajaxLoad('<?php echo e(url('users?field=title&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))); ?>')">Email</a>
                <?php echo e(request()->session()->get('field')=='email'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''); ?>

            </th>

            <th><a href="javascript:ajaxLoad('<?php echo e(url('users?field=name&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))); ?>')">User Name</a>
                <?php echo e(request()->session()->get('field')=='name'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''); ?>

            </th>

            <!-- <th><a href="javascript:ajaxLoad('<?php echo e(url('posts?field=email&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))); ?>')">Email</a>
                <?php echo e(request()->session()->get('field')=='email'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''); ?>

            </th>

            <th><a href="javascript:ajaxLoad('<?php echo e(url('users?field=nic&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))); ?>')">Nic</a>
                <?php echo e(request()->session()->get('field')=='nic'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''); ?>

            </th>

            <th><a href="javascript:ajaxLoad('<?php echo e(url('posts?field=job_title&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))); ?>')">Job Title</a>
                <?php echo e(request()->session()->get('field')=='job_title'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''); ?>

            </th>

            <th><a href="javascript:ajaxLoad('<?php echo e(url('posts?field=password&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))); ?>')">Password</a>
                <?php echo e(request()->session()->get('field')=='password'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''); ?>

            </th> -->

            <th><a href="javascript:ajaxLoad('<?php echo e(url('users?field=admin&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))); ?>')">Is Admin</a>
                <?php echo e(request()->session()->get('field')=='admin'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''); ?>

            </th>

            <th><a href="javascript:ajaxLoad('<?php echo e(url('posts?field=approve&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))); ?>')">Approve</a>
                <?php echo e(request()->session()->get('field')=='approve'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''); ?>

            </th>

            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('<?php echo e(url('users?field=description&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))); ?>')">
                    Description
                </a>
                <?php echo e(request()->session()->get('field')=='description'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''); ?>

            </th>

            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('<?php echo e(url('users?field=created_at&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))); ?>')">
                    Created At
                </a>
                <?php echo e(request()->session()->get('field')=='created_at'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''); ?>

            </th>

            <th style="vertical-align: middle">
              <a href="javascript:ajaxLoad('<?php echo e(url('users?field=updated_at&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))); ?>')">
                Update At
              </a>
              <?php echo e(request()->session()->get('field')=='updated_at'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''); ?>

            </th>
            <th width="160px" style="vertical-align: middle">
              <!-- javascript:ajaxLoad('<?php echo e(url('users/create')); ?>') -->
              <a href=""
                 class="btn btn-primary btn-xs"> <i class="fa fa-star" aria-hidden="true"></i> Refresh</a>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
            $i=1;
        ?>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <th><?php echo e($i++); ?></th>
            <td><?php echo e($post->email); ?></td>
            <td><?php echo e($post->name); ?></td>
            <!-- <td><?php echo e($post->email); ?></td>
            <td><?php echo e($post->nic); ?></td>
            <td><?php echo e($post->job_title); ?></td> -->
            <td><?php echo e($post->admin); ?></td>
            <td><?php echo e($post->approve); ?></td>
            <td><?php echo e($post->description); ?></td>
            <td><?php echo e($post->created_at); ?></td>
            <td><?php echo e($post->updated_at); ?></td>
            <td>
              <a href="javascript:ajaxLoad('<?php echo e(url('users/show/'.$post->id)); ?>')"  title="Show" class="btn btn-info btn-xs"> Show</a>
              <a class="btn btn-warning btn-xs" title="Edit" href="javascript:ajaxLoad('<?php echo e(url('users/update/'.$post->id)); ?>')"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
              <input type="hidden" name="_method" value="delete"/>
                <a class="btn btn-danger btn-xs" title="Delete"
                   href="javascript:if(confirm('Are you sure want to delete?')) ajaxDelete('<?php echo e(url('users/delete/'.$post->id)); ?>','<?php echo e(csrf_token()); ?>')">
                       <i class="fa fa-delete" aria-hidden="true"></i>
                    Delete
                </a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>

        <ul class="pagination">
            <?php echo e($users->links()); ?>

        </ul>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>