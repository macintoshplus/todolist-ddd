<?php
/**
 * @copyright Macintoshplus (c) 2021
 * Added by : Macintoshplus at 02/09/2021 22:23
 */

declare(strict_types=1);

namespace App\Infra\Symfony\Form;

use App\Infra\Entity\DoctrineTodo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class TodoType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => DoctrineTodo::class]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title')
            ->add('isDone');
    }

}
