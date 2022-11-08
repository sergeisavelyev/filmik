<?php

namespace application\controllers;

use application\core\Controller;

class SearchController extends Controller
{
    public function livesearchAction()
    {
        if (isset($_POST['data'])) {
            $input = $_POST['data'];
            $results = $this->model->getResults($input);
            foreach ($results as $res) {
                $title = $res['title'];
                $date = $res['date'];
                $img = $res['img'];
                $id = $res['id'];
?>
                <a href="<?php echo (PATH) . '/filmpage/' . $id  ?>">
                    <li class="list-group-item">
                        <div class="profile-films">
                            <img src="<?php echo $img ?>" alt="">
                            <h5 class="ms-2"><?php echo $title ?> (<?php echo $date ?>)</h5>
                        </div>
                    </li>
                </a>
<?php
            }
        }
    }

    public function resultsAction()
    {
        if (isset($_POST['input'])) {
            $input = $_POST['input'];
            $vars = [
                'results' => $this->model->getResults($input),
            ];
        }
        $this->view->render('Результаты поиска', $vars);
    }
}
