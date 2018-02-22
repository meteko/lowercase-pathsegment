<?php

namespace Meteko\LowercasePathsegment;

use Neos\Flow\Package\Package as BasePackage;
use Neos\Flow\Core\Bootstrap;
use Neos\ContentRepository\Domain\Model\Node;
use Neos\Neos\Utility\NodeUriPathSegmentGenerator;
use Neos\Neos\Routing\Cache\RouteCacheFlusher;
use Neos\ContentRepository\Domain\Model\NodeInterface;

class Package extends BasePackage {

	/**
	 * @param Bootstrap $bootstrap
	 */
	public function boot(Bootstrap $bootstrap)
	{
		$dispatcher = $bootstrap->getSignalSlotDispatcher();
		$dispatcher->connect(Node::class, 'nodePropertyChanged', function (NodeInterface $node, $propertyName) use ($bootstrap) {
			if ($propertyName === 'uriPathSegment') {
				$node->setProperty('uriPathSegment', strtolower($node->getProperty('uriPathSegment')));
				NodeUriPathSegmentGenerator::setUniqueUriPathSegment($node);
				$bootstrap->getObjectManager()->get(RouteCacheFlusher::class)->registerNodeChange($node);
			}
		});
	}
}
