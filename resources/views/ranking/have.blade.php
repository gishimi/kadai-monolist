@extends('layouts.app')

@section('content')
    <h1>haveランキング</h1>
    @include('items.haveitems', ['items' => $items])
@endsection