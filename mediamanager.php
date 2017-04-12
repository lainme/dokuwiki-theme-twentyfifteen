<?php
/**
 * DokuWiki Twenty Fifteen Template
 *
 * @link     https://github.com/lainme/dokuwiki-theme-twentyfifteen
 * @author   Anika Henke <anika@selfthinker.org> (upstream)
 * @author   lainme <lainme993@gmail.com>
 * @license  GPLv2 (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
header('X-UA-Compatible: IE=edge,chrome=1');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang'] ?>" lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title><?php echo hsc($lang['mediaselect'])?> [<?php echo strip_tags($conf['title'])?>]</title>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata:n,b|Noto+Sans:n,b,i,bi|Noto+Serif:n,b,i,bi" type="text/css" media="all"/>
    <?php tpl_metaheaders() ?>
    <?php tpl_includeFile('meta.html') ?>
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
</head>
<body>
    <div id="media__manager" class="dokuwiki">
        <?php html_msgarea() ?>
        <div id="mediamgr__aside"><div class="pad">
            <h1><?php echo hsc($lang['mediaselect'])?></h1>

            <?php /* keep the id! additional elements are inserted via JS here */?>
            <div id="media__opts"></div>

            <?php tpl_mediaTree() ?>
        </div></div>

        <div id="mediamgr__content"><div class="pad">
            <?php tpl_mediaContent() ?>
        </div></div>
    </div>
</body>
</html>
