

<?php $__env->startSection('title', 'Profilo'); ?>

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="styles/profile.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="scripts/profile.js" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar-content'); ?>
    <div class="link">
        <a href="<?php echo e(route('home')); ?>">Home</a>
    </div>
    <div class="link">
        <a href="<?php echo e(route('favourites')); ?>">Film preferiti</a>
    </div>
    <div class="link">
        <a href="<?php echo e(route('logout')); ?>">Esci</a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('links'); ?>
    <a href="<?php echo e(route('home')); ?>">Home</a>
    <a href="<?php echo e(route('favourites')); ?>">Film preferiti</a>
    <a href="<?php echo e(route('logout')); ?>">Esci</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('profile'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('article'); ?>
    <main>
        <div id="info">
            <img id="photo" src="<?php echo e($user['picture']); ?>">
            <table>
                <tr><td><strong>Nome:</strong></td><td><?php echo e($user['name']); ?></td></tr>
                <tr><td><strong>Cognome:</strong></td><td><?php echo e($user['surname']); ?></td></tr>
                <tr><td><strong>Username:</strong></td><td><?php echo e($user['username']); ?></td></tr>
                <tr><td><strong>Email:</strong></td><td><?php echo e($user['email']); ?></td></tr>
            </table>
        </div>
        <h1>Modifica password</h1>
        <?php if(isset($error) && $error == true): ?>
            <p>Password attuale errata!</p>
        <?php elseif(isset($error) && $error == false): ?>
            <p>Password modificata con successo!</p>
        <?php endif; ?>
        <p class="hidden" id="password-error">La password non rispetta i requisiti di sicurezza!</p>
        <p class="hidden" id="confirm-password-error">Le password non coincidono!</p>
        <p class="hidden" id="empty-error">Compilare tutti i campi!</p>
        <div class="form-box">
            <form name="change-password" method="post" action="<?php echo e(route('profile-post')); ?>">
            <?php echo csrf_field(); ?>
                <label id="old-pssw">Password attuale <input type="password" name="old-password"></label>
                <label>Nuova password <input type="password" name="new-password" id="new-password"></label>
                <label>Conferma password <input type="password" name="confirm-password" id="confirm-password"></label>
                <label>&nbsp;<input type='submit' value='Modifica'>&nbsp;</label>
            </form>   
        </div> 
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\felic\hw2\resources\views/profile.blade.php ENDPATH**/ ?>