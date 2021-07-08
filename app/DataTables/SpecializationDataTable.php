<?php

namespace App\DataTables;

use App\Models\Specialization;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Auth;

class SpecializationDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'specializations.datatables_actions')->editColumn('active', 'badge')
        ->rawColumns(['active', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Specialization $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Specialization $model)
    {
        if(Auth::user()->role_id == 3){
            return $model->select('specializations.*')->where('clinic_id', Auth::user()->clinic->id)->with('category', 'clinic');
        }
        return $model->select('specializations.*')->with('category', 'clinic');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                // 'dom'       => 'Bfrtip',
                'stateSave' => false,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'created_at'               => ['name' => 'created_at', 'data' => 'created_at', 'visible' => false],
            'Clinic'                   => ['name' => 'clinic.name_en', 'data' => 'clinic.name_en', 'defaultContent' => ' '],
            'English Name'             => ['name' => 'name_en', 'data' => 'name_en'],
            'Category'                 => ['name' => 'category.name_en', 'data' => 'category.name_en', 'defaultContent' => ' '],
            'Fee'                      => ['name' => 'fee', 'data' => 'fee'],
            'Status'                   => ['name' => 'active', 'data' => 'active']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return '$MODEL_NAME_PLURAL_SNAKE_$datatable_' . time();
    }
}
