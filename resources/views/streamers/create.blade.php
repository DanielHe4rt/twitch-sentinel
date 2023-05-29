@extends('template.app')

@section('content')
    <div class="card mb-3">
        <div class="card-header">Streamers Section</div>
        <div class="card-body">
            <h4 class="card-title text-center">Create a New Streamer</h4>

            <form action="{{ route('streamers.post') }}" method="post">
                @csrf
                <fieldset>
                    <legend>Fill your streamer data</legend>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Streamer ID</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="123456" name="streamer_id">
                        <small id="emailHelp" class="form-text text-muted">This need to be the exact name for the twitch channel</small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Streamer Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="kalanedev" name="streamer_username">
                        <small id="emailHelp" class="form-text text-muted">This need to be the exact name for the twitch channel</small>
                    </div>


                </fieldset>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
        </div>
    </div>
@endsection
