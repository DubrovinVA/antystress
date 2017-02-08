<?php include ROOT . '/view/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <h3>Кабинет пользователя</h3>

                <h4>Здравствуйте, <?php echo $user['name'];?>!</h4>
                <ul>
                    <li><a href="/cabinet/edit">Редактировать данные</a></li>
                    <!--<li><a href="/cabinet/history">Список покупок</a></li>-->
                </ul>

            </div>
        </div>
    </section>

<?php include ROOT . '/view/layouts/footer.php'; ?>