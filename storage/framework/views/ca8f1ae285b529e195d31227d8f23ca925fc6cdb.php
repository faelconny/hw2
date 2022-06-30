<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Limelight&display=swap" rel="stylesheet">
        <meta name="viewport"content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo e(asset('img/favicon.ico')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('styles/common_style.css')); ?>">
        <?php echo $__env->yieldContent('style'); ?>
        <?php echo $__env->yieldContent('script'); ?>
		<title>Blog del Cinema | <?php echo $__env->yieldContent('title'); ?></title>
	</head>
	<?php echo $__env->yieldContent('body'); ?>
</html><?php /**PATH C:\Users\felic\hw2\resources\views/layouts/app.blade.php ENDPATH**/ ?>