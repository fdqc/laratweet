@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                  @if (session('status'))
                    <div class="alert alert-success">
                      {{ session('status') }}
                    </div>
                  @endif
                  <form action="{{ route('comments/store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <textarea name="text" rows="2" cols="10" class="form-control" placeholder="What's going on {{ Auth::user()->name }}?"></textarea>
                    </div>
                    <div class="text-right">
                      <button type="submit" class="btn btn-primary">Comment</button>
                    </div>
                  </form>
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Feed</h3>
          </div>
          <div class="panel-body">
            @if (isset($last_comment))
            <ul class="media-list">
              <li class="media">
                <div class="media-body">
                  <h4 class="media-heading">Your last comment</h4>
                  {{ $last_comment->text }}
                </div>
              </li>
            </ul>
            @else
            <p>Make your first comment!</p>
            @endif
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
