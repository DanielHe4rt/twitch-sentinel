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
                    <tr>
                        <td>2217823</td>
                        <td>danielhe4rt</td>
                        <td><span class="badge bg-success">Yes</span></td>
                        <td>12k</td>
                        <td>34%</td>
                        <td>
                            <button class="btn btn-primary btn-sm">
                                See Messages
                            </button>
                            <button class="btn btn-danger btn-sm">
                                Delete Streamer
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>123456</td>
                        <td>kalanedev</td>
                        <td><span class="badge bg-danger">No</span></td>
                        <td>15</td>
                        <td>100%</td>
                        <td>
                            <button class="btn btn-primary btn-sm">
                                See Messages
                            </button>
                            <button class="btn btn-danger btn-sm">
                                Delete Streamer
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
