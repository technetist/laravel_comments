@extends('layouts.app')

@section('content')
    <div class="container">
        <div class='row'>
            <div class='col-sm-12'>
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <h4 class='text-center bg-danger'>{{ $error }}</h4>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 my-4">
                <h1 class="text-center">Product Comments</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 placeholder">
                <img src="http://placehold.it/700x250"
                     srcset="http://placehold.it/1000x400 1000w"
                     alt="Placeholder"
                />
            </div>
        </div>

        @if(Auth::check())
            @if($comments->isEmpty())
                <div class="row my-5">
                    <div class='col-sm-12'><h3 class='text-center'>No Comments Available</h3></div>
                </div>

            @else
                <div class="row my-5">
                    @foreach( $comments as $comment )
                        <div class="col-12 col-md my-2">
                            <div class="card text-center">
                                <div class="card-header text-left">
                                    @if($comment->user_id === Auth::id())
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                                            {{ method_field('DELETE') }}
                                            @csrf
                                            <input hidden name="comment_id" value="{{ $comment->id }}">
                                            <button class="close">&times;</button>
                                        </form>
                                    @endif
                                    {{  $comment->username }}
                                </div>
                                <div class="card-body">
                                    <p>{!! stripslashes(str_replace('\r\n',PHP_EOL,$comment->content)) !!}</p>
                                </div>
                                <div class="card-footer text-muted">
                                    <time class="timeago" datetime="{{ $comment->created_at }}">about ago</time>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="row my-4">
                <div class="col-sm-12">
                    <form role="form" action="{{ route('comments.store') }}" method="post" class="form">
                        @csrf
                        <input hidden value="{{ Auth::id() }}" name="user_id">
                        <div class="form-group">
                                    <textarea id="comment_form"
                                              name="content"
                                              class="form-control form-control-sm"
                                              rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit"
                                    class="btn btn-primary btn-block">Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="row my-5">
                <div class="col-sm-12">
                    <h3 class="text-center">Please log in to see comments</h3>
                </div>
            </div>
        @endif
    </div>

@endsection