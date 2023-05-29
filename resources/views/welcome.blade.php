@extends('template.app')

@section('content')
    <div class="card mb-3">
        <div class="card-header">Home</div>
        <div class="card-body">
            <h4 class="card-title text-center">Welcome to the Twitch Sentinel</h4>
            <div class="card-text text-center">
                This app serves as a log bucket from Twitch Channels.<br><br>

                Powered by:
                <div class="d-flex justify-content-center">
                    <img class="img-thumbnail" width="250"
                         src="https://www.scylladb.com/wp-content/uploads/logo-scylla-horizontal-RGB.svg"
                         alt="">
                    <img class="img-thumbnail" width="250" src="https://laravel.com/img/logotype.min.svg"
                         alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
