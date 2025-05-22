<?php

use Carbon\Carbon;
use App\Models\Contract;


    /**
     * @param string : user's name | app_name default value
     * @return string : url of resource from https://ui-avatars.com
     */
    if (!function_exists('uiavatar')) 
    {     
        function uiavatar($name = '') 
        {
            return 'https://ui-avatars.com/api/?name='. (empty($name) ? env('APP_NAME') : strtolower($name));
        }
    }  


    /**
     * @param string : value to format
     * @param string : currency 
     * @param string : sepator
     * @return string : amount - sep - currency 
     */
    if (!function_exists('moneyformat')) 
    {
        function moneyformat($amount, $currency = "GNF", string $sep = " ") 
        {
            $conversions = ['GNF'=>1, 'EURO'=>0.0001, 'USD'=>0.00012];
            $amount = number_format($amount * $conversions[$currency], 0, ',', $sep);
            return $amount. " " .$currency;
        }   
    }

    /**
     * @param string : value to format
     * @param string : currency 
     * @param string : sepator
     * @return string : amount - sep - currency 
     */
    if (!function_exists('getMonthsBetween')) 
    {
        function getMonthsBetween($start, $end) 
        {
            Carbon::setLocale(app()->getLocale());
            $start = Carbon::parse($start)->startOfMonth();
            $end = Carbon::parse($end)->endOfMonth();
            $months = collect();
            while($start <= $end) {
                $months->push(ucfirst($start->translatedFormat('F Y')));
                $start->addMonth();
            }
            
            return $months;
        }   
    }

    /**
     * @param string : value to format
     * @param string : currency 
     * @param string : sepator
     * @return string : amount - sep - currency 
     */
    if (!function_exists('isauthorize')) 
    {
        function isauthorize(array $groupIds) 
        {
            return in_array(auth()->user()->group_id, $groupIds) ? true : false;
        }   
    }

    /**
     * @param string : value to format
     * @param string : currency 
     * @param string : sepator
     * @return string : amount - sep - currency 
     */
    if (!function_exists('numtoletters')) 
    {
        function numtoletters($num) 
        {
            $format = new NumberFormatter("fr", NumberFormatter::SPELLOUT);
            return ucfirst($format->format($num));
        }   
    }

    /**
     * @param string : value to format
     * @param string : currency 
     * @param string : sepator
     * @return string : amount - sep - currency 
     */
    if (!function_exists('toroman')) 
    {
        function toroman($num) 
        {
            $romans = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
            $return = '';
            while ($num > 0) {
                foreach($romans as $roman => $int) {
                    if($num >= $int) {
                        $num -= $int;
                        $return .= $roman;
                        break;
                    }
                }
            }
            return $return;
        }   
    }

    /**
     * @param string : value to format
     * @param string : currency 
     * @param string : sepator
     * @return string : amount - sep - currency 
     */
    if (!function_exists('updatecontractstatus')) 
    {
        function updatecontractstatus() 
        {
            $contracts = Contract::where('status', 'NON DEBUTE')->get();
            foreach ($contracts as $contract) {
                $today = Carbon::now();
                $startDate = Carbon::parse($contract->began_at);
                $endDate = Carbon::parse($contract->ended_at);
    
                if ($today->between($startDate, $endDate, true, false)) {
                    $contract->status = 'EN COURS';
                } elseif ($today->greaterThan($endDate)) {
                    $contract->status = 'TERMINE';
                }
                $contract->save();
            }
        }   
    }

    /**
     * @param string : value to format
     * @param string : currency 
     * @param string : sepator
     * @return string : amount - sep - currency 
     */
    if (!function_exists('monthsofyear')) 
    {
        function monthsofyear() 
        {
            return app()->getLocale() == 'fr' ? [
                'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
                'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
            ] : [
                'January', 'February', 'Mars', 'April', 'Mai', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];
        }   
    }

    /**
     * @param string : value to format
     * @param string : currency 
     * @param string : sepator
     * @return string : amount - sep - currency 
     */
    if (!function_exists('monthname')) 
    {
        function monthname($index) 
        {
            $months = app()->getLocale() == 'fr' ? [
                1=>'Janvier', 2=>'Février', 3=>'Mars', 4=>'Avril', 5=>'Mai', 6=>'Juin',
                7=>'Juillet', 8=>'Août', 9=>'Septembre', 10=>'Octobre', 11=>'Novembre', 12=>'Décembre'
            ] : [
                1=>'January', 2=>'February', 3=>'Mars', 4=>'April', 5=>'Mai', 6=>'June',
                7=>'July', 8=>'August', 9=>'September', 10=>'October', 11=>'November', 12=>'December'
            ];
            return $months[(int) $index];
        }   
    }
    
    /**
     * Retourne tous les jours entre deux dates, formatés en français.
     *
     * @param string $startDate Format 'Y-m-d'
     * @param string $endDate Format 'Y-m-d'
     * @param string $format Format Carbon, ex: 'l d F Y'
     * @return array
     */
    if (!function_exists('getDaysBetweenDates')) {
        function getDaysBetweenDates($startDate, $endDate, $format = 'l d F Y'): array
        {
            // Met la locale française
            app()->setLocale('fr');
            Carbon::setLocale('fr');
    
            $start = Carbon::parse($startDate);
            $end = Carbon::parse($endDate);
            $days = [];
    
            for ($date = $start->copy(); $date->lte($end); $date->addDay()) {
                $days[] = ucfirst($date->translatedFormat($format));
            }
    
            return $days;
        }
    }