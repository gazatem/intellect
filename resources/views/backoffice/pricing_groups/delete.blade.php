@extends('adminlte::page')

@section('title', app_name() . ' | ' . __('labels.groups.management'))


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> {{  __('labels.groups.management') }}</h4>
            </div>
            <div class="card-body">


                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-toolbar float-right" role="toolbar" aria-label="">
                            <a href="{{ route('backoffice.groups.create') }}" class="btn btn-success btn-xs m-1"
                                data-toggle="tooltip" title="Create a group"><i class="fas fa-plus"></i></a>
                            <a href="{{ route('backoffice.groups.index') }}" class="btn btn-success btn-xs m-1"
                                data-toggle="tooltip" title="List the groups"><i class="fas fa-list"></i></a>
                        </div>
                    </div>
                </div>

                <form autocomplete="off" role="form" action="{{ route('backoffice.groups.destroy', $group->id) }}"
                    method="post">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                    <div class="form-group {!! $errors->first('name', 'has-warning') !!}">
                        <label for="name">{{ trans('labels.groups.name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" autocomplete="off"
                            value="{{{ old('name', isset($group) ? $group->name : null) }}}" readonly> {!!
                        $errors->first('name', '<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        <p>{{ trans_choice('labels.groups.pricing_count_definitions', $group->pricings()->count()) }}</p>
                        <p>{{ trans_choice('labels.groups.stocks_count_definitions', $group->stocks()->count()) }}</p>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md mb-4 float-right">
                    <i class="fas fa-trash align-middle"></i> <span
                            class="align-middle"><strong>{{__('labels.general.buttons.delete')}}</strong></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection