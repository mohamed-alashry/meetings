@extends('layouts.app')

@section('title', 'Users')
@section('content')
<section class="section-contct-body">
    <div class="container-fluid">
        @livewire('users.index')
        <div class="pe-0 d-none d-lg-flex">
            <img src="assets/img/Frame-end-footer.png" class="img-fluid position-fixed bottom-0 end-0 z-n1"
                alt="Frame-end-footer">
        </div>
    </div>

</section>
@endsection