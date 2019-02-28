<?php
/**
 * FoxyCart HMAC plugin for Craft CMS 3.x
 *
 * FoxyCart HMAC is a cryptographic method to prevent people from tampering
 * with your product links
 *
 * @link      https://youandme.digital
 * @copyright Copyright (c) 2019 You & Me Digital
 */

namespace youandmedigital\foxycarthmac\twigextensions;

use youandmedigital\foxycarthmac\twigextensions\FoxyCartHMACNode;

/**
 *
 * @author    You & Me Digital
 * @package   FoxyCartHMAC
 * @since    1.0.0
 *
 */
class FoxyCartHMACTokenParser extends \Twig_TokenParser
{

    // Parse inbtween {% hmac %} and {% endhmac %} tags
    public function parse(\Twig_Token $token)
    {
        $lineNo = $token->getLine();
        $stream = $this->parser->getStream();
        $stream->next();

        $stream->expect(\Twig_Token::BLOCK_END_TYPE);
        $nodes['body'] = $this->parser->subparse([$this, 'endTag'], true);
        $stream->expect(\Twig_Token::BLOCK_END_TYPE);
        return new FoxyCartHMACNode($nodes, $lineNo, $this->getTag());
    }

    // Start twig tag with...
    public function getTag()
    {
        return 'hmac';
    }

    // End twig tag with...
    public function endTag(\Twig_Token $token)
    {
        return $token->test('endhmac');
    }
}
