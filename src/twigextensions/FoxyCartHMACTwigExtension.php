<?php
/**
 * FoxyCart HMAC plugin for Craft CMS 3.x
 *
 * tbc
 *
 * @link      https://youandme.digital
 * @copyright Copyright (c) 2019 You & Me Digital
 */

namespace youandmedigital\foxycarthmac\twigextensions;

use youandmedigital\foxycarthmac\FoxyCartHMAC;

/**
 *
 * @author    You & Me Digital
 * @package   FoxyCartHMAC
 * @since     0.0.1
 *
 */
class FoxyCartHMACTwigExtension extends \Twig_Extension
{
    
    // Returns the name of the extension
    public function getName()
    {
        return 'hmac';
    }


    public function getTokenParsers()
    {
        return [
            new FoxyCartHMACTokenParser(),
        ];
    }
}
