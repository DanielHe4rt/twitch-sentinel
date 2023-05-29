@extends('template.app')

@section('content')
    <div class="card mb-3">
        <div class="card-header">Streamers Section</div>
        <div class="card-body">
            <h4 class="card-title text-center">Welcome to the Twitch Sentinel</h4>
            <div class="card-text text-center">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>Streamer ID</td>
                        <td>Streamer Name</td>
                        <td>Is Online</td>
                        <td>Messages Count</td>
                        <td>Mature Content</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($streamers as $streamer)
                    <tr>
                        <td>{{ $streamer->streamer_id }}</td>
                        <td>{{ $streamer->streamer_username }}</td>
                        <td><span class="badge bg-success">Yes</span></td>
                        <td>{{ $streamer->getMessagesCount() }}</td>
                        <td>{{ 0 }}%</td>
                        <td>
                            <button class="btn btn-primary btn-sm">
                                See Messages
                            </button>
                            <button class="btn btn-danger btn-sm">
                                Delete Streamer
                            </button>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
