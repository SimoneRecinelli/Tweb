@php
    use Carbon\Carbon;

    if (empty($expirationDate)) {
        $remainingDays = 'Offerta senza scadenza';
    } else {
        $expiration = Carbon::createFromFormat('d/m/Y', $expirationDate);

        if ($expiration->isPast()) {
            $remainingDays = 'Offerta scaduta!';
        } else {
            $remainingTime = $expiration->diff(Carbon::now());
            $remainingDays = $remainingTime->format('%a giorni rimasti');
        }
    }
@endphp

{{ $remainingDays }} 
