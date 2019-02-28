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

class FoxyCartHMACNode extends \Twig_Node
{

    // Compile the twig and pass it onto the fc_hash_html function...
    public function compile(\Twig_Compiler $compiler)
    {
        $html = $this->getAttribute('html');

        $compiler
            ->addDebugInfo($this);
        $compiler
            ->write("ob_start();\n")
            ->subcompile($this->getNode('body'))
            ->write("\$_compiledBody = ob_get_clean();\n");

        $compiler
            ->write("echo ".FoxyCartHMAC::class."::\$plugin->foxyCartHMACService->fc_hash_html(\$_compiledBody);\n");
    }
}
