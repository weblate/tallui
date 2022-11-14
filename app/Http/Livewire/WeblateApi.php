<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class WeblateApi extends Component
{
    public function call()
    {
        $response = Http::get('https://hosted.weblate.org/api/projects/tallui/languages/');

        return $response->object();
    }

    public function render()
    {
        $languages = $this->call();

        return view('livewire.weblate-api')->with('languages', $languages);
    }
}
