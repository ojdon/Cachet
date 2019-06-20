@if($daysToShow > 0 && $allIncidents)
<div class="section-timeline">

    

    
    @foreach($allIncidents as $date => $incidents)
    <div class="card mb-2">
        @if($loop->first)
            <div class="card-header bg-secondary text-uppercase">
                <h5><i class="ion ion-time-restore"></i> {{ trans('cachet.incidents.past') }}</h5>
            </div>
        @endif
        <div class="card-body">
            @include('partials.incidents', [@compact($date), @compact($incidents)])
        </div>
    </div>
    
    @endforeach

</div>

<nav>
    <ul class="pager">
        @if($canPageBackward)
        <li class="previous">
            <a href="{{ cachet_route('status-page') }}?start_date={{ $previousDate }}" class="links">
                <span aria-hidden="true">&larr;</span> {{ trans('pagination.previous') }}
            </a>
        </li>
        @endif
        @if($canPageForward)
        <li class="next">
            <a href="{{ cachet_route('status-page') }}?start_date={{ $nextDate }}" class="links">
                {{ trans('pagination.next') }} <span aria-hidden="true">&rarr;</span>
            </a>
        </li>
        @endif
    </ul>
</nav>
@endif
