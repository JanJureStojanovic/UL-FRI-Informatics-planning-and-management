<footer>
    <h1></h1>
    <div class="footer-container">
        <p>&copy; 2024 The Champion’s Vault</p>
        <nav class="admin-vendor-nav">
            <a href="<?= BASE_URL . 'mainPage/adminLogIn' ?>">Admin Dashboard</a>
            <a href="<?= BASE_URL . 'mainPage/prodajalecLogIn' ?>">Vendor Dashboard</a>
        </nav>
    </div>
</footer>

<style>
.footer-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 40px;
    background-color: #2C0052;
    color: #D8BFD8;
}

.admin-vendor-nav a {
    color: #D8BFD8;
    text-decoration: none;
    font-size: 1.1em;
    margin-left: 20px;
}

.admin-vendor-nav a:hover {
    color: #FFFFFF;
}
</style>
