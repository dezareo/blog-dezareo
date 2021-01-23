@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} | {{ __('You are logged in!') }}</div>

                <div class="card-body">
                    <a href="/posts/create" class="btn btn-primary mt-2 mb-3">Create Post</a>
                    <h3>Your Blog Posts</h3>
                    @if(count($posts) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td><a href="/posts/{{ $post->id }}/edit" class="btn btn-outline-success btn-sm pull-right">Edit</a></td>
                            <td>
                                {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'ml-auto']) !!}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm pull-right']) }}
                            {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                        <p>You have no posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
