

<?php $__env->startSection('title', 'Logout'); ?>

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('styles/logout.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <nav>
        <div id="logo">Blog del Cinema</div>
        <div id="links">
            <a href="<?php echo e(route('login')); ?>">Accedi</a>
        </div>
    </nav>
    <main>
        <h1>La disconnessione è stata effettuata con successo</h1>
        <a href="<?php echo e(route('login')); ?>">Torna al login</a>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\felic\hw2\resources\views/logout.blade.php ENDPATH**/ ?>