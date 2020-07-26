<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/5/24
 * Time: 下午2:58
 */

namespace EasySwoole\Http\Message;


use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\StreamInterface;

class Message implements MessageInterface
{
    private $protocolVersion = '1.1';
    private $headers = [];
    private $body;

    function __construct(array $headers = null,Stream $body = null,$protocolVersion = '1.1')
    {
        if($headers != null){
            $this->headers = $headers;
        }
        if($body != null){
            $this->body = $body;
        }
        $this->protocolVersion = $protocolVersion;
    }

    public function getProtocolVersion()
    {
        // TODO: Implement getProtocolVersion() method.
        return $this->protocolVersion;
    }

    public function withProtocolVersion($version)
    {
        // TODO: Implement withProtocolVersion() method.
        if($this->protocolVersion === $version){
            return $this;
        }
        $this->protocolVersion = $version;
        return $this;
    }

    public function getHeaders()
    {
        // TODO: Implement getHeaders() method.
        return $this->headers;
    }

    public function hasHeader($name)
    {
        // TODO: Implement hasHeader() method.
        $name = strtolower($name);
        return array_key_exists($name,$this->headers);
    }

    public function getHeader($name)
    {
        // TODO: Implement getHeader() method.
        $name = strtolower($name);
        if(array_key_exists($name,$this->headers)){
            return $this->headers[$name];
        }else{
            return array();
        }
    }

    public function getHeaderLine($name)
    {
        // TODO: Implement getHeaderLine() method.
        $name = strtolower($name);
        if(array_key_exists($name,$this->headers)){
            return implode("; ",$this->headers[$name]);
        }else{
            return '';
        }
    }

    public function withHeader($name, $value)
    {
        // TODO: Implement withHeader() method.
        $name = strtolower($name);
        if(!is_array($value)){
            $value = [$value];
        }
        if(isset($this->headers[$name]) &&  $this->headers[$name] === $value){
            return $this;
        }
        $this->headers[$name] = $value;
        return $this;
    }

    public function withAddedHeader($name, $value)
    {
        // TODO: Implement withAddedHeader() method.
        $name = strtolower($name);
        if(!is_array($value)){
            $value = [$value];
        }
        if(isset($this->headers[$name])){
            $this->headers[$name] =  array_merge($this->headers[$name], $value);
        }else{
            $this->headers[$name] = $value;
        }
        return $this;
    }

    public function withoutHeader($name)
    {
        // TODO: Implement withoutHeader() method.
        $name = strtolower($name);
        if(isset($this->headers[$name])){
            unset($this->headers[$name]);
            return $this;
        }else{
            return $this;
        }
    }

    public function getBody()
    {
        // TODO: Implement getBody() method.
        if($this->body == null){
            $this->body = new Stream('');
        }
        return $this->body;
    }

    public function withBody(StreamInterface $body)
    {
        // TODO: Implement withBody() method.
        $this->body = $body;
        return $this;
    }
}
