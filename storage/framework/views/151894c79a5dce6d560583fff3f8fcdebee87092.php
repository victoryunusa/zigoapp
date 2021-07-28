<?php
    $logo=asset(Storage::url('uploads/logo/'));
 $company_logo=Utility::getValByName('company_logo');
?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Vendor Login')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="login-contain">
        <div class="login-inner-contain">
            <a class="navbar-brand" href="#">
                <img src="<?php echo e($logo.'/'.(isset($company_logo) && !empty($company_logo)?$company_logo:'logo.png')); ?>" class="navbar-brand-img big-logo" alt="logo">
            </a>
            <div class="login-form">
                <ul class="login-menu">
                    <li class="gray-login"><a href="<?php echo e(route('login')); ?>"><?php echo e(__('User Login')); ?></a></li>
                    <li class="gray-login"><a href="<?php echo e(route('customer.login')); ?>"><?php echo e(__('Customer Login')); ?></a></li>
                    <li class="blue-login"><a href="<?php echo e(route('vender.login')); ?>"><?php echo e(__('Vendor Login')); ?></a></li>
                </ul>
                <div class="page-title"><h5><span><?php echo e(__('Vendor')); ?></span> <?php echo e(__('Login')); ?></h5></div>
                <?php echo e(Form::open(array('route'=>'vender.login','method'=>'post','id'=>'loginForm'))); ?>

                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="email" class="form-control-label"><?php echo e(__('Email')); ?></label>
                    <input class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback" role="alert"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label for="password" class="form-control-label"><?php echo e(__('Password')); ?></label>
                    <input class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password" type="password" name="password" required autocomplete="current-password">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback" role="alert"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <a href="<?php echo e(route('vender.change.langPass')); ?>" class="text-xs text-primary"><?php echo e(__('Forgot Your Password?')); ?></a>
                <button type="submit" class="btn-login"><?php echo e(__('Login')); ?></button>
                <?php echo e(Form::close()); ?>

            </div>

            <h5 class="copyright-text">
                <?php echo e((Utility::getValByName('footer_text')) ? Utility::getValByName('footer_text') :  __('Copyright AccountGo')); ?> <?php echo e(date('Y')); ?>

            </h5>
            <div class="all-select">
                <a href="#" class="monthly-btn">
                    <span class="monthly-text py-0"><?php echo e(__('Change Language')); ?></span>
                    <select name="language" id="language" class="select-box select2" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                        <?php $__currentLoopData = Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if($lang == $language): ?> selected <?php endif; ?> value="<?php echo e(route('vender.login.lang',$language)); ?>"><?php echo e(Str::upper($language)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/zigoair/resources/views/auth/vender_login.blade.php ENDPATH**/ ?>