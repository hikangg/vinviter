<div class="row event-block" data-id="{{ $event->id }}">
    <div class="small-10 columns">
        <div class="event-thumbnail float-left">
            <a href="{{ route('events.show', $event->id) }}"><img src="{{ url('images/small180/'.$event->mainImageFullPath) }}" alt=""></a>
        </div>
        <div class="event-content float-left">
            <h4><a href="{{ route('events.show', $event->id) }}">{{ $event->title }} <span class="user-event-relation">Admin{{ ($event->is_private) ? ', Private' : '' }}</span></a></h4>
            <div class="event-info">
                <div><span class="fa fa-calendar"></span>{{ $event->starts_at->format('l, d-m-Y') }}</div>
                @if($event->venuePage || $event->address || $event->zip_code)
                <div>
                    <span class="fa fa-location-arrow vat float-left"></span>
                    <div class="dib">
                        @if($event->venuePage)
                        <a target="_blank" href="{{ route('pages.show', $event->venuePage->slug) }}">{{ $event->venuePage->name }}</a><br>
                        @endif
                        @if($event->address)
                        {{ $event->address }}<br>
                        @endif
                        @if($event->zip_code)
                        {{ $event->zip_code }}<br>
                        @endif
                    </div>
                </div>
                @endif
                <div><span class="fa fa-map-marker"></span>{{ $event->city->name.', '.$event->country->name }}</div>
            </div>
            <div>
                <div class="attendance">Attended <span class="round-to-k" data-total="{{ $event->numberOfAttendees }}">{{ $event->numberOfAttendees }}</span></div>
            </div>
        </div>
    </div>
    <div class="small-2 columns actions">
        <a class="button hollow" href="{{ route('events.edit', $event->id) }}" target="_blank">Edit</a>
        <a data-open="remove-event-admin-{{ $event->id }}" class="button hollow">Remove</a>
    </div>
    <div class="reveal" id="remove-event-admin-{{ $event->id }}" data-reveal>
        <h4>Remove</h4>
        <p>Are you sure you want to remove yourself as admin from this event?</p>
        <p class="float-right remove-admin-buttons">
            <button type="button" class="button secondary" data-close>Cancel</button>
            <button type="button" class="button alert remove-event-admin-confirm" data-admin-id="{{ Auth::id() }}" data-id="{{ $event->id }}">Remove</button>
        </p>
        <button class="close-button" data-close aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>