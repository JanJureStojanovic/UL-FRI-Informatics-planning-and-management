<header>
    <div class="header-container">
        <div class="site-title">
            <h1>The Champion’s Vault</h1>
        </div>
        <nav class="user-nav">
            <a href="<?= BASE_URL . 'mainPage/StrankaRegister' ?>">Register</a> 
            <a href="<?= BASE_URL . 'mainPage/strankaLogIn' ?>">Sign In</a>
        </nav>
    </div>
</header>

<style>
body {
    margin: 0;
    padding: 0;
    font-family: "Poppins", sans-serif;
}

.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 40px;
    background-color: #2C0052;
    color: #E0B3FF;
    width: 100%;
    box-sizing: border-box;  /* Ensures padding is included in width */
}

.site-title h1 {
    font-size: 3em;
    font-weight: 800;
    margin: 0;
    color: white;
}

.user-nav a {
    color: #E0B3FF;
    text-decoration: none;
    font-size: 1.2em;
    margin-left: 25px;
}

.user-nav a:hover {
    color: #FFFFFF;
}
</style>
