</div>
</main>

<script src="<?php HTTP_ROOT ?>/master/base.js"></script>

<?php
if (isset($params['script_path'])) {
    echo "<script src='" . $params['script_path'] . "'></script>";
}
?>


<script>
    console.log(getCart());
</script>

<footer class="footer">
    <div class="wr960">
        <div class="footer-links">
            <a href="/about/" class="footer-link">Услуги</a>
            <a href="/about/" class="footer-link">Условия сотридничества</a>
            <a href="/about/" class="footer-link">Лицензия</a>
            <a href="/about/" class="footer-link">О нас</a>
            <a href="/faq/" class="footer-link">F.A.Q</a>
            <a href="/contacts/" class="footer-link">Контакты</a>
        </div>
        <span class="copyright">© 2019 команда «Римма и Веберы». Права не защищены. Сайт является сугубо учебным макетом и не осуществляет реальной коммерческой деятельности.</span>
    </div>
</footer>


</body>
</html>