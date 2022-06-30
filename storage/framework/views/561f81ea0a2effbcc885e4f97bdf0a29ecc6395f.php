

<?php $__env->startSection('title', 'Immagine del profilo'); ?>

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('styles/profile_picture.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('scripts/profile_picture.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('profile'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('links'); ?>
<a href="<?php echo e(route('logout')); ?>">Esci</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('article'); ?>
<main id="profile-picture-main">
    <section id="profile-picture-box" class="box">
    <h1><?php echo e($user['name']); ?>, scegli un'immagine del profilo</h1>
        <img src="" data-id="one">
        <img src="" data-id="two">
        <img src="" data-id="three">
        <img src="" data-id="four">
        <img src="" data-id="five">
        <img src="" data-id="six">
        <img src="" data-id="seven">
        <img src="" data-id="eight">
        <img src="" data-id="nine">
        <button>Invia</button>
    </section>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\felic\hw2\resources\views/picture.blade.php ENDPATH**/ ?>