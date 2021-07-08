<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\BaseRepository;
use App\Helpers\FileUpload;
use Flash;
use App\Http\Resources\Category as CategoryResource;

/**
 * Class CategoryRepository
 * @package App\Repositories
 * @version June 8, 2020, 10:23 am UTC
*/

class CategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name_en',
        'name_ar',
        'active',
        'parent_id'
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
        return Category::class;
    }

    /**
     * create model record
     * 
     * @param array $input
     * 
     * @return Category
     */
    public function create($input){
        if(request()->hasFile('image')){
            $input['image'] = FileUpload::uploadFile('upload/Category', request()->file('image'), '-category-');
        }

        if(isset($input['parent_id'])){
            $input['home'] = 0;
        }

        $category = new Category();
        $category->fill($input)->save();

        return $category;
    }

    /**
     * Update model record for given id
     * 
     * @param array $input
     * @param int $id
     * 
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     *
     */
    public function update($input, $id){
        if(request()->hasFile('image')){
            $input['image'] = FileUpload::uploadFile('upload/Category', request()->file('image'), '-category-');
        }

        if(isset($input['parent_id'])){
            $input['home'] = 0;
        }

        $category = Category::findorFail($id);
        $category->fill($input)->save();

        return $category;
    }

    /**
     * @param int $id
     *
     * @throws \Exception
     *
     * @return bool|mixed|null
     */
    public function delete($id)
    {
        $query = $this->model->newQuery();

        if($query->where('parent_id', $id)->exists()) {
            Flash::error('This category contains subcategory already. Please remove them first');
            return false;
        }

        $query = $this->model->newQuery();

        $category = $query->findOrFail($id);

        return $category->delete();
    }

    /**
     * parent categories list
     */
    public function parentList($request){
        $categories = $this->model->latest()->where('parent_id', null)->where('active', 1);
        // dd($request->all);
        if($request->all == null){
            $categories = $categories->where('home', 1);
        }

        $categories = $categories->get();
        return CategoryResource::collection($categories);
    }

    /**
     *  subcategories list
     */
    public function subList($request){
        $categories = $this->model->latest()->where('parent_id', $request->category_id)->where('active', 1)->get();

        return CategoryResource::collection($categories);
    }
}
