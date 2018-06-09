<?php
/**
 * DokuWiki Twenty Fifteen Template
 *
 * @link     https://github.com/lainme/dokuwiki-theme-twentyfifteen
 * @author   Anika Henke <anika@selfthinker.org> (upstream)
 * @author   Clarence Lee <clarencedglee@gmail.com> (upstream)
 * @author   WordPress.org & Automattic.com (upstream)
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
<body id="dokuwiki__top" class="<?php echo tpl_classes(); ?>">
<div class="site">
    <div class="sidebar">
        <header class="site-header">
            <div class="site-branding">
                <?php
                    $logoSize = array();
                    $logo = tpl_getMediaFile(array(':wiki:logo.png', ':logo.png', 'images/logo.png'), false, $logoSize);
                    tpl_link(wl(), '<img src="'.$logo.'" '.$logoSize[3].' alt="" />', 'class="site-logo" accesskey="h" title="[H]"');
                ?>
                <h1 class="site-title">
                    <a href="<?php echo wl(); ?>" rel="home" accesskey="h" title="[H]"><?php echo $conf['title']; ?></a>
                </h1>
                <?php if ($conf['tagline']): ?><p class="site-description"><?php echo $conf['tagline'] ?></p><?php endif ?>
                <button class="secondary-toggle">Menu</button>
            </div>
        </header>
        <div class="secondary">
            <div class="widget-area">
                <aside class="widget">
                    <?php tpl_searchform() ?>
                </aside>
                <?php if ($conf['sidebar']): ?>
                <aside class="widget">
                    <?php tpl_include_page($conf['sidebar'], 1, 1) ?>
                </aside>
                <?php endif ?>
                <aside class="widget">
                    <h2><?php echo $lang['site_tools'] ?></h3>
                    <ul><?php echo (new \dokuwiki\Menu\SiteMenu())->getListItems('', false); ?></ul>
                </aside>
                <aside class="widget">
                    <h2><?php echo $lang['page_tools'] ?></h3>
                    <ul><?php echo (new \dokuwiki\Menu\PageMenu())->getListItems('', false); ?></ul>
                </aside>
                <?php if ($conf['useacl']): ?>
                <aside class="widget">
                    <h2><?php echo $lang['user_tools'] ?></h3>
                    <ul><?php echo (new \dokuwiki\Menu\UserMenu())->getListItems('', false); ?></ul>
                    <?php if (!empty($_SERVER['REMOTE_USER'])) {
                        echo '<p>';
                        tpl_userinfo();
                        echo '</p>';
                        }
                    ?>
                </aside>
                <?php endif ?>
                <aside class="widget">
                    <?php tpl_license('button') ?>
                </aside>
            </div>
	</div>
    </div>
    <div class="site-content">
        <main class="site-main">
            <?php if($conf['breadcrumbs'] || $conf['youarehere']){ ?>
            <article class="entry entry-navigation">
                <div class="entry-content">
                    <?php if($conf['breadcrumbs']){ ?>
                    <div><?php tpl_breadcrumbs() ?></div>
                    <?php } ?>
                    <?php if($conf['youarehere']){ ?>
                    <div><?php tpl_youarehere() ?></div>
                    <?php } ?>
                </div>
            </article>
            <?php } ?>
            <article id="twentyfifteen__entry" class="entry">
                <div id="twentyfifteen__entry-content" class="entry-content">
                    <?php tpl_flush() ?>
                    <?php html_msgarea() ?>
                    <!-- wikipage start -->
                    <?php tpl_content() ?>
                    <!-- wikipage stop -->
                    <?php tpl_flush() ?>
                </div>
            </article>
        </main>
    </div>
    <footer class="site-footer">
        <div class="site-info"><?php tpl_pageinfo() ?></div>
    </footer>
    <div class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>
</div>
</body>
</html>
