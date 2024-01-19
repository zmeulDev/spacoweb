@extends('layouts.admin')
@section('content')
@can('vehicle_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.vehicles.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.vehicle.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.vehicle.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Vehicle">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.model') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.vin') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.plates') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.odometer') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.manufacter_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.purchase_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.owner') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.insurance') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.inspection') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.user') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Vehicle::TYPE_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Vehicle::OWNER_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($users as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehicles as $key => $vehicle)
                        <tr data-entry-id="{{ $vehicle->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $vehicle->id ?? '' }}
                            </td>
                            <td>
                                {{ $vehicle->name ?? '' }}
                            </td>
                            <td>
                                {{ $vehicle->model ?? '' }}
                            </td>
                            <td>
                                {{ $vehicle->vin ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Vehicle::TYPE_SELECT[$vehicle->type] ?? '' }}
                            </td>
                            <td>
                                {{ $vehicle->plates ?? '' }}
                            </td>
                            <td>
                                {{ $vehicle->odometer ?? '' }}
                            </td>
                            <td>
                                {{ $vehicle->manufacter_date ?? '' }}
                            </td>
                            <td>
                                {{ $vehicle->purchase_date ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Vehicle::OWNER_SELECT[$vehicle->owner] ?? '' }}
                            </td>
                            <td>
                                {{ $vehicle->insurance ?? '' }}
                            </td>
                            <td>
                                {{ $vehicle->inspection ?? '' }}
                            </td>
                            <td>
                                {{ $vehicle->user->name ?? '' }}
                            </td>
                            <td>
                                @can('vehicle_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.vehicles.show', $vehicle->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('vehicle_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.vehicles.edit', $vehicle->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('vehicle_delete')
                                    <form action="{{ route('admin.vehicles.destroy', $vehicle->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('vehicle_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.vehicles.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-Vehicle:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection