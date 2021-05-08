@extends('layout')
@section('title', 'ニュース詳細')
@section('content')
<section id = comment>
  <div class="comment-in">
    <h3>{{ $article->title }}</h3>
    <p>{{ $article->text }}</p>
  </div>
</section>
@if ($errors->has('comment'))
    <div>
    {{$errors->first('comment')}}
    </div>
    @endif

<section id="comment-form">
  <form action="{{ route('comment') }}" method="POST" class="first_comment">
  @csrf
    <div class="text-form">
      <input type="hidden" name="article_id" value="{{ $article->id }}">
      <textarea class="textarea" type="text" name="comment" value=""></textarea>
      <input class="btn-submit" type="submit"  name="btn-submit" value="コメントを書く">
    </div>
  </form>
  @foreach($comments as $comment)
  @if($comment->article_id == $article->id)
  <form action="{{ route('delete',$comment->id) }}" method="POST" class="other_comment">
  @csrf
    <div class="text-form">
      <div class="textarea" name="comment">{{ $comment->comment }}</div>
      <input type="hidden"  name="delete" value="">
      <input class="btn-submit" type="submit" name="delete_send" value="コメントを消す">
    </div>
  </form>
  @endif
  @endforeach
</section>

@endsection
