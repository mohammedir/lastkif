@php
    $app_url = env('APP_URL');
    $decrypted = Crypt::decryptString($image_link);
    $image_path = $app_url.$decrypted;
@endphp
<div class="div_style">
    <style>
        body {
            display: block;
            margin: 0;
        }

        .div_style {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            background-color: #000;
        }

        .img_style {
            margin: auto;
            display: block;
        }
    </style>
    <img class="img_style" src="{{$image_path}}">
</div>
