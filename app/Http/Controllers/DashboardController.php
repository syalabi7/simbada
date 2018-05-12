<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $register = strtotime($user->registered_at);
        $login = strtotime($user->last_signed_in);

        //getting date of the day
        $date_register = date("d", $register);
        $date_login = date("d", $login);

        //getting name of the day
        $day_register = $this->changeDay(date("l", $register)) ;
        $day_login = $this->changeDay(date("l", $login));

        //getting name of month
        $month_register = $this->changeMonth(date("M", $register));
        $month_login = $this->changeMonth(date("M", $login));

        //getting year of the year
        $year_register = date("Y", $register);
        $year_login = date("Y", $login);


        $registeredAt = $day_register.", ".$date_register." ".$month_register." ".$year_register;
        $lastLogin = $day_login.", ".$date_login." ".$month_login." ".$year_login;

        $datachart = $this->dataChart();

//        dd($datachart);

        return view('dashboard', ['user'=>$user, 'registeredAt'=>$registeredAt, 'lastLogin'=>$lastLogin, 'datacharts'=>$datachart]);
    }

    public function changeDay($day)
    {
        if ($day == "Sunday")
            $day = "Minggu";
        elseif ($day == "Monday")
            $day = "Senin";
        elseif ($day == "Tuesday")
            $day = "Selasa";
        elseif ($day == "Wednesday")
            $day = "Rabu";
        elseif ($day == "Thursday")
            $day = "Kamis";
        elseif ($day == "Friday")
            $day = "Jumat";
        else
            $day = "Sabtu";

        return $day;
    }

    public function changeMonth($month)
    {
        if ($month == "Jan")
            $month = "Januari";
        elseif ($month == "Feb")
            $month = "Februari";
        elseif ($month == "Mar")
            $month = "Maret";
        elseif ($month == "Apr")
            $month = "April";
        elseif ($month == "May")
            $month = "Mei";
        elseif ($month == "Jun")
            $month = "Juni";
        elseif ($month == "Jul")
            $month = "Juli";
        elseif ($month == "Aug")
            $month = "Agustus";
        elseif ($month == "Sep")
            $month = "September";
        elseif ($month == "Oct")
            $month = "Oktober";
        elseif ($month == "Nov")
            $month = "November";
        else
            $month = "Desember";

        return $month;
    }

    public function dataChart(){
        $datas = DB::select(DB::raw("SELECT c.nama_kategori, COUNT(a.nama_aset) as jumlah
        FROM asets a, categories c
        WHERE a.id_kategori=c.id 
        GROUP BY c.nama_kategori"));

        return $datas;
    }
}
