<?php

namespace HieuLe\Favicon;

/**
 * Output HTML tags based on a config
 *
 * @author Hieu Le <letrunghieu.cse09@gmail.com>
 */
class Html
{

    /**
     * Write meta and link tags
     * 
     * @param bool $noOldApple exclude old apple touch link
     * @param bool $noAndroid exclude android manifest.json file
     * @param bool $noMs exclude msapplication meta tags
     * @param tring $tileColor the color of Windows tile
     * @param string $browserConfigFile the path to browserconfig.xml file or null to disable this
     * @param string $appName the name of application when pinned
     * 
     * @return string 
     */
    public static function output($noOldApple = false, $noAndroid = false, $noMs = false, $tileColor = '#FFFFFF', $browserConfigFile = '', $appName = '', $prefixPath = '')
    {
        $result = array();
        if (!$noMs)
        {
            if (!$browserConfigFile)
            {
                $result[] = '<meta name="msapplication-config" content="none" />';
            }
            else
            {
                $result[] = '<meta name="msapplication-config" content="' . $prefixPath . '/' . $browserConfigFile . '" />';
            }
        }
        if (!$noOldApple)
        {
            $result[] = '<link rel="apple-touch-icon" sizes="57x57" href="' . $prefixPath . '/apple-touch-icon-57x57.png" />';
            $result[] = '<link rel="apple-touch-icon" sizes="60x60" href="' . $prefixPath . '/apple-touch-icon-60x60.png" />';
            $result[] = '<link rel="apple-touch-icon" sizes="72x72" href="' . $prefixPath . '/apple-touch-icon-72x72.png" />';
            $result[] = '<link rel="apple-touch-icon" sizes="114x114" href="' . $prefixPath . '/apple-touch-icon-114x114.png" />';
        }
        $result[] = '<link rel="apple-touch-icon" sizes="76x76" href="' . $prefixPath . '/apple-touch-icon-76x76.png" />';
        $result[] = '<link rel="apple-touch-icon" sizes="120x120" href="' . $prefixPath . '/apple-touch-icon-120x120.png" />';
        $result[] = '<link rel="apple-touch-icon" sizes="152x152" href="' . $prefixPath . '/apple-touch-icon-152x152.png" />';
        $result[] = '<link rel="apple-touch-icon" sizes="180x180" href="' . $prefixPath . '/apple-touch-icon-180x180.png" />';
        $result[] = '<link rel="icon" type="image/png" href="' . $prefixPath . '/favicon-32x32.png" sizes="32x32" />';
        $result[] = '<link rel="icon" type="image/png" href="' . $prefixPath . '/android-chrome-192x192.png" sizes="192x192" />';
        $result[] = '<link rel="icon" type="image/png" href="' . $prefixPath . '/favicon-16x16.png" sizes="16x16" />';
        if (!$noAndroid)
        {
            $result[] = '<link rel="manifest" href="' . $prefixPath . '/manifest.json" />';
        }
        if (!$noMs)
        {
            if ($appName)
            {
                $result[] = '<meta name="application-name" content="' . $appName . '" />';
            }
            $result[] = '<meta name="msapplication-TileColor" content="' . $tileColor . '" />';
            $result[] = '<meta name="msapplication-TileImage" content="' . $prefixPath . '/mstile-144x144.png" />';
            $result[] = '<meta name="msapplication-square70x70logo" content="' . $prefixPath . '/mstile-70x70.png" />';
            $result[] = '<meta name="msapplication-square150x150logo" content="' . $prefixPath . '/mstile-150x150.png" />';
            $result[] = '<meta name="msapplication-wide310x150logo" content="' . $prefixPath . '/mstile-310x150.png" />';
            $result[] = '<meta name="msapplication-square310x310logo" content="' . $prefixPath . '/mstile-310x310.png" />';
        }

        return implode("\n", $result);
    }

}
