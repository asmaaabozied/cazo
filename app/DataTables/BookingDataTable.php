<?php

namespace App\DataTables;

use App\Models\Booking;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Auth;

class BookingDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'bookings.datatables_actions')->editColumn('created_at', function ($contact){
            return date('d-m-Y H:i', strtotime($contact->created_at) );
        })->editColumn('hour', function ($contact){
            return date('H:i', strtotime($contact->hour) );
        })->editColumn('status', 'booking_status')->rawColumns(['action', 'status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Booking $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Booking $model)
    {
        if(Auth::user()->role_id == 3){
            return $model->select('bookings.*')->whereIn('specialization_id', Auth::user()->clinic ? Auth::user()->clinic->specializationsIds() : [])->with('specialization', 'user');
        }
        return $model->select('bookings.*')->with('specialization', 'user');
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
            'created_at'          => ['name' => 'created_at', 'data' => 'created_at'],
            'User'                => ['name' => 'user.name', 'data' => 'user.name', 'defaultContent' => ' '],
            'Specialization'      => ['name' => 'specialization.name_en', 'data' => 'specialization.name_en', 'defaultContent' => ' '],
            'day',
            'hour',
            'status',
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
