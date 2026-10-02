<?php
declare(strict_types=1);

namespace Interop\Queue;

/**
 * A client uses a MessageConsumer object to receive messages from a destination.
 * A MessageConsumer object is created by passing a Destination object
 * to a message-consumer creation method supplied by a session.
 *
 * @see https://docs.oracle.com/javaee/7/api/javax/jms/MessageConsumer.html
 * @psalm-mutable
 */
interface Consumer
{
    /**
     * Gets the Queue associated with this queue receiver.
     * @psalm-capabilities read-props
     */
    public function getQueue(): Queue;

    /**
     * Receives the next message that arrives within the specified timeout interval.
     * This call blocks until a message arrives, the timeout expires, or this message consumer is closed.
     * A timeout of zero never expires, and the call blocks indefinitely.
     *
     * Timeout is in milliseconds
     * @psalm-impure
     */
    public function receive(int $timeout = 0): ?Message;

    /**
     * Receives the next message if one is immediately available.
     * @psalm-impure
     */
    public function receiveNoWait(): ?Message;

    /**
     * Tell the MQ broker that the message was processed successfully.
     * @psalm-capabilities read-props
     */
    public function acknowledge(Message $message): void;

    /**
     * Tell the MQ broker that the message was rejected.
     * @psalm-impure
     */
    public function reject(Message $message, bool $requeue = false): void;
}