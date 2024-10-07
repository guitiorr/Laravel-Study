<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditButton extends Component
{
    public $post;

    public function __construct($post)
    {
        $this->post = $post; // Ensure the post variable is being assigned
    }

    public function render()
    {
        return view('components.edit-button');
    }
}
