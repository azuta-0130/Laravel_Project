
@extends('layout')
@section('title', 'ニュース一覧')
@section('content')
  <section id="news">
    <h2>さぁ、最新のニュースをシェアしましょう</h2>
    @if (session('err_msg')) 
     <p>
     {{session('err_msg')}}
     </p>
     @endif
     @if ($errors->has('title'))
     <div>
     {{$errors->first('title')}}
     </div>
    @endif
    @if ($errors->has('text'))
    <div>
    {{$errors->first('text')}}
    </div>
    @endif
    <form action="{{ route('store') }}" method="POST" name="form">
    @csrf
      タイトル：<input class="title" type="text" name="title" value=""><br>
      <span>記事：</span><input class="text" type="text" name="text" value=""><br>
      <button type="submit" name="send_news" onclick="MoveCheck();" value="投稿">投稿</button>
    </form>
  </section>
    @foreach($articles as $article)
  <section id="comment">
    <div class="comment-in">
      <h3>{{ $article->title  }}</h3>
      <p>{{ $article->text  }}</p>
      <p><a href="/article/{{ $article->id }}">記事全文・コメントを見る</a></p>
    </div>
  </section>
    @endforeach
@endsection