<?php
namespace App\ServiceProvider;

use Flashy\ServiceProviderInterface;
use DI\ContainerBuilder;
use FastEmailValidator\EmailValidator;
use FastEmailValidator\EmailValidatorProvider;
use FastEmailValidator\Validators\ValidFormatValidator;
use FastEmailValidator\Validators\DisposableEmailValidator;
use FastEmailValidator\Validators\EmailHostValidator;
use FastEmailValidator\Validators\FreeEmailServiceValidator;
use FastEmailValidator\Validators\MxRecordsValidator;
use FastEmailValidator\Validators\RoleBasedEmailValidator;
use function DI\object;
use function DI\get;

class FastEmailValidator implements ServiceProviderInterface
{
    public function register(ContainerBuilder $builder, array $opts = []) : void
    {
        $def = array_merge([], $opts);

        $def['fev'] = get(EmailValidator::class);
        $def[EmailValidator::class] = object()
            ->method('registerEmailValidatorProvider', get('fev.provider'));
        $def['fev.provider'] = object(EmailValidatorProvider::class)
            ->method('registerValidator', object(ValidFormatValidator::class))
            ->method('registerValidator', object(DisposableEmailValidator::class))
            ->method('registerValidator', object(EmailHostValidator::class))
            ->method('registerValidator', object(FreeEmailServiceValidator::class))
            ->method('registerValidator', object(MxRecordsValidator::class))
            ->method('registerValidator', object(RoleBasedEmailValidator::class));

        $builder->addDefinitions($def);
    }
}
