<?php

if (count($cari) > 0) {
    foreach ($cari as $data) {
        echo $data->username . "<br>";
    }
} else {
    echo "Data tidak ditemukan";
}
