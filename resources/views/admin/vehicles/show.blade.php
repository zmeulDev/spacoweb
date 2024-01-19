@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.vehicle.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vehicles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.id') }}
                        </th>
                        <td>
                            {{ $vehicle->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.name') }}
                        </th>
                        <td>
                            {{ $vehicle->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.model') }}
                        </th>
                        <td>
                            {{ $vehicle->model }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.vin') }}
                        </th>
                        <td>
                            {{ $vehicle->vin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Vehicle::TYPE_SELECT[$vehicle->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.plates') }}
                        </th>
                        <td>
                            {{ $vehicle->plates }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.odometer') }}
                        </th>
                        <td>
                            {{ $vehicle->odometer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.manufacter_date') }}
                        </th>
                        <td>
                            {{ $vehicle->manufacter_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.purchase_date') }}
                        </th>
                        <td>
                            {{ $vehicle->purchase_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.owner') }}
                        </th>
                        <td>
                            {{ App\Models\Vehicle::OWNER_SELECT[$vehicle->owner] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.insurance') }}
                        </th>
                        <td>
                            {{ $vehicle->insurance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.inspection') }}
                        </th>
                        <td>
                            {{ $vehicle->inspection }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.user') }}
                        </th>
                        <td>
                            {{ $vehicle->user->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vehicles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#vehicle_contracts" role="tab" data-toggle="tab">
                {{ trans('cruds.contract.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#vehicle_tasks" role="tab" data-toggle="tab">
                {{ trans('cruds.task.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="vehicle_contracts">
            @includeIf('admin.vehicles.relationships.vehicleContracts', ['contracts' => $vehicle->vehicleContracts])
        </div>
        <div class="tab-pane" role="tabpanel" id="vehicle_tasks">
            @includeIf('admin.vehicles.relationships.vehicleTasks', ['tasks' => $vehicle->vehicleTasks])
        </div>
    </div>
</div>

@endsection