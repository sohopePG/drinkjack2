<?php

namespace App\View\Components\Nomimatch;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\Comment;


class OptionsComment extends Component
{
    /**
     * Create a new component instance.
     */

     private Comment $comment;
     private int $userId;
    public function __construct(Comment $comment,int $userId)
    {
        //
        $this->comment = $comment;
        $this->userId = $userId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nomimatch.options-comment')
        ->with('comment',$this->comment)
        ->with('myCom',auth()->id()===$this->userId);
    }
}
