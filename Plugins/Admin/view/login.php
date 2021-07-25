<div class="columns">
    <div class="column is-half is-offset-one-quarter">
        <section class="section">
            <h1 class="title">Admin Login</h1>
            <form action="<?= htmlspecialchars($_SERVER["REQUEST_URI"]) ?>" method="post">
                <div class="field">
                    <div class="control">
                        <input type="text" class="input" name="name" placeholder="Login" value=""/>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input type="password" class="input" name="password" placeholder="Password" value=""/>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input type="submit" name="login" class="button is-primary" value="Login"/>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>
