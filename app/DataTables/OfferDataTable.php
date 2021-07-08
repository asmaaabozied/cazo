<?php

namespace App\DataTables;

use App\Models\Offer;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Auth;

class OfferDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'offers.datatables_actions')
        ->rawColumns(['action', 'offer_id']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Offer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Offer $model)
    {
        if(Auth::user()->role_id == 3){
            $ids = [];
            foreach(Auth::user()->clinic->specializations as $specialization){
                array_push($ids, $specialization->id);
            }
            return $model->select('offers.*')->whereIn('specialization_id', $ids)->with('specialization', 'specialization.clinic');
        }
        return $model->select('offers.*')->with('specialization', 'specialization.clinic');
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
            'created_at'             => ['name' => 'created_at', 'data' => 'created_at', 'visible' => false],
            'Specialization'         => ['name' => 'specialization.name_en', 'data' => 'specialization.name_en', 'defaultContent' => ' '],
            'Specialization Clinic'  => ['name' => 'specialization.clinic.name_en', 'data' => 'specialization.clinic.name_en', 'defaultContent' => ' '],
            'offer_id',
            'offer_value',
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
