<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
           data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item">
                Home
            </a>

            <a class="navbar-item">
                Documentation
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Administrator
                </a>

                <div class="navbar-dropdown">
                    <a href="/items/add" class="navbar-item">
                        Add new Item
                    </a>
                    <a href="/categories/add" class="navbar-item">
                        Add new Category
                    </a>

                    <hr class="navbar-divider">
                    <a class="navbar-item">
                        Settings
                    </a>
                </div>
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a href="/user/register" class="button is-primary">
                        <strong>Sign up</strong>
                    </a>
                    <a href="/user/login" class="button is-light">
                        Log in
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>