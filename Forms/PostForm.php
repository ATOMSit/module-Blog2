<?php


namespace Modules\Blog\Forms;

use App\Forms\PictureForm;
use Carbon\Carbon;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class PostForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', Field::TEXT, [
                'rules' => 'required|min:3|max:250',
                'value'=>"frfr"
            ])
            ->add('body', Field::TEXTAREA, [
                'rules' => 'required|min:3|max:250000',
                'value'=>"frfr"
            ])
            ->add('online', Field::SELECT, [
                'choices' => [1 => 'Oui', 0 => 'Non'],
                'rules' => 'required'
            ])
            ->add('indexable', Field::SELECT, [
                'choices' => [1 => 'Oui', 0 => 'Non'],
                'rules' => 'required'
            ])
            ->add('published_at', Field::TEXT, [
                'value' => Carbon::now()->format('d/m/Y'),
                'rules' => 'required'
            ])
            ->add('published_at_time', Field::TEXT, [
                'value' => Carbon::now()->format('H:i:s'),
                'rules' => 'required'
            ])
            ->add('unpublished_at', Field::TEXT, [
                'rules' => 'nullable'
            ])
            ->add('unpublished_at_time', Field::TEXT, [
                'rules' => 'nullable'
            ])
            ->add('file', Field::FILE, [

            ])
            ->add('picture', 'form', [
                'class' => $this->formBuilder->create(PictureForm::class)
            ]);
    }
}