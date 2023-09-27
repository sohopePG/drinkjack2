<?php

namespace App\View\Components\Nomimatch;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\Recruitment;


class Options extends Component
{
    /**
     * Create a new component instance.
     */

     private Recruitment $recruitment;
     private int $userId;
    public function __construct(Recruitment $recruitment,int $userId)
    {
        //
        $this->recruitment = $recruitment;
        $this->userId = $userId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nomimatch.options')
        ->with('recruitment',$this->recruitment)
        ->with('myRec',auth()->id()===$this->userId);
    }
}
