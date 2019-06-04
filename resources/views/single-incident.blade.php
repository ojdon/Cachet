@extends('layout.master')

@section('title', array_get($incident->meta, 'seo.title', $incident->name).' | '.$siteTitle)

@section('description', array_get($incident->meta, 'seo.description', trans('cachet.meta.description.incident', ['name' => $incident->name, 'date' => $incident->occurred_at_formatted])))

@section('bodyClass', 'no-padding')

@section('outer-content')
@include('partials.nav')
@stop

@section('content')
<h1>{{ $incident->name }} <small>{{ $incident->occurred_at_formatted }}</small></h1>

<hr>

<div class="markdown-body">
    {!! $incident->formatted_message !!}
</div>

@if($incident->updates)
<div class="timeline">
    <div class="content-wrapper">
        @foreach ($incident->updates as $update)
        <div class="moment {{ $loop->first ? 'first' : null }}" id="update-{{ $update->id }}">
            <div class="row event clearfix">
                <div class="col-sm-1">
                    <div class="status-icon status-{{ $update->status }}" data-toggle="tooltip" title="{{ $update->human_status }}" data-placement="left">
                        <i class="{{ $update->icon }}"></i>
                    </div>
                </div>
                <div class="col-10 col-offset-2 col-sm-11 col-sm-offset-0">
                    <div class="card -message incident">
                        <div class="card-body">
                            @if($currentUser)
                            <div class="pull-right btn-group">
                                <a href="{{ cachet_route('dashboard.incidents.updates.edit', ['incident' => $incident, 'incident_update' => $update]) }}" class="btn btn-default">{{ trans('forms.edit') }}</a>
                            </div>
                            @endif
                            <div class="markdown-body">
                                {!! $update->formatted_message !!}
                            </div>
                        </div>
                        <div class="card-footer">
                            <small>
                                <span data-toggle="tooltip" title="
                                    {{ trans('cachet.incidents.posted_at', ['timestamp' => $update->created_at_formatted]) }}">
                                    {{ trans('cachet.incidents.posted', ['timestamp' => $update->created_at_diff]) }}
                                </span>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
@stop

@section('bottom-content')
@include('partials.footer')
@stop
