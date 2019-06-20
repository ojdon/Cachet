@extends('layout.master')

@section('title',  trans('cachet.subscriber.subscribe'). " | ". $siteTitle)

@section('description', trans('cachet.meta.description.subscribe', ['app' => $siteTitle]))

@section('content')
<div class="float-right">
    <p><a class="btn btn-success btn-outline" href="{{ cachet_route('status-page') }}"><i class="ion ion-home"></i></a></p>
</div>

<div class="clearfix"></div>

@include('partials.errors')

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card -default">
            <div class="card-heading">{{ trans('cachet.subscriber.subscribe') }}</div>
            <div class="card-body">
                <form action="{{ cachet_route('subscribe', [], 'post') }}" method="POST" class="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="email@example.com">
                    </div>
                    <button type="submit" class="btn btn-success">{{ trans('cachet.subscriber.button') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
