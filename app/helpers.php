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

function formatPhoneNumber($phoneNumber) {
    // Cek apakah awalannya 62 atau 0
    if (substr($phoneNumber, 0, 2) == "62") {
        return "(+" . substr($phoneNumber, 0, 2) . ") " . substr($phoneNumber, 2, 3) . " " . substr($phoneNumber,5);
    } elseif ($phoneNumber[0] == "0") {
        return substr_replace(substr_replace(substr_replace($phoneNumber,'-',4,0),'-',8,0),'-',13,0);
    }
}