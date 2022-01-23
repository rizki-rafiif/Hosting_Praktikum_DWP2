{{-- extends untuk menentukan file mana yang diwariskan ke file child --}}
@extends('template.base')
{{-- section untuk pendefinisian isi dari @yield --}}
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Beranda</title>
    </head>
    <body>
        <h1>Beranda</h1>
        <br>
        <h4>Selamat Datang di percobaan membuat web dengan framework Laravel</h4>
        <h4>Anda Luar Biasa!</h4>
        <img class="gambar-kucing 20%" src="https://i.kym-cdn.com/entries/icons/original/000/026/638/cat.jpg" alt="">
    </body>
    </html>
@endsection