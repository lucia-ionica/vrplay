<?php

namespace VRCustomUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class VRCustomUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
