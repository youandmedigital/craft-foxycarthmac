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

namespace youandmedigital\foxycarthmac\models;

use youandmedigital\foxycarthmac\FoxyCartHMAC;

use Craft;
use craft\base\Model;

/**
 * FoxyCart HMAC Settings Model
 *
 * This is a model used to define the plugin's settings.
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    You & Me Digital
 * @package   FoxyCart HMAC
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * Some field model attribute
     *
     * @var string
     */
     public $fcUrl = '';
     public $fcApiKey = '';

    // Public Methods
    // =========================================================================

    /**
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['fcUrl', 'string'],
            ['fcApiKey', 'string'],
        ];
    }
}
