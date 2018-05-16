@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

  @component('admin.components.breadcrumb')
    @slot('title') Яхты @endslot
    @slot('parent') Главная @endslot
    @slot('active') Добавление яхты @endslot
  @endcomponent


</div>

@endsection