<?php
/**
 * DokuWiki Twenty Fifteen Template
 *
 * @link     https://github.com/lainme/dokuwiki-theme-twentyfifteen
 * @author   Anika Henke <anika@selfthinker.org> (upstream)
 * @author   Andreas Gohr <andi@splitbrain.org> (upstream)
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
    <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata:n,b|Noto+Sans:n,b,i,bi|Noto+Serif:n,b,i,bi" type="text/css" media="all"/>
    <?php tpl_metaheaders() ?>
    <?php tpl_includeFile('meta.html') ?>
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
</head>
<body class="<?php echo tpl_classes(); ?> detail-page">
    <div id="dokuwiki__detail">
        <?php html_msgarea() ?>

        <?php if($ERROR): print $ERROR; ?>
        <?php else: ?>

            <h1><?php echo hsc(tpl_img_getTag('IPTC.Headline', $IMG))?></h1>

            <div class="content">
                <?php tpl_img(900, 700); ?>

                <div class="img_detail">
                    <h2><?php print nl2br(hsc(tpl_img_getTag('simple.title'))); ?></h2>

                    <?php tpl_img_meta(); ?>
                    <?php //Comment in for Debug// dbg(tpl_img_getTag('Simple.Raw')); ?>
                </div>
                <div class="clearer"></div>
            </div><!-- /.content -->

            <p class="back">
                <?php tpl_action('mediaManager', 1) ?><br />
                <?php tpl_action('img_backto', 1, 0, 0, '<span class="genericon genericon-leftarrow"></span>') ?>
            </p>

        <?php endif; ?>
    </div>
</body>
</html>
