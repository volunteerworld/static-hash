<?php
namespace Vowo\StaticHash\Cache;

use Neos\Cache\Backend\AbstractBackend as AbstractCacheBackend;
use Neos\Flow\Annotations as Flow;
use Neos\Cache\Backend\PhpCapableBackendInterface;
use Neos\Cache\Backend\TaggableBackendInterface;
use Vowo\StaticHash\Exception;

/**
 * A caching backend which forgets everything immediately
 *
 * @api
 */
class StaticBackend extends AbstractCacheBackend implements PhpCapableBackendInterface, TaggableBackendInterface
{

    /**
     * @Flow\InjectConfiguration(path="hash")
     * @var string
     */
    protected $hash;


    /**
     * Acts as if it would save data
     *
     * @param string $entryIdentifier ignored
     * @param string $data ignored
     * @param array $tags ignored
     * @param integer $lifetime ignored
     * @return void
     * @api
     */
    public function set($entryIdentifier, $data, array $tags = [], $lifetime = null)
    {
    }

    /**
     * Returns False
     *
     * @param string $entryIdentifier ignored
     * @return boolean FALSE
     * @throws Exception
     * @api
     */
    public function get($entryIdentifier = '')
    {
        if (isset($this->hash)) {
            return $this->hash;
        } else {
            throw new Exception(sprintf('The static hash don\'t exist , please check your settings.', $this->hash), 1511813427);
        }
    }

    /**
     * Returns False
     *
     * @param string $entryIdentifier ignored
     * @return boolean FALSE
     * @api
     */
    public function has($entryIdentifier): bool
    {
        return true;
    }

    /**
     * Does nothing
     *
     * @param string $entryIdentifier ignored
     * @return boolean FALSE
     * @api
     */
    public function remove($entryIdentifier): bool
    {
        return false;
    }

    /**
     * Returns an empty array
     *
     * @param string $tag ignored
     * @return array An empty array
     * @api
     */
    public function findIdentifiersByTag($tag): array
    {
        return [];
    }

    /**
     * Does nothing
     *
     * @return void
     * @api
     */
    public function flush()
    {
    }

    /**
     * Does nothing
     *
     * @param string $tag ignored
     * @return integer
     * @api
     */
    public function flushByTag($tag): int
    {
        return 0;
    }

    /**
     * Does nothing
     *
     * @return void
     * @api
     */
    public function collectGarbage()
    {
    }

    /**
     * Does nothing
     *
     * @param string $identifier An identifier which describes the cache entry to load
     * @return void
     * @api
     */
    public function requireOnce($identifier)
    {
    }
}
