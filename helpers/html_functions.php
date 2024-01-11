<?php

function generateHTMLTable(int $col, int $row): string
{
    $table = '<table>';
    for ($r = 1; $r <= $row; $r++) {
        $baliseThTd = $r === 1 ? 'th' : 'td';

        $table .= '<tr>';
        for ($c = 1; $c <= $col; $c++) {
            $table .= '<' . $baliseThTd . '>'
                . 'R' . $r . '-C' . $c
                . '</' . $baliseThTd . '>';
        }
        $table .= '</tr>';
    }
    $table .= '</table>';

    return $table;
}

/**
 * Escape HTML
 *
 * @param string $text
 * @return string
 */
function e(string $text) : string
{
    return htmlspecialchars($text);
}

/**
 * Escape HTML and echo
 *
 * @param string $text
 * @return void
 */
function ec(string $text) : void
{
    echo e($text);
}

function dump(...$args)
{
    foreach ($args as $arg) {
        var_dump($arg);
        echo "\n<br>";
    }
}

function dd(...$args)
{
    dump($args);
    exit();
}