<div class="card bg-none card-box">
    <?php echo e(Form::open(array('url' => 'product-unit'))); ?>

    <div class="row">
        <div class="form-group col-md-12">
            <?php echo e(Form::label('name', __('Unit Name'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::text('name', '', array('class' => 'form-control','required'=>'required'))); ?>

            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <small class="invalid-name" role="alert">
                <strong class="text-danger"><?php echo e($message); ?></strong>
            </small>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-md-12">
            <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn-create badge-blue">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH /Applications/MAMP/htdocs/zigoair/resources/views/productServiceUnit/create.blade.php ENDPATH**/ ?>