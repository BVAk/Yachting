
<title>Yachting</title>


<body>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> {{ Auth::user()->name }}</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    Ваши заказы:
                </div>

                <div class="table-responsive">
                 <table class="table">
                  <thead>
                     <tr>
                        <th>Дата тура</th>
                        <th>Выбор путешествия</th>
                        <th>Выбор яхты</th>
                        <th>Состояние заказа</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>



    </div>
</div>
</div>
</div>
@endsection
</body>