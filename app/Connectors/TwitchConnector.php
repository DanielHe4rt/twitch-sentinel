<?php

namespace App\Connectors;

/**
 * Greetz Erika Heidi
 */
class TwitchConnector
{
    protected object $socket;

    private static $host = "irc.chat.twitch.tv";
    private static $port = 6667;


    public function connect()
    {
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if (socket_connect($this->socket, self::$host, self::$port) === FALSE) {
            return null;
        }

        $this->authenticate();
        $this->setNick();
        $this->capabilities();
        $this->joinChannel('danielhe4rt');
    }

    private function authenticate()
    {
        $this->send(sprintf("PASS %s", '3123dasdas'));
    }

    private function setNick()
    {
        $this->send(sprintf("NICK %s", 'justinfan' . rand(1,99999)));
    }

    public function joinChannel($channel)
    {
        $this->send(sprintf("JOIN #%s", $channel));
    }

    public function getLastError()
    {
        return socket_last_error($this->socket);
    }

    public function isConnected()
    {
        return !is_null($this->socket);
    }

    public function read($size = 256)
    {
        if (!$this->isConnected()) {
            return null;
        }

        return socket_read($this->socket, $size);
    }

    public function send($message)
    {
        if (!$this->isConnected()) {
            return null;
        }

        return socket_write($this->socket, $message . "\n");
    }

    public function close()
    {
        socket_close($this->socket);
    }

    private function capabilities()
    {
        $this->send("CAP REQ twitch.tv/membership");
        $this->send("CAP REQ twitch.tv/tags");
    }
}
