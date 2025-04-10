<?php

namespace App\Models\Filters;

use EloquentFilter\ModelFilter;

class DiscussionFilter extends ModelFilter
{

    public function country($id){
        return $this->select('discussions.*')
                    ->join('apartments as a','apartment_id','=','a.id')
                    ->join('streets as s','street_id','=','s.id')
                    ->join('microregions as m','microregion_id','=','m.id')
                    ->join('cities as c','city_id','=','c.id')
                    ->join('regions as r','region_id','=','r.id')
                    ->join('countries as co','country_id','=','co.id')
                    ->where('co.id','=',$id)
                    ->where('a.publish',true)
                    ->where('s.publish',true);
    }

    public function region($id){
        return $this->where('r.id','=',$id);
    }

    public function city($id){
        return $this->where('c.id',$id);
    }

    public function microregion($id){
        return $this->where('m.id',$id);
    }

    public function publishDateStart($date){
        return $this->where('discussions.created_at', '>',$date);
    }

    public function publishDateEnd($date){
        return $this->where('discussions.created_at','<',$date);
    }
}
