<?
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<table class="table table-bordered">
    @foreach($book as $book)
    <tr>
        <td>
            {{$book->name}}
        </td>
        <td>
            {{$book->Yacht_name}}
        </td>
    </tr>
    <tr>
        <td>
            {{$book->Booking_date_otpr}} - {{$book->Booking_date_prib}}
        </td></tr><tr>
        <td>
            {{$book->Booking_cost}}
        </td>
    </tr>
        @endforeach
</table>
</body>
</html>