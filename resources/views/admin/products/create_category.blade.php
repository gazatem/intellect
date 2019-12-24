@extends('layouts.backend')

@section('title', app_name() . ' | ' . __('labels.products.category_management'))

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-body">

                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            {{  __('labels.products.category_management') }}
                        </h4>
                    </div>
                    <!--col-->

                    <div class="col-sm-7">
                        <div class="btn-toolbar float-right" role="toolbar" aria-label="">
                        <a href="{{ route('admin.products.view_categories', $product->id) }}"
                                class="btn btn-success btn-sm m-1" data-toggle="tooltip"
                                title="List the categories"><i class="fas fa-list"></i></a>
                                
                            <a href="{{ route('admin.products.create_category', $product->id) }}"
                                class="btn btn-success btn-sm m-1" data-toggle="tooltip"
                                title="Add Product to a Category"><i class="fas fa-plus"></i></a>

                            <a href="{{ route('admin.products.view', $product->id) }}" class="btn btn-info btn-sm m-1"
                                data-toggle="tooltip" title="Back to product"><i
                                    class="fas fa-arrow-alt-circle-left"></i></a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5"><b>SKU</b></div>
                    <div class="col-sm-7">{{ $product->sku }}</div>
                </div>
                <div class="row">
                    <div class="col-sm-5"><b>Name</b></div>
                    <div class="col-sm-7">{{ $product->name }}</div>
                </div>
                <div class="row">
                    <div class="col-sm-5"><b>Description</b></div>
                    <div class="col-sm-7">{{ $product->description }}</div>
                </div>
                <br />


                <form autocomplete="off" role="form"
                    action="{{ route('admin.products.create_category.store', $product->id) }}" method="post">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                    <div class="form-group row {!! $errors->first('category_id', 'has-warning') !!}">
                        <label for="name"
                            class="col-sm-3 col-form-label">{{ trans('labels.products.categories.all') }}</label>
                        <div class="col-sm-9">
                            {{ Form::select('category_id', $categories, null, ['class'=>'form-control col-sm-5 categories']) }}
                            {!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md mb-4 float-right">
                        <i class="fas fa-save align-middle"></i> <span
                            class="align-middle"><strong>{{__('labels.general.buttons.save')}}</strong></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css" />
@parent
@stop
@section('scripts')
@parent

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js">
</script>

<script type="text/javascript">
$(function() {
    $('.categories').select2({
        placeholder: 'Select an category'
    });
});
</script>

@stop