<div>
    <div class="container-fluid">
        <div class="card mb-3 background-primary border-0">
            <div class="card-body background-primary text-light shadow-lg rounded-4">
                <h5 class="card-title">Find a Meeting Room</h5>
                <p class="card-text">Find and Book Now</p>
                {{-- filters --}}
                <div class="row w-100 d-flex justify-content-center">

                    <div class="input-form-login col-lg col-md-12 col-sm-12">
                        {{-- <i class="fa fa-calendar-days fa-lg icon mt-3 text-dark"></i> --}}
                        <input class="input-field form-control my-2 px-5 py-2 rounded-4 shadow-sm" type="date"
                            wire:model.live="start_date" min="{{ date('Y-m-d') }}">
                        @error('start_date')
                            <b class="text-danger">{{ $message }}</b>
                        @enderror
                    </div>
                    <div class="input-form-login col-lg col-md-12 col-sm-12">
                        {{-- <i class="fa fa-clock fa-lg icon mt-3 text-dark"></i> --}}
                        {{-- <input class="input-field form-control my-2 px-5 py-2 rounded-4 shadow-sm"
                            type="time" wire:model.live="start_time" min="{{ date('H:i') }}"> --}}

                        <select class="input-field form-control my-2 px-5 py-2 rounded-4 shadow-sm"
                            wire:model.live="start_time">
                            <option value="">Start Time</option>
                            @foreach ($times as $key => $time)
                                <option value="{{ $key }}">{{ $time }}</option>
                            @endforeach

                        </select>
                        @error('start_time')
                            <b class="text-danger">{{ $message }}</b>
                        @enderror
                    </div>

                    <div class="input-form-login col-lg col-md-12 col-sm-12">
                        {{-- <i class="fa fa-clock fa-lg icon mt-3 text-dark"></i> --}}
                        {{-- <input class="input-field form-control my-2 px-5 py-2 rounded-4 shadow-sm"
                            type="time" wire:model.live="start_time" min="{{ date('H:i') }}"> --}}

                        <select class="input-field form-control my-2 px-5 py-2 rounded-4 shadow-sm"
                            wire:model.live="end_time">
                            <option value="">End Time</option>
                            @foreach ($times as $key => $time)
                                <option value="{{ $key }}">{{ $time }}</option>
                            @endforeach

                        </select>
                        @error('end_time')
                            <b class="text-danger">{{ $message }}</b>
                        @enderror
                    </div>

                    <div class="input-form-login col-lg col-md-12 col-sm-12">
                        {{-- <i class="fa fa-repeat fa-lg icon mt-3 text-dark"></i> --}}
                        <select class="input-field form-control my-2 px-5 py-2 rounded-4 shadow-sm"
                            wire:model="repeatable">
                            <option value="1">No Repeat</option>
                            <option value="2">Daily</option>
                            <option value="3">Weekly</option>
                            <option value="4">Monthly</option>
                        </select>
                        @error('repeatable')
                            <b class="text-danger">{{ $message }}</b>
                        @enderror
                    </div>

                </div>
                {{-- end filters --}}
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <h5 class="card-title">Available Meeting Rooms</h5>
        <p class="card-text">Find Available Rooms Now</p>
        <div>
            @livewire('slider.room-cards')
            {{-- <livewire:slider.room-cards :rooms="$rooms" wire:updateRooms="$refresh"> --}}
        </div>
    </div>
</div>
