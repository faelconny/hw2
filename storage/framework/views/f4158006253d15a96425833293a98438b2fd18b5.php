

<?php $__env->startSection('title', 'Preferiti'); ?>

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('styles/home.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('styles/favourites.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('scripts/favourites.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar-content'); ?>
    <div class="link">
    <a href="<?php echo e(route('home')); ?>">Home</a>
    </div>
    <div class="link">
        <a href="<?php echo e(route('profile')); ?>">Profilo</a>
    </div>
    <div class="link">
        <a href="<?php echo e(route('logout')); ?>">Esci</a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('links'); ?>
    <a href="<?php echo e(route('home')); ?>">Home</a>
    <a href="<?php echo e(route('profile')); ?>">Profilo</a>
    <a href="<?php echo e(route('logout')); ?>">Esci</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('profile'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('profile'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('article'); ?>
    <main>
        <div class="form-box">
            <h1>Ricerca un film e aggiungilo ai preferiti!</h1>
            <form name="movie-form">
                <label>&nbsp;<input type="text" name="movie" placeholder="Nome del film...">&nbsp;</label>
                <label>&nbsp;<input type="submit" value="Cerca" name="submit" disabled>&nbsp;</label>
            </form>
        </div>
    <main>
    <div id="loading" class="hidden">
        <img src="<?php echo e(asset('img/loading.svg')); ?>">
    </div>
    <div id="section" class="hidden">
        <div class="movie"></div>
        <div id="star">
            <img src="<?php echo e(asset('img/star.png')); ?>">
            <div>Aggiungi ai preferiti</div>
        </div>
        <div id="counter">
            <em>&#200; tra i preferiti di <span id="num-favourites"></span> utenti</em>
        </div>
    </div>
    <section class="hidden"></section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\felic\hw2\resources\views/favourites.blade.php ENDPATH**/ ?>