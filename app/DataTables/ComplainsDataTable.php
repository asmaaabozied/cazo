<?php

namespace App\DataTables;

use App\Models\Complains;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ComplainsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'complains.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Complains $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Complains $model)
    {
        // dd($model->select('complains.*')->with(['ComplainType', 'client'])->get()->toArray());
        return $model->select('complains.*')->with('type')->with('client');
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
            'created_at' => ['name' => 'created_at'  , 'data' => 'created_at'  , 'visible' => false],
            'Type'       => ['name' => 'type.name_en', 'data' => 'type.name_en', 'defaultContent' => ' '],
            'Client'     => ['name' => 'client.name' , 'data' => 'client.name' , 'defaultContent' => ' ']
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
