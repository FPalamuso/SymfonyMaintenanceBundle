<?php
declare(strict_types=1);

namespace FPalamuso\SymfonyMaintenanceBundle;

use FPalamuso\SymfonyMaintenanceBundle\DependencyInjection\FPalamusoSymfonyMaintenanceExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class FPalamusoSymfonyMaintenanceBundle extends Bundle
{
    public function getContainerExtension()
    {
        if($this->extension === null) {
            $this->extension = new FPalamusoSymfonyMaintenanceExtension();
        }

        return $this->extension;
    }

}
