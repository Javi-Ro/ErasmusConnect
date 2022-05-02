@extends('layouts.web')

@section('content')
    <profile nickname="{{ $nickname }}" user="{{ $user }}" user-profile="{{ $userProfile }}"></profile>
@endsection