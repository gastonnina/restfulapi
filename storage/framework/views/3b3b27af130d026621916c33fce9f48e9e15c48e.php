<?php $__env->startComponent('mail::message'); ?>
# Hello <?php echo e($user->name); ?>


Thank You for creating an account. Please verify your email using this button:

<?php $__env->startComponent('mail::button', ['url' => route('verify', $user->verification_token)]); ?>
Verify account
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
