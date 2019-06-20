@if($appFooter)
{!! $appFooter !!}
@else
<footer class="footer container">
    <div class="text-center">
                @if($showSupport)
                <p>
                    {!! trans('cachet.powered_by') !!}
                    @if($showTimezone)
                    {{ trans('cachet.timezone', ['timezone' => $timezone]) }}
                    @endif
                </p>
                @endif
         
                <ul class="list-inline text-center mx-auto my-3">
                    @if($currentUser || $dashboardLink)
                    <li class="list-inline-item">
                        <a class="btn btn-link" href="{{ cachet_route('dashboard') }}">{{ trans('dashboard.dashboard') }}</a>
                    </li>
                    @endif
                    @if($currentUser)
                    <li class="list-inline-item">
                        <a class="btn btn-link" href="{{ cachet_route('auth.logout') }}">{{ trans('dashboard.logout') }}</a>
                    </li>
                    @endif
                    @if($enableSubscribers)
                    <li class="list-inline-item">
                        <a class="btn btn-success btn-outline" href="{{ cachet_route('subscribe') }}">{{ trans('cachet.subscriber.button') }}</a>
                    </li>
                    @endif
                </ul>
         
    </div>
</footer>
@endif

@include("partials.analytics")
