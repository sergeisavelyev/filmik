<?php

namespace application\models;

use application\core\Model;

class Search extends Model
{
    public function getResults($input)
    {
        $params = [
            'input' => $input . '%',
        ];
        return $this->db->row('SELECT fd.*, f.id, f.date, f.img FROM films_description fd JOIN films f ON fd.film_id = f.id WHERE title LIKE :input', $params);
    }
}
