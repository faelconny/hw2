

<?php $__env->startSection('body'); ?>
    <body>
        <?php $__env->startSection('sidebar'); ?>
        <div class="sidebar">
            <img src="img/close_white.png">
            <div>
                <?php echo $__env->yieldContent('sidebar-content'); ?>
            </div>
        </div>
        <div class="hidden close-sidebar"></div>
        <?php echo $__env->yieldSection(); ?>
        <div class="page">
            <nav>
                <div id="logo">Blog del Cinema</div>
                <div id="links">
                    <?php echo $__env->yieldContent('links'); ?>
                </div>
                <div id="menu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </nav>
            <?php $__env->startSection('header'); ?>
                <header>
                    <div class="overlay"></div>
                </header>
            <?php echo $__env->yieldSection(); ?>
            <?php $__env->startSection('profile'); ?>
                <div id="profile">
                    <img id="photo" src="<?php echo e($user['picture']); ?>">
                    <div id="name">
                        <strong><?php echo e($user['name']." ".$user['surname']); ?></strong><br>
                        <em><?php echo e("@".$user['username']); ?></em>
                    </div>
                </div>
            <?php echo $__env->yieldSection(); ?>
            <article>
                <?php echo $__env->yieldContent('article'); ?>
            </article>
            <?php $__env->startSection('footer'); ?>
                <footer>
                    <div>
                        Università degli Studi di Catania<br>
                        Dipartimento di Ingegneria Elettrica Elettronica e Informatica<br>
                        <a href="https://www.dieei.unict.it/corsi/l-8-inf">Corso di Laurea in Ingegneria Informatica</a>
                    </div>
                    <div>
                        Felice Simone Coniglio<br>
                        n. matricola: 1000001151<br>
                        e-mail: <a href="mailto:felice.coniglio@studium.unict.it">felice.coniglio@studium.unict.it</a>
                    </div>
                </footer>
            <?php echo $__env->yieldSection(); ?>
        </div>
    </body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\felic\hw2\resources\views/layouts/user.blade.php ENDPATH**/ ?>