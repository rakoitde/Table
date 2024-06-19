<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait hasConfig
{
    /**
     * the ci4table config
     *
     * @var object
     */
    protected $config;

    /**
     * Sets the config
     *
     * @param string $formId The form attribute
     * @param mixed  $config
     */
    public function config($config): self
    {
        $this->config = $config;

        return $this;
    }

    public function getConfig()
    {
        return $this->config;
    }
}
