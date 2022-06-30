<?php $__env->startSection('title', 'Accedi'); ?>

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('styles/login.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('scripts/login.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="login">
        <div class="hidden overlay">
            <div class="box">
                <div id="close-icon">
                    <img src="<?php echo e(asset('img/close.png')); ?>">
                </div>
                <main id="signup">
                    <h1>Registrazione</h1>
                    <p class="hidden" id="form-error">Compilare tutti i campi!</p>
                    <form name='signup-form' method='post' action="<?php echo e(route('signup')); ?>">
                        <?php echo csrf_field(); ?>
                        <label>Nome <input type='text' name='name'></label>
                        <label>Cognome <input type='text' name='surname'></label>
                        <label>Email <input type='text' name='email' id="email"></label>
                        <p class="hidden" id="invalid-email">Email non valida!</p>
                        <p class="hidden" id="duplicate-email">Email già in uso!</p>
                        <label>Nome utente <input type='text' name='signup-username' id="username"></label>	
                        <ul class="hidden" id="invalid-username">
                            Il nome utente può contenere solo:
                            <li>Lettere minuscole</li>
                            <li>Numeri</li>
                            <li>Trattino basso ( _ )</li>
                            <li>Punto ( . )</li>
                        </ul>
                        <p class="hidden" id="duplicate-username">Username già in uso!</p>
                        <label>Password <input type='password' name='signup-password' id="password"></label>
                        <p class="hidden" id="password-error">La password non rispetta i requisiti necessari!</p>
                        <label>Conferma password <input type='password' name='confirm-password' id="confirm-password"></label>
                        <p class="hidden" id="confirm-password-error">Le password non coincidono!</p>
                        <label>Requisiti password <img id="password-info" src="img/info.png"></label>
                        <ul id="info" class="hidden">
                            <li>lunghezza compresa tra 8 e 20 caratteri</li>
                            <li>caratteri alfanumerici (almeno una maiuscola)</li>
                            <li>almeno un carattere speciale</li>
                        </ul>
                        <label>&nbsp;<input type='submit' value='Registrati' id="signup-submit">&nbsp;</label>
                    </form>
                </main>
            </div>
        </div>
        <div id="login-background"></div>
        <div id="login-area">
            <h1>Accedi al Blog del Cinema</h1>
            <p class="hidden" id="login-error">Compilare tutti i campi!</p>
            <?php if(isset($error) && $error == true): ?>
                <p>Username o password errati!</p>
            <?php endif; ?>
            <main>
                <form name='login-form' method='post' action="<?php echo e(route('login-post')); ?>">
                    <?php echo csrf_field(); ?>
                    <label>Nome utente <input type='text' name='login-username'></label>
                    <label>Password <input type='password' name='login-password'></label>
                    <label>&nbsp;<input type='submit' value='Accedi'>&nbsp;</label>
                </form>
            </main>
            <p>Non sei ancora registrato?</p>
            <button id="signup-button">Registrati</button>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\felic\hw2\resources\views/login.blade.php ENDPATH**/ ?>