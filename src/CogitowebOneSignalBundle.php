<?php

namespace Cogitoweb\OneSignalBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CogitowebOneSignalBundle extends Bundle
{
    /**
     * {@inheritDoc}
     */
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $extension = $this->createContainerExtension();

            if (null !== $extension) {
                $this->extension = $extension;
            } else {
                $this->extension = false;
            }
        }

        return $this->extension ?: null;
    }
}
