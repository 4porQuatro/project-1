<?php


namespace Packages\Country\App\Http\Controllers\Livewire\country;


use Livewire\Component;
use Livewire\WithPagination;
use Packages\Country\App\Models\Country;

class Table extends Component {

    use WithPagination;

    protected $listeners = ['taxAdded'=>'$refresh'];

    public function mount()
    {

    }

    public function render()
    {
        return view('country::livewire.cms.country.table', ['countries'=>$this->getCountries()]);
    }

    public function paginationView()
    {
        return 'components.cms.table.pagination';
    }

    public function getCountries()
    {
        return Country::orderByTranslation('name', 'asc')->paginate(20);
    }

    public function toogleActive(Country $country)
    {
        $country->active = ! $country->active;
        $country->regions->each(function($item) use ($country) {
            $item->active = $country->active;
            $item->save();
        });
        $country->save();
    }


}

