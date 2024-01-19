@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.vehicle.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.vehicles.update", [$vehicle->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.vehicle.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $vehicle->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="model">{{ trans('cruds.vehicle.fields.model') }}</label>
                <input class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" type="text" name="model" id="model" value="{{ old('model', $vehicle->model) }}">
                @if($errors->has('model'))
                    <span class="text-danger">{{ $errors->first('model') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.model_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vin">{{ trans('cruds.vehicle.fields.vin') }}</label>
                <input class="form-control {{ $errors->has('vin') ? 'is-invalid' : '' }}" type="text" name="vin" id="vin" value="{{ old('vin', $vehicle->vin) }}">
                @if($errors->has('vin'))
                    <span class="text-danger">{{ $errors->first('vin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.vin_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.vehicle.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Vehicle::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $vehicle->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="plates">{{ trans('cruds.vehicle.fields.plates') }}</label>
                <input class="form-control {{ $errors->has('plates') ? 'is-invalid' : '' }}" type="text" name="plates" id="plates" value="{{ old('plates', $vehicle->plates) }}" required>
                @if($errors->has('plates'))
                    <span class="text-danger">{{ $errors->first('plates') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.plates_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="odometer">{{ trans('cruds.vehicle.fields.odometer') }}</label>
                <input class="form-control {{ $errors->has('odometer') ? 'is-invalid' : '' }}" type="number" name="odometer" id="odometer" value="{{ old('odometer', $vehicle->odometer) }}" step="1">
                @if($errors->has('odometer'))
                    <span class="text-danger">{{ $errors->first('odometer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.odometer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="manufacter_date">{{ trans('cruds.vehicle.fields.manufacter_date') }}</label>
                <input class="form-control date {{ $errors->has('manufacter_date') ? 'is-invalid' : '' }}" type="text" name="manufacter_date" id="manufacter_date" value="{{ old('manufacter_date', $vehicle->manufacter_date) }}">
                @if($errors->has('manufacter_date'))
                    <span class="text-danger">{{ $errors->first('manufacter_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.manufacter_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="purchase_date">{{ trans('cruds.vehicle.fields.purchase_date') }}</label>
                <input class="form-control date {{ $errors->has('purchase_date') ? 'is-invalid' : '' }}" type="text" name="purchase_date" id="purchase_date" value="{{ old('purchase_date', $vehicle->purchase_date) }}">
                @if($errors->has('purchase_date'))
                    <span class="text-danger">{{ $errors->first('purchase_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.purchase_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.vehicle.fields.owner') }}</label>
                <select class="form-control {{ $errors->has('owner') ? 'is-invalid' : '' }}" name="owner" id="owner">
                    <option value disabled {{ old('owner', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Vehicle::OWNER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('owner', $vehicle->owner) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('owner'))
                    <span class="text-danger">{{ $errors->first('owner') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.owner_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="insurance">{{ trans('cruds.vehicle.fields.insurance') }}</label>
                <input class="form-control date {{ $errors->has('insurance') ? 'is-invalid' : '' }}" type="text" name="insurance" id="insurance" value="{{ old('insurance', $vehicle->insurance) }}">
                @if($errors->has('insurance'))
                    <span class="text-danger">{{ $errors->first('insurance') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.insurance_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="inspection">{{ trans('cruds.vehicle.fields.inspection') }}</label>
                <input class="form-control date {{ $errors->has('inspection') ? 'is-invalid' : '' }}" type="text" name="inspection" id="inspection" value="{{ old('inspection', $vehicle->inspection) }}">
                @if($errors->has('inspection'))
                    <span class="text-danger">{{ $errors->first('inspection') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.inspection_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.vehicle.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $vehicle->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection