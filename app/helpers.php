<?php

use Carbon\Carbon;

function rupiah($amount)
{
    if ($amount === null) {
        return null;
    }
    return "Rp ".number_format($amount, 0, ',', '.');
}

function dateNow() {
    Carbon::setLocale('id');
    $date = Carbon::parse(Carbon::now());
    $formattedDate = $date->isoFormat('dddd, D MMMM YYYY');
    return $formattedDate;
}

function meter(int $size) {
    return $size." "."m&sup2;";
}
