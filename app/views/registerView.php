<?php require_once '../app/incl/header-tiny.php'; ?> 

    <main class="main container row">
        <section class="twelve columns">
            <div class="register-container">
                <h3>Register: </h3>
                <form action="action" method="POST">
                    <input type="text" name="username" placeholder="Username" /><br />
                    <input type="password" name="password" placeholder="Password" /><br />
                    <input type="email" name="email" placeholder="Email"><br />
                    <input type="submit" name="loginSubmit" value="C'mon" />
                </form>
            </div>
        </section>
    </main>
    
<?php require_once '../app/incl/footer.php'; ?>