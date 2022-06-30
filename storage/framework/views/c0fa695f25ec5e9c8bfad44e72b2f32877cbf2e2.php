<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href="<?php echo e(asset('style/login.css')); ?>">
        <script src="<?php echo e(asset('scripts/login.js')); ?>" defer></script>
        <script type="text/javascript">
            const CSRF_TOKEN = '<?php echo e(csrf_token()); ?>'; 
        </script>


        <title> Crypto News - Accedi</title>
    </head>
    <body>
        
        <div class="container" id="container">
	            <div class="form-container sign-up-container">
		            <form  method='post'>
			            <h1>Create Account</h1>
                        <div>
                            <input type="text" name ='name' placeholder="Name" />
                            <p class='hidden-style hidden vuoto'>Questo campo non può essere vuoto</p>
                        </div>
                        <div>
                            <input type="text" name='surname' placeholder="Surname" />
                            <p class='hidden-style hidden vuoto'>Questo campo non può essere vuoto</p>
                        </div>
                        <div>
                            <input id='username' type="text" name='username' placeholder="Username" />
                            <p class='hidden-style hidden vuoto'>Questo campo non può essere vuoto</p>
                            <p  id ='username-in-uso' class='hidden-style hidden errore'>username già in uso</p>
                        </div>
                        <div>
                            <input id='password' type="password" name='password' placeholder="Password" />
                            <p id ='password-non-valida' class='hidden-style hidden errore'>La password deve essere lunga almeno 8 caratteri e deve contenere una maiuscola,dei numeri e un carattere speciale !@#$%^&*</p>
                            <p class='hidden-style hidden vuoto'>Questo campo non può essere vuoto</p>
                        </div>
                         <div>
                            <input class='button' id='button-signup' type='button' value="Sign Up">
                            <p class='hidden-style hidden errore'> Username già in uso e/o password non valida </p>
                            <p class='hidden-style hidden vuoto'>Nessun campo può rimanere vuoto </p>
                        </div>
		            </form>
	            </div>
                <div class="form-container sign-in-container" >
                    <form  method='post' action="<?php echo e(route('login/checkData')); ?>">
                        <?php echo csrf_field(); ?>
                        <h1>Sign in</h1>
                        <input type="text" name='username' placeholder="Username" />
                        <input type="password" name='password' placeholder="Password" />
                        <input class='button' type='submit' value="Sign In">
                        <?php if(isset($error)): ?> <p> <?php echo e($error); ?></p> <?php endif; ?>
                    </form>
	            </div>
	            <div class="overlay-container">
		            <div class="overlay">
			            <div class="overlay-panel overlay-left">
				            <h1>Welcome Back!</h1>
				            <p>To keep connected with us please login with your personal info</p>
				            <button class="ghost button" id="signIn">Sign In</button>
			            </div>
			            <div class="overlay-panel overlay-right">
				            <h1>Hello, Friend!</h1>
				            <p>Enter your personal details and start journey with us</p>
				            <button class="ghost button" id="signUp">Sign Up</button>
			            </div>
		            </div>
	            </div>
        </div>

        <footer>
	        <p>Created with by Andrea Antonino Maugeri 1000004687</p>
        </footer>
</body>
</html><?php /**PATH C:\Users\Andrea Maugeri\hw2\resources\views/login.blade.php ENDPATH**/ ?>