<div class="content-wrapper">
    <div class="container-fluid">
        <?php if (empty($id)) : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Год</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Изображение</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($film_data as $film) : ?>
                        <tr id="<?php echo $film['id']; ?>">
                            <th scope="row"><?php echo $film['id']; ?></th>
                            <td><?php echo $film['title']; ?></td>
                            <td><?php echo $film['slug']; ?></td>
                            <td><?php echo $film['date']; ?></td>
                            <td><?php echo mb_strimwidth($film['content'], 0, 100, "..."); ?></td>
                            <td><?php echo $film['category_id']; ?></td>
                            <td><?php echo $film['img']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <div class="card mb-3">
                <div class="card-header"><?php echo $title; ?></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <?php foreach ($film_data as $film) : ?>
                                <form action="/admin/edit/<?php echo $film['id']; ?>">
                                    <div class="form-group mb-2">
                                        <label>Название</label>
                                        <input class="form-control" type="text" value="<?php echo htmlspecialchars($film['title'], ENT_QUOTES); ?>" name="name">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Slug</label>
                                        <input class="form-control" type="text" value="<?php echo htmlspecialchars($film['slug'], ENT_QUOTES); ?>" name="slug">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Год</label>
                                        <input class="form-control" type="text" value="<?php echo htmlspecialchars($film['date'], ENT_QUOTES); ?>" name="date">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Описание</label>
                                        <textarea class="form-control" rows="3" name="text"><?php echo htmlspecialchars($film['content'], ENT_QUOTES); ?></textarea>
                                    </div>

                                    <select class="form-select mb-2 mt-2" name="category">
                                        <option value="1" <?php if ($film['category_id'] == 1) :
                                                                echo 'selected';
                                                            endif; ?>>Фильмы</option>
                                        <option value="2" <?php if ($film['category_id'] == 2) :
                                                                echo 'selected';
                                                            endif; ?>>Сериалы</option>
                                        <option value="3" <?php if ($film['category_id'] == 3) :
                                                                echo 'selected';
                                                            endif; ?>>Документальные</option>
                                    </select>

                                    <div class="form-group mb-2">
                                        <label>Изображение</label>
                                        <input class="form-control" type="file" name="img">
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-block mt-2">Сохранить</button>
                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>