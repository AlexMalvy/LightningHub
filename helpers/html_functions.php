<?php

if (!function_exists('generateHTMLTable')) {
    /**
     * Generate HTML table
     *
     * @param int $col
     * @param int $row
     * @return string
     */
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
}


if (!function_exists('e')) {
    /**
     * Escape HTML
     *
     * @param string $text
     * @return string
     */
    function e(string $text): string
    {
        return htmlspecialchars($text);
    }
}

if (!function_exists('ec')) {
    /**
     * Escape HTML and echo
     *
     * @param string $text
     * @return void
     */
    function ec(string $text): void
    {
        echo e($text);
    }

}