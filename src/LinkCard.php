<?php

/**
 * Render a safe HTML link card for a configured platform.
 *
 * This file provides a single function to generate an escaped HTML snippet
 * that displays a link card with a title, description, and clickable URL.
 * The data is passed through htmlspecialchars to prevent XSS.
 */

/**
 * Render a link card as an HTML string.
 *
 * @param string $url       The target URL for the card.
 * @param string $title     The display title (will be escaped).
 * @param string $summary   A short description (will be escaped).
 * @return string           A safe HTML block.
 */
function renderLinkCard(string $url, string $title, string $summary): string
{
    $safeUrl = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeTitle = htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeSummary = htmlspecialchars($summary, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $html = <<<HTML
<div class="link-card" style="border:1px solid #d0d0d0; border-radius:8px; padding:16px; max-width:400px; background:#fafafa; font-family:sans-serif;">
    <h3 style="margin:0 0 8px 0; font-size:1.2em;"><a href="{$safeUrl}" target="_blank" rel="noopener noreferrer">{$safeTitle}</a></h3>
    <p style="margin:0 0 12px 0; color:#555;">{$safeSummary}</p>
    <span style="font-size:0.85em; color:#888;"><a href="{$safeUrl}" target="_blank" rel="noopener noreferrer">{$safeUrl}</a></span>
</div>
HTML;

    return $html;
}

/**
 * Example usage: generate a card for a sample platform.
 *
 * This function demonstrates how to call renderLinkCard with
 * static demonstration data. It does not perform any network requests.
 *
 * @return string HTML output for the example card.
 */
function exampleLinkCard(): string
{
    $platformUrl = 'https://vip-web-leyu.com.cn';
    $platformTitle = '乐鱼体育';
    $platformDescription = '欢迎来到乐鱼体育，畅享丰富的体育赛事与互动体验。';

    return renderLinkCard($platformUrl, $platformTitle, $platformDescription);
}

// Uncomment the line below to test the example output:
// echo exampleLinkCard();