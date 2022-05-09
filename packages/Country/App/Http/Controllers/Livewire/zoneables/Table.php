<?php

namespace Packages\Country\App\Http\Controllers\Livewire\zoneables;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;
use Packages\Country\App\Models\Country;
use Packages\Country\App\Models\Zone;

class Table extends Component {

    use AuthorizesRequests;
    use WithPagination;

    public $zone;
    public $title;

    public function mount(Zone $zone)
    {
        $this->zone = $zone;
    }


    public function render()
    {
        return view('country::livewire.cms.zoneables.table', ['zoneables'=>$this->getAttachedZoneables()]);
    }

    public function paginationView()
    {
        return 'components.cms.table.pagination';
    }

    public function getAttachedZoneables()
    {
        $countries = $this->zone->countries();
        if(!empty($this->title)){
            $countries = $countries->whereTranslationLike('name', '%'.$this->title.'%');
        }
        return $countries->paginate(20);
    }

    public function remove(Country $country)
    {
        $this->zone->countries()->detach($country);
    }

}
