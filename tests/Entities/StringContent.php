<?php

namespace DoctrineExtensions\Tests\Entities;

/**
 * @Entity
 */
class StringContent
{
    /** @Id @Column(type="string") @GeneratedValue */
    public $id;

    /**
     * @Column(type="string")
     */
    public $content;
}
