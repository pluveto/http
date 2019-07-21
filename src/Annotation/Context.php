<?php


namespace EasySwoole\Http\Annotation;

use EasySwoole\Annotation\AnnotationTagInterface;

/**
 * Class Context
 * @package EasySwoole\Http\Annotation
 * @Annotation
 */
final class Context implements AnnotationTagInterface
{
    /**
     * @var string
     */
    public $key;

    public function tagName(): string
    {
        return 'Context';
    }

    public function aliasMap(): array
    {
        return [static::class];
    }

    public function assetValue(?string $raw)
    {
        parse_str($raw,$str);
        if(!empty($str['key'])){
            $this->key = trim($str['key']," \t\n\r\0\x0B\"'");
        }
    }
}