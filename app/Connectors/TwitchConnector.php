<?php

namespace App\Connectors;

/**
 * Greetz Erika Heidi
 */
class TwitchConnector
{
    protected $socket;

    private static $host = "irc.chat.twitch.tv";
    private static $port = 6667;


    public function connect($chats = ['danielhe4rt'])
    {
        $this->socket = fsockopen('irc.chat.twitch.tv', 6667, $errno, $errstr, 60);

        $this->authenticate();
        $this->setNick();
        $this->capabilities();
        $this->joinChannel($chats);
    }

    private function authenticate(): void
    {
        $this->send("PASS", "fodase");
    }

    private function setNick()
    {
        $this->send("NICK", 'justinfan' . rand(1, 99999));
    }

    public function joinChannel(array $channels): void
    {
        foreach ($channels as $channel) {
            $this->send("JOIN", "#" . $channel);
        }
    }

    public function getLastError()
    {
        return socket_last_error($this->socket);
    }

    public function isConnected()
    {
        return !is_null($this->socket);
    }

    public function read()
    {

        return fgets($this->socket);
    }

    public function send(string $command, string $message): void
    {
        if (empty($message)) {
            fputs($this->socket, $command . '\r\n');
        } else {
            $message = trim($message);
            fputs($this->socket, "$command $message\r\n");
        }
    }

    public function close()
    {
        socket_close($this->socket);
    }

    private function capabilities()
    {
        $this->send("CAP REQ", "twitch.tv/membership");
        $this->send("CAP REQ", "twitch.tv/tags");
    }
}
