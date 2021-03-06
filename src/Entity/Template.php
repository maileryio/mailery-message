<?php

declare(strict_types=1);

/**
 * Template module for Mailery Platform
 * @link      https://github.com/maileryio/mailery-template
 * @package   Mailery\Template
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

namespace Mailery\Template\Entity;

use RuntimeException;
use Mailery\Brand\Entity\Brand;
use Mailery\Common\Entity\RoutableEntityInterface;

/**
 * @Cycle\Annotated\Annotation\Entity(
 *      table = "templates",
 *      repository = "Mailery\Template\Repository\TemplateRepository",
 *      mapper = "Mailery\Template\Mapper\DefaultMapper"
 * )
 */
abstract class Template implements RoutableEntityInterface
{
    /**
     * @Cycle\Annotated\Annotation\Column(type = "primary")
     * @var int|null
     */
    protected $id;

    /**
     * @Cycle\Annotated\Annotation\Relation\BelongsTo(target = "Mailery\Brand\Entity\Brand", nullable = false)
     * @var Brand
     */
    protected $brand;

    /**
     * @Cycle\Annotated\Annotation\Column(type = "string(255)")
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName();
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id ? (string) $this->id : null;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Brand
     */
    public function getBrand(): Brand
    {
        return $this->brand;
    }

    /**
     * @param Brand $brand
     * @return self
     */
    public function setBrand(Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getEditRouteName(): ?string
    {
        throw new RuntimeException('Must be implemented in nested.');
    }

    /**
     * {@inheritdoc}
     */
    public function getEditRouteParams(): array
    {
        throw new RuntimeException('Must be implemented in nested.');
    }

    /**
     * {@inheritdoc}
     */
    public function getViewRouteName(): ?string
    {
        throw new RuntimeException('Must be implemented in nested.');
    }

    /**
     * {@inheritdoc}
     */
    public function getViewRouteParams(): array
    {
        throw new RuntimeException('Must be implemented in nested.');
    }

    /**
     * {@inheritdoc}
     */
    public function getPreviewRouteName(): ?string
    {
        throw new RuntimeException('Must be implemented in nested.');
    }

    /**
     * {@inheritdoc}
     */
    public function getPreviewRouteParams(): array
    {
        throw new RuntimeException('Must be implemented in nested.');
    }

    /**
     * {@inheritdoc}
     */
    public function getDeleteRouteName(): ?string
    {
        return '/template/default/delete';
    }

    /**
     * {@inheritdoc}
     */
    public function getDeleteRouteParams(): array
    {
        return ['id' => $this->getId()];
    }
}
