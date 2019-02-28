<?php
/**
 * FoxyCart HMAC plugin for Craft CMS 3.1
 *
 * FoxyCart HMAC is a cryptographic method to prevent people from tampering
 * with your product links
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
 * @since     1.0.0
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
