@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Feed</h3>
          </div>
          <div class="panel-body">
            @if (isset($comments))
            <ul class="media-list">
              @foreach ($comments as $comment)
              <li class="media">
                <div class="media-body">
                  <h4 class="media-heading">{{ $comment->user->name }}</h4>
                  {{ $comment->text }}
                </div>
              </li><hr>
              @endforeach
            </ul>
            <div class="text-center">
              {{ $comments->links() }}
            </div>
            @else
            <p>Login and make your first comment!</p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
