<?php

namespace App\Service;

/**
 * Class TextService
 * @package App
 */
class TextService
{
    /**
     * Wiki Regexp
     * @var array
     */
    private $regexWikiToHTML = [
        'bold' => [
            'pattern' => '/\*\*(.*?)\\*\*/s',
            'replace' => '<b>$1</b>',
        ],
        'italic' => [
            'pattern' => '/\\\\\\\\(.*?)\\\\\\\\/s',
            'replace' => '<i>$1</i>',
        ],
        'link' => [
            'pattern' => '/\(\((.*?)\s(.*?)\)\)/s',
            'replace' => '<a href="$1">$2</a>',
        ],
    ];

    /**
     * HTML Regexp
     * @var array
     */
    private $regexHTMLToWiki = [
        'bold' => [
            'pattern' => '/<b>(.*?)<\/b>/s',
            'replace' => '**$1**',
        ],
        'italic' => [
            'pattern' => '/<i>(.*?)<\/i>/s',
            'replace' => '\\\\\\\\$1\\\\\\\\',
        ],
        'link' => [
            'pattern' => '/<a href="(.*?)">(.*?)<\/a>/s',
            'replace' => '(($1 $2))',
        ],
    ];

    /**
     * Convert string from wiki to html
     *
     * @param string $text
     * @return string
     */
    public function convertToHTML(string $text) : string
    {
        foreach ($this->regexWikiToHTML as $code) {
            $text = preg_replace($code['pattern'], $code['replace'], $text);
        }
        return $text;
    }

    /**
     * Convert wiki from html to wiki
     *
     * @param string $text
     * @return string
     */
    public function convertToWiki(string $text) : string
    {
        foreach ($this->regexHTMLToWiki as $code) {
            $text = preg_replace($code['pattern'], $code['replace'], $text);
        }
        return $text;
    }
}