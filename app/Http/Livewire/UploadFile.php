<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Requests\View\Message\ValidateUploadFile;

class UploadFile extends Component
{
  use WithFileUploads;
  public $profilePhoto;
  public $reverseDniPhoto;
  public $frontDniPhoto;
  protected $messages = ValidateUploadFile::MESSAGES_ERROR;
  protected $rules = [
    'profilePhoto' => 'required|image|max:1024',
    'reverseDniPhoto' => 'required|image|max:1024',
    'frontDniPhoto' => 'required|image|max:1024',
  ];

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }
  
  public function render()
  {
    return view('livewire.upload-file');
  }
}
