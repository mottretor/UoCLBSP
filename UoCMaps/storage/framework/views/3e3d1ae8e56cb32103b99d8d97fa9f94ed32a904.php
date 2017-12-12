<div style="width: 100%">
	<!-- include form -->
	<div style="width: 25%; float: left">
		<?php echo $__env->make('forms.addbuildingform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>

	<!-- include map -->
	<div style="width: 75%; float: right">
		<?php echo $__env->make('map', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div> 

</div>

