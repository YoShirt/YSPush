<?php

/*
 * This file is part of the YSPush package.
 *
 * (c) Arthur Edamov <edamov@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace YSPush;

/**
 * Interface ApnsResponseInterface
 * @package YSPush
 */
interface ApnsResponseInterface
{
    /**
     * Get APNs Id
     *
     * @return string
     */
    public function getApnsId();

    /**
     * Get device token
     *
     * @return string|null
     */
    public function getDeviceToken();

    /**
     * Get status code.
     *
     * @return int|null
     */
    public function getStatusCode(): int;

    /**
     * Get reason phrase.
     *
     * @return string
     */
    public function getReasonPhrase(): string;

    /**
     * Get error reason.
     *
     * @return string
     */
    public function getErrorReason(): string;

    /**
     * Get error description.
     *
     * @return string
     */
    public function getErrorDescription(): string;

    /**
     * Get timestamp for a status 410 error
     *
     * @return string
     */
    public function get410Timestamp(): string;
}
