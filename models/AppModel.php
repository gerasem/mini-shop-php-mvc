<?php


class AppModel
{
    /**
     * generate alias (slug) from string
     * @param $text
     * @param string $divider
     * @return false|string|string[]|null
     */
    public static function generateSlug($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    /**
     * check alias (slug) duplicate
     * @param $alias
     * @return bool
     */
    public static function aliasDuplicate($alias, $table)
    {
        $table = trim(stripslashes(htmlspecialchars($table)));
        if (R::find($table, 'alias = ?', [$alias])) {
            return true;
        } else {
            return false;
        }
    }

    /**

     * select if from items where alias is **
     * @param $slug
     * @return string
     */
    public static function getIdFromSlug($slug, $table)
    {
        $table = trim(stripslashes(htmlspecialchars($table)));
        return R::getCell("SELECT id FROM {$table} WHERE alias = ?", [$slug]);
    }
}