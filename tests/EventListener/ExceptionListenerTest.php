<?php

namespace EasyCorp\Bundle\EasyAdminBundle\Tests\EventListener;

use EasyCorp\Bundle\EasyAdminBundle\EventListener\ExceptionListener;
use EasyCorp\Bundle\EasyAdminBundle\Exception\EntityNotFoundException as EasyEntityNotFoundException;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class ExceptionListenerTest extends TestCase
{
    

    

    public function testCatchBaseExceptions()
    {
        $exception = new EasyEntityNotFoundException([
            'entity_name' => 'Test',
            'entity_id_name' => 'Test key',
            'entity_id_value' => 2,
        ]);
        $event = $this->getEventExceptionThatShouldBeCalledOnce($exception);
        $twig = $this->getTwig();

        $listener = new ExceptionListener($twig, [], 'easyadmin.listener.exception:showExceptionPageAction');
        $listener->onKernelException($event);
    }

    

    public function testShouldNotCatchExceptionsWithSameName()
    {
        $exception = new EntityNotFoundException();
        $event = $this->getEventExceptionThatShouldNotBeCalled($exception);
        $twig = $this->getTwig();

        $listener = new ExceptionListener($twig, [], 'easyadmin.listener.exception:showExceptionPageAction');
        $listener->onKernelException($event);
    }
}

class EntityNotFoundException extends \Exception
{
}

class TestKernel implements HttpKernelInterface
{
    public function handle(Request $request, $type = self::MASTER_REQUEST, $catch = true)
    {
        return new Response('foo');
    }
}
