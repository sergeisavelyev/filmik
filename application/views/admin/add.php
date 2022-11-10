<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/add" class="admin-add" method="post">
                            <div class="form-group mb-2">
                                <label>Название</label>
                                <input class="form-control" type="text" name="title">
                            </div>
                            <div class="form-group mb-2">
                                <label>Slug</label>
                                <input class="form-control" type="text" name="slug">
                            </div>
                            <div class="form-group mb-2">
                                <label>Год</label>
                                <input class="form-control" type="text" name="date">
                            </div>
                            <div class="form-group mb-2">
                                <label>Описание</label>
                                <textarea class="form-control" rows="3" name="text"></textarea>
                            </div>
                            <select class="form-select mb-2 mt-2" name="category" aria-label="Пример выбора по умолчанию">
                                <option value="">Выберите категорию</option>
                                <option value="1">Фильмы</option>
                                <option value="2">Сериалы</option>
                                <option value="3">Документальные</option>
                            </select>
                            <div class="form-group mb-2">
                                <label>Изображение</label>
                                <input class="form-control" type="file" name="img">
                            </div>
                            <button type="submit" class="btn btn-dark btn-block mt-2">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>