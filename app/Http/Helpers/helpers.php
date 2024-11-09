<?php

function angka($angka)
{
    return number_format($angka, 0, ',', '.');
}

function format_uang($angka)
{
    return 'Rp ' . angka(round($angka, -3));
}
