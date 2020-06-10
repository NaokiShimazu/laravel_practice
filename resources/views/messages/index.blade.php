@extends('layouts.default')

@section('title', $title)

@section('content')

<h1>{{ $title }}</h1>

@foreach($errors->all() as $error)
<p class="error">{{ $error }}</p>
@endforeach

<form method="post" action="{{ url("/messages") }}" enctype="multipart/form-data">
{{ csrf_field() }}
    <div>
    <label>
        名前:
        <input type="text" name="name" class="name_field" placeholder="お名前を入力">
    </label>
    </div>

    <div>
    <label>
        コメント:
        <input type="text" name="body" class="comment_field" placeholder="コメントを入力">
    </label>
    </div>

    <div>
        <label>
            画像:
            <input type="file" name="image">
        </label>
    </div>

    <div>
    <input type="submit" value="投稿">
    </div>
</form>

<ul>
        @forelse($messages as $message)
            <li class="message">
                <div class="message__image">
                    @if($message->image !== '')
                        <img src="{{ asset('storage/photos/' . $message->image) }}">
                    @else
                        <img src="/images/no_image.png">
                    @endif
                </div>
                <div class="message__text">
                    <div class="message__text__name">
                        投稿者: {{ $message->name }}
                    </div>
                    <div class="message__text__body">
                        {{ $message->body }}
                    </div>
                    <div class="message__text__created_at">
                        投稿日時: {{ $message->created_at }}
                    </div>
                    <form method="post" action="{{ url('/messages/' . $message->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('delete')}}
                        <input type="hidden" name="message_id" value="{{ $message->id }}">
                        <input type="submit" value="削除">
                    </form>
                </div>
            </li>
        @empty
            <li>メッセージはありません。</li>
        @endforelse
</ul>
    @endsection
