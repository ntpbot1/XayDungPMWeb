<?php
namespace App\Helpers;
class Helper{
    public static function menu($menu){
        $html='';
        foreach($menu as $key => $value){
            $html .='
            <th>'.$menu->id.'</th>
            <th>'.$menu->ma_nsx.'</th>
            <th>'.$menu->ten_nsx.'</th>
            <th>'.$menu->tru_so.'</th>';
            // unset($menu[$key]);
            // $html .=self::menu($menu);
        }
        return $html;
    }
}