<?php

namespace App\Livewire\Pages\Rating;

use App\Livewire\Forms\RatingForm;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Rating $rating;
    public RatingForm $form;

    #[On("createRating")]
    public function createRating()
    {
        $this->show = true;
    }

    #[On("editRating")]
    public function editRating(Rating $rating)
    {
        $this->show = true;
        $this->form->setRating($rating);
    }

    #[On("deleteRating")]
    public function deleteRating(Rating $rating)
    {
        $rating->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data rating berhasil dihapus');
    }

    #[On("deleteAccount")]
    public function deleteAccount(Rating $rating)
    {
        $rating->delete();
        $this->dispatch('reload');
        $this->flash('success', 'Data rating berhasil dihapus');

        $this->redirect(route('login'), navigate:true);
    }

    public function simpan(){
        if (isset($this->form->rating)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data rating berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }

    public function mount()
    {
        $this->form->user_id = Auth::id();
    }


    public function render()
    {
        return view('livewire.pages.rating.actions');
    }
}
