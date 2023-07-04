@extends('template.app')

@section('content')
    <div class="card mb-3">
        <div class="card-header">Streamers Section</div>
        <div class="card-body">
            <h4 class="card-title text-center">Create a New Streamer</h4>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Sent At</td>
                        <td>Chatter</td>
                        <td>Message</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                    <tr>
                        <td>{{ $message->sent_at->format('Y-m-d H:i:s') }}</td>
                        <td>{{ $message->chatter_username }}</td>
                        <td>{{ $message->chatter_message }}</td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $messages->links() }}
        </div>
    </div>
@endsection
