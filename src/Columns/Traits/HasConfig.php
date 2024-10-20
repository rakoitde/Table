<?php

declare(strict_types=1);

namespace Rakoitde\Table\Columns\Traits;

trait HasConfig
{
    /**
     * the config
     *
     * @var object
     */
    protected $config;

    /**
     * set config
     *
     * @param string $formId The form attribute
     * @param mixed  $config
     */
    public function config($config): self
    {
        $this->config = $config;

        return $this;
    }

    /**
     * get config
     *
     * @return object config
     */
    public function getConfig()
    {
        return $this->config;
    }
}
