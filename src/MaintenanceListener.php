<?php
declare(strict_types=1);

namespace FPalamuso\SymfonyMaintenanceBundle;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Twig\Environment;

class MaintenanceListener
{
    private array $config;
    private Environment $twig;

    public function __construct(array $config, Environment $twig)
    {
        $this->config = $config;
        $this->twig = $twig;
    }

    public function onKernelRequest(RequestEvent $event)
    {
        if (!$this->support($event)) {
            return;
        }

        $view = $this->twig->render('@FPalamusoSymfonyMaintenance/maintenance.html.twig');
        $event->setResponse(new Response($view, 503));
    }

    private function support(RequestEvent $event): bool
    {
        if (!$this->config['is_active']) {
            return false;
        }

        if(in_array($_SERVER['REMOTE_ADDR'], $this->config['ips'], true)) {
            return false;
        }

        if(!empty($this->config['routes'])) {
            if(in_array($event->getRequest()->get('_route'), $this->config['routes'], true)) {
                return true;
            }

            return false;
        }

        return true;
    }
}
