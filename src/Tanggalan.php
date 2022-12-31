<?php

namespace Yama\TanggalanApi;

use voku\helper\HtmlDomParser;

class Tanggalan
{
    public static function getTanggalan(int $tahun, int $bulan)
    {
        $months = [
            1 => 'januari',
            2 => 'februari',
            3 => 'maret',
            4 => 'april',
            5 => 'mei',
            6 => 'juni',
            7 => 'juli',
            8 => 'agustus',
            9 => 'september',
            10 => 'oktober',
            11 => 'november',
            12 => 'desember',
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://tanggalan.com/' . $months[$bulan] . '-' . $tahun,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $html = HtmlDomParser::str_get_html($response);

        $days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        $bulanBefore = $bulan < 2 ? 12 : $bulan - 1;
        $tahunBefore = $bulan < 2 ? $tahun - 1 : $tahun;
        $lastDate = (int)date("t", strtotime($tahun . '-' . $bulan . '-1')); //tanggal terakhir
        $lastDateBefore = (int)date("t", strtotime($tahunBefore . '-' . $bulanBefore . '-1')); //tanggal terakhir bulan lalu

        $events = $html->findMulti('div#events div div.event')->innerText();
        $libur = [];
        $peringatan = [];
        foreach ($events as $e) {
            $ev = HtmlDomParser::str_get_html($e);
            if (strpos($e, 'namaevent libur') !== false) {
                $name = $ev->findOne('div.namaevent.libur')->text();
                $arrDate = explode(' ', trim(explode($name, $ev->findOne('div')->text())[1]));
                $date = (int)$arrDate[0];
                $libur[] = [
                    'text' => $tahun . '-' . $bulan . '-' . $date,
                    'date' => $date,
                    'name' => trim($name),
                ];
                if (isset($arrDate[2])) {
                    if (is_numeric($arrDate[2])) {
                        $left = $arrDate[2] - $arrDate[0];
                        for ($i = 1; $i <= $left; $i++) {
                            $libur[] = [
                                'text' => $tahun . '-' . $bulan . '-' . ($date + $i),
                                'date' => ($date + $i),
                                'name' => trim($name),
                            ];
                        }
                    }
                }
            } else {
                $name = $ev->findOne('div.namaevent')->text();
                $arrDate = explode(' ', trim(explode($name, $ev->findOne('div')->text())[1]));
                $date = (int)$arrDate[0];
                $peringatan[] = [
                    'text' => $tahun . '-' . $bulan . '-' . $date,
                    'date' => $date,
                    'name' => trim($name),
                ];
                if (isset($arrDate[2])) {
                    if (is_numeric($arrDate[2])) {
                        $left = $arrDate[2] - $arrDate[0];
                        for ($i = 1; $i <= $left; $i++) {
                            $peringatan[] = [
                                'text' => $tahun . '-' . $bulan . '-' . ($date + $i),
                                'date' => ($date + $i),
                                'name' => trim($name),
                            ];
                        }
                    }
                }
            }
        }
        $kalender = [];
        $kalenderKosong = $html->findMulti('div#wrapper div#main ul li s')->text();
        $count = $lastDateBefore - count($kalenderKosong) + 1;
        $id = 0;
        for ($i = 0; $i < count($kalenderKosong); $i++) {
            $kalender[$id] = [
                'type' => 'before',
                'text' => $tahun . '-' . $bulan . '-' . $count,
                'date' => $count,
                'day' => $days[$id],
                'holiday' => null,
                'fakultatif' => null,
                'peringatan' => null,
            ];
            $count++;
            $id++;
        }
        $kalenderIsi = $html->findMulti('div#wrapper div#main ul li a div')->text();
        foreach ($kalenderIsi as $ki) {
            if (is_numeric($ki)) {
                $holiday = null;
                foreach ($libur as $hl) {
                    if ($hl['date'] == $ki) {
                        $holiday = $hl;
                        break;
                    }
                }
                $memorial = null;
                foreach ($peringatan as $hp) {
                    if ($hp['date'] == $ki) {
                        $memorial = $hp;
                        break;
                    }
                }
                $kalender[$id] = [
                    'type' => 'current',
                    'text' => $tahun . '-' . $bulan . '-' . $ki,
                    'date' => (int)$ki,
                    'day' => $days[$id % 7],
                    'holiday' => $holiday,
                    'peringatan' => $memorial,
                ];
                $id++;
            }
        }
        $left = count($kalender) % 7 > 0 ? 7 - (count($kalender) % 7) : 0;
        for ($i = 0; $i < $left; $i++) {
            $t = $i + 1;
            $t = $i + 1;
            $kalender[$id] = [
                'type' => 'after',
                'text' => $tahun . '-' . $bulan . '-' . $t,
                'date' => $t,
                'day' => $days[$id % 7],
                'holiday' => null,
                'fakultatif' => null,
                'peringatan' => null,
            ];
            $id++;
        }
        ksort($kalender);
        $data = [
            'daysCount' => $lastDate,
            'weeksCount' => floor(count($kalender) / 7),
            'year' => $tahun,
            'month' => $bulan,
            'daily' => $kalender ?: null,
            'holiday' => $libur ?: null,
            'peringatan' => $peringatan ?: null,
        ];
        return json_encode($data);
    }
}
