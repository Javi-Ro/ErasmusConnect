@extends('layouts.web')

@section('content')
    <editar-perfil nickname="{{ $nickname }}" user="{{ $user }}"></editar-perfil>
@endsection