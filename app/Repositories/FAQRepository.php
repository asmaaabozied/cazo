<?php

namespace App\Repositories;

use App\Models\FAQ;
use App\Repositories\BaseRepository;
use App\Http\Resources\FAQ as FAQResource;

/**
 * Class FAQRepository
 * @package App\Repositories
 * @version June 18, 2020, 9:40 am UTC
*/

class FAQRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'question_en',
        'question_ar',
        'answer_en',
        'answer_ar'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FAQ::class;
    }

    /**
     * get all questions and answer
     */
    public function getAll(){
        $faqs = $this->model->latest()->get();

        return FAQResource::collection($faqs);
    }
}
