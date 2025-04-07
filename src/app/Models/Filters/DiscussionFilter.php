<?php

namespace App\Models\Filters;

use EloquentFilter\ModelFilter;

class DiscussionFilter extends ModelFilter
{

    public function city($id){
        return $this->select('discussions.*')
                    ->join('apartments as a','apartment_id','=','a.id')
                    ->join('streets as s','street_id','=','s.id')
                    ->join('microregions as m','microregion_id','=','m.id')
                    ->join('cities as c','city_id','=','c.id')
                    ->where('c.id',$id);
    }

    public function publishDateStart($date){
        return $this->where('created_at', '>',$date);
    }

    public function publishDateEnd($date){
        return $this->where('created_at','<',$date);
    }
}
