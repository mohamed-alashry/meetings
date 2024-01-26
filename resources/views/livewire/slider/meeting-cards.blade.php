<div class="owl-carousel">
    @forelse ($meetings as $meeting)

    @switch($meeting->type_date)
    @case('today')
    <div class="col-12">
        <div class="card rounded-4 shadow border-0 mb-3 text-white" style="background-color: #5E1042;">
            <div class="card-header rounded-top-4">
                <h5 class="card-title fw-bold">{{ $meeting->title ?? '' }}</h5>
                <p class="card-text">{{ $meeting->room->name ?? '' }}</p>
            </div>
            <div class="card-body text-white">
                <p class="card-text m-1">
                    <small class="">
                        <i class="fa-regular fa-calendar-days"></i>
                        {{ Str::ucfirst($meeting->type_date) }},{{ $meeting->start_date ?? '' }}
                        {{ $meeting->start_time ?? '' }}
                    </small>
                </p>
                <p class="card-text m-1">
                    <small class="">
                        <i class="fa-regular fa-hourglass-half"></i>
                        Duration {{ $meeting->duration ?? 0 }}
                    </small>
                </p>
                <p class="card-text m-1">
                    <small class="">
                        <i class="fa-solid fa-users"></i>
                        Up to {{ $meeting->person_capacity ?? 0 }} Person
                    </small>
                </p>
            </div>
        </div>
    </div>
    @break

    @default
    @endswitch

    @empty
    @endforelse
</div>
