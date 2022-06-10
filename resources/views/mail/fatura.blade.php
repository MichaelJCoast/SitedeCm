<!DOCTYPE html>

<html>
<head>
    <title>Reserva Da Merch</title>
    <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
    </style>
</head>
<body>
    @foreach($layout as $key => $layout )

    <?php $total=0; ?>
    <h1 style="color: red;">{{$layout->title}}</h1>

<table>
    <tr>
        <th style="color: red;">Produto</th>
        <th style="color: red;">Detalhes</th>
        <th style="color: red;">Preço</th>
    </tr>

        @foreach($order as $key => $dataorder )
            <?php $idmerch=$dataorder->product;
                $merch = DB::table('merch')
                    ->whereIn('id', [$idmerch] )
                    ->get(); ?>
            @foreach($merch as $key => $datamerch )

    <tr>
        <td>
            <img src="../../laravel/{{$datamerch->photo}}" width="50" height="50">{{$datamerch->name}}
        </td>
        <td>
            {{$dataorder->quantity}}x, size {{$dataorder->size}}
        </td>
        <td>
            {{$datamerch->price}}€
        </td>
        <?php $total=$total+$datamerch->price ?>
    </tr>

            @endforeach  
        @endforeach

     <td style="border:0px"></td>
       <td>Total</td>
        <td><?php echo $total; ?></td>
    </tr>
</table>
    <p> {{$layout->body}} </p>
    <p>{{$layout->msg}} </p>
    <p>{{$layout->footer}} </p>

@endforeach

</body>
</html>
