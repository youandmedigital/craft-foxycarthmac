<?php
/**
 * FoxyCart HMAC plugin for Craft CMS 3.x
 *
 * FoxyCart HMAC is a cryptographic method to prevent people from tampering
 * with your product links
 *
 * Credit goes to Andrew from nystudio107.com for his Craft Minify plugin where
 * his code helped me get this plugin up and running. Go check it out!
 * https://github.com/nystudio107/craft-minify
 *
 * Credit also goes to FoxyCart for developing the HMAC PHP plugin in the
 * first place :)
 *
 * @link      https://youandme.digital
 * @copyright Copyright (c) 2019 You & Me Digital
 */

namespace youandmedigital\foxycarthmac;

use youandmedigital\foxycarthmac\services\FoxyCartHMACService as FoxyCartHMACServiceService;
use youandmedigital\foxycarthmac\twigextensions\FoxyCartHMACTwigExtension;
use youandmedigital\foxycarthmac\models\Settings;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;

use yii\base\Event;

/**
 *
 * @author    You & Me Digital
 * @package   FoxyCartHMAC
 * @since     1.0.0
 *
 * @property  FoxyCartHMACServiceService $foxyCartHMACService
 */
class FoxyCartHMAC extends Plugin
{
    // Setup via FoxyCartHMAC::$plugin
    public static $plugin;

    // Schema version for migrations
    public $schemaVersion = '1.0.0';

    // One-time initialization
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        // Get and set key and url varibles from the CP. Parse them incase
        // the user is using environmental variables
        $fcApiKey = Craft::parseEnv($this->getSettings()->fcApiKey);
        $fcUrl = Craft::parseEnv($this->getSettings()->fcUrl);

        // Override username and password in FoxyCartHMACService.php
        FoxyCartHMAC::$plugin->foxyCartHMACService->setSecret($fcApiKey);
        FoxyCartHMAC::$plugin->foxyCartHMACService->setCartUrl($fcUrl);

        // Add in our Twig extensions
        Craft::$app->view->registerTwigExtension(new FoxyCartHMACTwigExtension());

        Craft::info(
            Craft::t(
                'foxycarthmac',
                '[ {name} ] Plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Creates and returns the model used to store the plugin’s settings.
    protected function createSettingsModel()
    {
        return new Settings();
    }

    // Load twig template
    protected function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            'foxycarthmac/settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }

}
