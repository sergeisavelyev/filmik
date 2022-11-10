<div class="col-lg-8 col-sm mt-3">
    <div class="row">
        <div class="col-sm col-lg-5 mx-3">
            <h2>Авторизация</h2>
            <hr>
            <form action="/authorization/login" class="account" method="post" class="p-3">
                <div class="form-group mb-3">
                    <div class="row justify-content-start">
                        <label class="col-2">Логин</label>
                        <div class="col-6">
                            <input type="text" class="form-control" name="login">
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <div class="row justify-content-start">
                        <label class="col-2">Пароль</label>
                        <div class="col-6">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="d-grid gap-2 col-6">
                        <button type="submit" class="btn btn-dark">Вход</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm col-lg-5 mx-3">
            <h2>Еще не зарегистрированы?</h2>
            <hr>
            <div class="row p-3">
                <div class="mb-2"><i class="fa-regular fa-comments mx-1"></i>Оставляйте комментарии</div>
                <div class="mb-2"><i class="fa-solid fa-list-ul mx-1"></i>Составляйте списки просмотра</div>
                <div class="mb-4"><i class="fa-regular fa-heart mx-1"></i>Подпишитесь, чтобы получать новинки</div>
                <button type="submit" class="btn btn-dark"><a href="/authorization/registration">Регистрация за 30 секунд</a></button>
            </div>
        </div>
    </div>
</div>