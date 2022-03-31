@extends('layouts.web')

@section('content')
    <profile nickname="{{ $nickname }}" user="{{ $user }}"></profile>
@endsection