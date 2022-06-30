

<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('styles/home.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('scripts/home.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar-content'); ?>
    <div class="link">
        <a href="<?php echo e(route('favourites')); ?>">Film preferiti</a>
    </div>
    <div class="link">
        <a href="<?php echo e(route('profile')); ?>">Profilo</a>
    </div>
    <div class="link">
        <a href="<?php echo e(route('logout')); ?>">Esci</a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('links'); ?>
    <a href="<?php echo e(route('favourites')); ?>">Film preferiti</a>
    <a href="<?php echo e(route('profile')); ?>">Profilo</a>
    <a href="<?php echo e(route('logout')); ?>">Esci</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('profile'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('profile'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('article'); ?>
    <div class="form-box">
        <h1>Nuovo post</h1>
        <form name="post-form" method="post" enctype="multipart/form-data" action="<?php echo e(route('signup')); ?>">
        <?php echo csrf_field(); ?>
            <label><textarea name="text" cols="30" rows="10" placeholder="Inserisci la descrizione..."></textarea></label>
            <label for="file-upload" class="custom-file-upload">Carica un'immagine</label>
            <label><input type="file" name="picture" accept="image/*" id="file-upload"></label>
            <label><input type="submit" name="submit" value="Pubblica" disabled></label>
        </form>
    </div>
    <div id="feed"></div>
    <template>
        <section class="post">
            <div class="header">
                <div class="user">
                    <img src="">
                    <div>
                        <span><strong class="name"></strong></span><br>
                        <span><em class="username"></em></span>
                    </div>
                </div>
                <div class="date">
                    <span></span>
                </div>
            </div>
            <div class="content">
                <p></p>
                <img src="" class="hidden">
            </div>
            <div class="bottom">
                <div class="like">
                    <img src="<?php echo e(asset('img/like.png')); ?>">
                    <span></span>
                </div>
            </div>
            <div class=""></div>
        </section>
    </template>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\felic\hw2\resources\views/home.blade.php ENDPATH**/ ?>