@php
    $prezzo = floatval($prezzo);
    $sconto = floatval($sconto);

    $prezzoScontato = $prezzo - ($prezzo * $sconto / 100);
@endphp


<p class="prezzo_scontato"> Prezzo scontato: {{$prezzoScontato}}€</p>