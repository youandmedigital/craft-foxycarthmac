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

use youandmedigital\foxycarthmac\twigextensions\FoxyCartHMACNode;

/**
 *
 * @author    You & Me Digital
 * @package   FoxyCartHMAC
 * @since     0.0.1
 *
 */
class FoxyCartHMACTokenParser extends \Twig_TokenParser
{

    // Parse inbtween {% hmac %} and {% endhmac %} tags
    public function parse(\Twig_Token $token)
    {
        $lineNo = $token->getLine();
        $stream = $this->parser->getStream();

        $attributes = [
            'html' => false
        ];

        if ($stream->test(\Twig_Token::NAME_TYPE, 'html')) {
            $attributes['html'] = true;
            $stream->next();
        }

        $stream->expect(\Twig_Token::BLOCK_END_TYPE);
        $nodes['body'] = $this->parser->subparse([$this, 'endTag'], true);
        $stream->expect(\Twig_Token::BLOCK_END_TYPE);
        return new FoxyCartHMACNode($nodes, $attributes, $lineNo, $this->getTag());
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
