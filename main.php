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
    <!--calc is broken when minimized by Dokuwiki-->
    <style>
        /*Desktop X-Large 1403px*/
        @media screen and (min-width: 87.6875em) {
            body:before {
                width: -webkit-calc(50% - 289px);
                width: calc(50% - 289px);
            }
        }
    </style>
</head>
<body id="dokuwiki__top" class="<?php echo tpl_classes(); ?>">
<div class="site">
    <div class="sidebar">
        <header class="site-header">
            <div class="site-branding">
                <?php
                    $logo = tpl_getMediaFile(array(':wiki:logo.png', ':logo.png', 'images/logo.png'), false);
                ?>
                <?php if ($logo) { ?>
                <a class="site-logo" href="<?php echo wl(); ?>" title="<?php echo $conf['title']; ?>" rel="home" accesskey="h" title="[H]">
                    <img src="<?php echo $logo; ?>" alt=""/>
                </a>
                <?php } ?>
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
                    <ul>
                        <?php tpl_toolsevent('sitetools', array(
                            'recent' => tpl_action('recent', 1, 'li', 1),
                            'media'  => tpl_action('media', 1, 'li', 1),
                            'index'  => tpl_action('index', 1, 'li', 1),
                        )); ?>
                    </ul>
                </aside>
                <aside class="widget">
                    <h2><?php echo $lang['page_tools'] ?></h3>
                    <ul>
                        <?php tpl_toolsevent('pagetools', array(
                            'edit'      => tpl_action('edit', 1, 'li', 1),
                            'revisions' => tpl_action('revisions', 1, 'li', 1),
                            'backlink'  => tpl_action('backlink', 1, 'li', 1),
                            'subscribe' => tpl_action('subscribe', 1, 'li', 1),
                            'revert'    => tpl_action('revert', 1, 'li', 1),
                            'top'       => tpl_action('top', 1, 'li', 1),
                        )); ?>
                    </ul>
                </aside>
                <?php if ($conf['useacl']): ?>
                <aside class="widget">
                    <h2><?php echo $lang['user_tools'] ?></h3>
                    <ul>
                        <?php tpl_toolsevent('usertools', array(
                            'admin'    => tpl_action('admin', 1, 'li', 1),
                            'profile'  => tpl_action('profile', 1, 'li', 1),
                            'register' => tpl_action('register', 1, 'li', 1),
                            'login'    => tpl_action('login', 1, 'li', 1),
                        )); ?>
                    </ul>
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
