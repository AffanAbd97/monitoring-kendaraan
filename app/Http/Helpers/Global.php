<?php

use Illuminate\Support\Facades\DB;



if (!function_exists('formatDate')) {

    function formatDate($dateString)
    {

        $date = new DateTime($dateString);

        return $date->format('d - m - Y');
    }
}

if (!function_exists('getStatusBadge')) {
    function getStatusBadge($status)
    {
        // Define the status messages and badge classes
        $statusMessages = [
            'waiting' => [
                'message' => 'Menunggu perizinan Kepala Kantor',
                'badgeClass' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300'
            ],
            'firstACC' => [
                'message' => 'Menunggu perizinan Pool',
                'badgeClass' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300'
            ],
            'secondACC' => [
                'message' => 'Di Izinkan Pool Dan Kepala',
                'badgeClass' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300'
            ],
            'firstReject' => [
                'message' => 'Perizinan Ditolak Oleh...',
                'badgeClass' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300'
            ],
            'secondReject' => [
                'message' => 'Perizinan Ditolak Oleh...',
                'badgeClass' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300'
            ]
        ];

        // Check if the status exists in the defined statuses
        if (array_key_exists($status, $statusMessages)) {
            $message = $statusMessages[$status]['message'];
            $badgeClass = $statusMessages[$status]['badgeClass'];

            // Return the formatted HTML string
            return "<span class=\"$badgeClass text-xs font-medium me-2 px-2.5 py-0.5 rounded\">$message</span>";
        } else {
            // Optional: handle unexpected status
            return "<span class=\"bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300\">Status tidak dikenal</span>";
        }
    }
}
if (!function_exists('getOfficeType')) {

    function getOfficeType($input)
    {

        $input = strtolower($input);


        if ($input === 'cabang') {
            return 'Branch Office';
        } elseif ($input === 'utama') {
            return 'Head Office';
        } else {
            return 'Unknown Office Type';
        }
    }
}
if (!function_exists('format_rupiah')) {
    function format_rupiah($angka)
    {
        $rupiah = "Rp " . number_format($angka, 0, ',', '.');
        return $rupiah;
    }
}

if (!function_exists('menuActive')) {
    function menuActive(
        $uri,
        $output = "bg-gray-200 font-semibold text-slate-700
    font-semibold text-slate-700 dark:bg-gray-700"
    ) {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($uri)) {
                return $output;
            }
        }
    }
}
if (!function_exists('set_active_sub_admin')) {
    function subMenuActive(
        $uri,
        $output = "bg-gray-100 font-semibold text-slate-700
    font-semibold text-slate-700"
    ) {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($uri)) {
                return $output;
            }
        }
    }
}