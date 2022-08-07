<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body data-rsssl=1>
    <table width="100%">
            <strong>Nome:</strong> {{ $order->name }}<br>
            <strong>Encomenda:</strong> {{ $order->order }}<br>
            <strong>Total:</strong> {{ $order->total }}<br>
            <strong>Verificar:</strong> {{ $order->verification_url }}<br>
    </table>
