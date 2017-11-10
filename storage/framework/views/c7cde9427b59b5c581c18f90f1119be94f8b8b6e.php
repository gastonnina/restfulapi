Hello <?php echo e($user->name); ?>

You changed your email, so we need to verify this. Please use the link below:
<?php echo e(route('verify', $user->verification_token)); ?>

