Hello <?php echo e($user->name); ?>

Thank You for creating an account. Please verify your email using this link:
<?php echo e(route('verify', $user->verification_token)); ?>

