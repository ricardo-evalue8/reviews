<?php

namespace Bolt\Extension\evalue8\reviews;

use Bolt\Extension\SimpleExtension;
use Bolt\Asset\Snippet\Snippet;
use Bolt\Asset\File\Stylesheet;
use Bolt\Controller\Zone;
use Bolt\Asset\Target;

use Bolt\Menu\MenuEntry;
use Bolt\Menu\AdminMenuBuilder;
use Silex\Application;
use Silex\ControllerCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Bolt\Asset\Widget\Widget;

/**
 * An extremely basic (thus far) login wallpaper extension.
 *
 * Spice up your /bolt/login screen by pulling images from Unsplash
 * and displaying them as the login background.
 *
 */
class reviewsExtension extends SimpleExtension
{
	protected function registerAssets()
	{



		$widget_reviews = new \Bolt\Asset\Widget\Widget();
			$widget_reviews
            ->setZone('frontend')
            ->setLocation('reviews')
            ->setCallback([$this, 'frontendButton'])
			;

			return [ $widget_reviews ];
		}

	public function frontendButton()
	{
		// review config array to twig
		$config = $this->getConfig();
		$context = [
				'title' => [$config["title"]],
				'description' => [$config["description"]],
		];

		//$config["title"]
		return $this->renderTemplate('reviews.twig', $context);
	}
}
