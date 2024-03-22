@extends('layout.master')
<div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
</div>
@section('content')
@foreach ($post as $p)
{{$p->title}}
@endforeach
@endsection
