@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.property.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.properties.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.property.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.property.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.property.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.property.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.property.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Property::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', 'Select') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.property.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rooms">{{ trans('cruds.property.fields.rooms') }}</label>
                <input class="form-control {{ $errors->has('rooms') ? 'is-invalid' : '' }}" type="number" name="rooms" id="rooms" value="{{ old('rooms', '') }}" step="1">
                @if($errors->has('rooms'))
                    <span class="text-danger">{{ $errors->first('rooms') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.property.fields.rooms_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bathrooms">{{ trans('cruds.property.fields.bathrooms') }}</label>
                <input class="form-control {{ $errors->has('bathrooms') ? 'is-invalid' : '' }}" type="number" name="bathrooms" id="bathrooms" value="{{ old('bathrooms', '') }}" step="1">
                @if($errors->has('bathrooms'))
                    <span class="text-danger">{{ $errors->first('bathrooms') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.property.fields.bathrooms_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.property.fields.parking') }}</label>
                <select class="form-control {{ $errors->has('parking') ? 'is-invalid' : '' }}" name="parking" id="parking">
                    <option value disabled {{ old('parking', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Property::PARKING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('parking', 'Select') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('parking'))
                    <span class="text-danger">{{ $errors->first('parking') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.property.fields.parking_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.property.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.property.fields.user_helper') }}</span>
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