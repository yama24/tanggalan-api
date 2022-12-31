# tanggalan-api

Ini adalah sebuah library API kalender untuk scrapping data kalender dari [tanggalan.com](https://tanggalan.com/)

## Instalasi

Install dengan composer

```bash
  composer require yama/tanggalan-api
```

## Contoh Penggunaan

```php
<?php

require_once __DIR__ . "/vendor/autoload.php";

use Yama\TanggalanApi\Tanggalan;

$data = Tanggalan::getTanggalan(2023, 1);
```

| Parameter | Tipe      | Deskripsi               |
| :-------- | :-------- | :---------------------- |
| `tahun`   | `integer` | **Required**. cth: 2023 |
| `bulan`   | `integer` | **Required**. cth: 1    |

data yang di return berupa json

contoh :

```json
{
  "daysCount": 31,
  "weeksCount": 5,
  "year": 2023,
  "month": 1,
  "daily": [
    {
      "type": "current",
      "text": "2023-1-1",
      "date": "1",
      "day": "Sun",
      "holiday": { "text": "2023-1-1", "date": "1", "name": "Tahun Baru 2023" },
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-2",
      "date": "2",
      "day": "Mon",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-3",
      "date": "3",
      "day": "Tue",
      "holiday": null,
      "peringatan": {
        "text": "2023-1-3",
        "date": "3",
        "name": "Hari Departemen Agama Republik Indonesia"
      }
    },
    {
      "type": "current",
      "text": "2023-1-4",
      "date": "4",
      "day": "Wed",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-5",
      "date": "5",
      "day": "Thu",
      "holiday": null,
      "peringatan": {
        "text": "2023-1-5",
        "date": "5",
        "name": "Hari Korps Wanita Angkatan Laut"
      }
    },
    {
      "type": "current",
      "text": "2023-1-6",
      "date": "6",
      "day": "Fri",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-7",
      "date": "7",
      "day": "Sat",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-8",
      "date": "8",
      "day": "Sun",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-9",
      "date": "9",
      "day": "Mon",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-10",
      "date": "10",
      "day": "Tue",
      "holiday": null,
      "peringatan": {
        "text": "2023-1-10",
        "date": "10",
        "name": "Hari Tiga Tuntutan Rakyat (Tritura)"
      }
    },
    {
      "type": "current",
      "text": "2023-1-11",
      "date": "11",
      "day": "Wed",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-12",
      "date": "12",
      "day": "Thu",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-13",
      "date": "13",
      "day": "Fri",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-14",
      "date": "14",
      "day": "Sat",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-15",
      "date": "15",
      "day": "Sun",
      "holiday": null,
      "peringatan": {
        "text": "2023-1-15",
        "date": "15",
        "name": "Hari Peringatan Laut dan Samudera"
      }
    },
    {
      "type": "current",
      "text": "2023-1-16",
      "date": "16",
      "day": "Mon",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-17",
      "date": "17",
      "day": "Tue",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-18",
      "date": "18",
      "day": "Wed",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-19",
      "date": "19",
      "day": "Thu",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-20",
      "date": "20",
      "day": "Fri",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-21",
      "date": "21",
      "day": "Sat",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-22",
      "date": "22",
      "day": "Sun",
      "holiday": {
        "text": "2023-1-22",
        "date": "22",
        "name": "Tahun Baru Imlek 2574 Kongzili"
      },
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-23",
      "date": "23",
      "day": "Mon",
      "holiday": {
        "text": "2023-1-23",
        "date": "23",
        "name": "Cuti Bersama Imlek"
      },
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-24",
      "date": "24",
      "day": "Tue",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-25",
      "date": "25",
      "day": "Wed",
      "holiday": null,
      "peringatan": {
        "text": "2023-1-25",
        "date": "25",
        "name": "Hari Gizi dan Makanan"
      }
    },
    {
      "type": "current",
      "text": "2023-1-26",
      "date": "26",
      "day": "Thu",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-27",
      "date": "27",
      "day": "Fri",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-28",
      "date": "28",
      "day": "Sat",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-29",
      "date": "29",
      "day": "Sun",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-30",
      "date": "30",
      "day": "Mon",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-1-31",
      "date": "31",
      "day": "Tue",
      "holiday": null,
      "peringatan": null
    },
    {
      "type": "after",
      "text": "2023-1-1",
      "date": 1,
      "day": "Wed",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "after",
      "text": "2023-1-2",
      "date": 2,
      "day": "Thu",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "after",
      "text": "2023-1-3",
      "date": 3,
      "day": "Fri",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "after",
      "text": "2023-1-4",
      "date": 4,
      "day": "Sat",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    }
  ],
  "holiday": [
    { "text": "2023-1-1", "date": "1", "name": "Tahun Baru 2023" },
    {
      "text": "2023-1-22",
      "date": "22",
      "name": "Tahun Baru Imlek 2574 Kongzili"
    },
    { "text": "2023-1-23", "date": "23", "name": "Cuti Bersama Imlek" }
  ],
  "peringatan": [
    {
      "text": "2023-1-3",
      "date": "3",
      "name": "Hari Departemen Agama Republik Indonesia"
    },
    {
      "text": "2023-1-5",
      "date": "5",
      "name": "Hari Korps Wanita Angkatan Laut"
    },
    {
      "text": "2023-1-10",
      "date": "10",
      "name": "Hari Tiga Tuntutan Rakyat (Tritura)"
    },
    {
      "text": "2023-1-10",
      "date": "10",
      "name": "Hari Gerakan Satu Juta Pohon"
    },
    {
      "text": "2023-1-15",
      "date": "15",
      "name": "Hari Peringatan Laut dan Samudera"
    },
    { "text": "2023-1-25", "date": "25", "name": "Hari Gizi dan Makanan" },
    { "text": "2023-1-25", "date": "25", "name": "Hari Kusta Internasional" }
  ]
}
```
