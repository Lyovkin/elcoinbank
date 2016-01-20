@extends('layouts.app')

@section('title')
    Новости
@endsection

@section('css')
    <link href="/css/faq.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="container" style="padding-top: 170px">
        <div class="row">

            <div class="timeline-centered">

                @foreach($news as $new)
                <article class="timeline-entry">

                    <div class="timeline-entry-inner">

                        <div class="timeline-icon bg-secondary">
                            <i class="entypo-suitcase"></i>
                        </div>

                        <div class="timeline-label">
                            <h2><a href="#">{{ $new->title }}</a> <p class="">{{ $new->created_at->format('M d Y H:m:s') }}</p></h2>
                            <p>{{ $new->text }}</p>
                        </div>
                    </div>

                </article>
                @endforeach

            </div>
            <div class="text-center">{!! $news->render() !!}</div>

        </div>
    </div>
@endsection