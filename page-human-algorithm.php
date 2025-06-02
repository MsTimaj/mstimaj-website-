<?php
/**
 * Template Name: Human Algorithm
 *
 * @package Mstimaj
 */

get_header();

// Get articles from database
global $wpdb;
$articles_table = $wpdb->prefix . 'human_algorithm_articles';

// Check for category filter
$category_filter = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';
$archive_month = isset($_GET['month']) ? sanitize_text_field($_GET['month']) : '';

// Build WHERE clause
$where_conditions = array("status = 'published'");
if ($category_filter) {
    $where_conditions[] = $wpdb->prepare("category = %s", $category_filter);
}
if ($archive_month && preg_match('/^\d{4}-\d{2}$/', $archive_month)) {
    $where_conditions[] = $wpdb->prepare("DATE_FORMAT(published_date, '%%Y-%%m') = %s", $archive_month);
}
$where_clause = implode(' AND ', $where_conditions);

// Pagination
$current_page = max(1, get_query_var('paged'));
$per_page = 9; // 1 featured + 8 regular per page
$offset = ($current_page - 1) * $per_page;

// Get total count for pagination
$total_articles = $wpdb->get_var("SELECT COUNT(*) FROM $articles_table WHERE $where_clause");
$total_pages = ceil($total_articles / $per_page);

// Get articles for current page
$articles = $wpdb->get_results($wpdb->prepare("
    SELECT * FROM $articles_table 
    WHERE $where_clause
    ORDER BY published_date DESC 
    LIMIT %d OFFSET %d
", $per_page, $offset));

// First article is featured on page 1 (only if no filters)
$featured_article = ($current_page == 1 && !empty($articles) && !$category_filter && !$archive_month) ? array_shift($articles) : null;

// Get category counts
$category_counts = $wpdb->get_results("
    SELECT category, COUNT(*) as count 
    FROM $articles_table 
    WHERE status = 'published' 
    GROUP BY category
");

// Get popular articles
$popular_articles = get_popular_articles(5);

// Get archive months
$archive_months = $wpdb->get_results("
    SELECT DISTINCT DATE_FORMAT(published_date, '%Y-%m') as month,
           DATE_FORMAT(published_date, '%M %Y') as month_name,
           COUNT(*) as count
    FROM $articles_table 
    WHERE status = 'published'
    GROUP BY month
    ORDER BY month DESC
");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Human Algorithm - Mstimaj</title>
    <meta name="description" content="Insights and reflections on technology, society, and human experience">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&family=Inter:wght@400;500;600&display=swap">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/mystyles.css">
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
</head>
<body>
    <!-- Matrix Rain Background -->
    <canvas id="matrix-bg" class="matrix-bg"></canvas>

    <header role="navigation" aria-label="Main navigation"></header>

    <main role="main">
        <section class="page-header" aria-labelledby="page-title">
            <div class="header-content">
                <h1 id="page-title">The Human Algorithm</h1>
                <p class="subtitle">A stream of consciousness in code and verse — where the digital and the emotional converge.</p>
                
                <?php if ($category_filter || $archive_month): ?>
                <div class="filter-notice" style="margin-top: 1rem; padding: 1rem; background: rgba(0, 255, 157, 0.1); border-radius: 4px;">
                    <?php if ($category_filter): 
                        $cat_names = array(
                            'soliloquies' => '✒️ Soliloquies in Motion',
                            'circuits' => '🧠 Thinking with Circuits', 
                            'fragments' => '🔮 Fragments of Tomorrow'
                        );
                    ?>
                        <p>Viewing: <strong><?php echo $cat_names[$category_filter] ?? $category_filter; ?></strong></p>
                    <?php endif; ?>
                    <?php if ($archive_month): 
                        $month_display = date('F Y', strtotime($archive_month . '-01'));
                    ?>
                        <p>Archive: <strong><?php echo $month_display; ?></strong></p>
                    <?php endif; ?>
                    <a href="<?php echo home_url('/human-algorithm/'); ?>" style="color: var(--accent);">← View all articles</a>
                </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="content-section" aria-labelledby="articles-title">
            <div class="content-container">
                <div class="articles-grid" role="list" aria-label="Article list">
                    <?php if ($featured_article && $current_page == 1): ?>
                    <!-- Featured Article: Takes up full width -->
                    <article class="article-card featured" role="listitem">
                        <div class="article-preview">
                            <?php if ($featured_article->featured_image): ?>
                                <img src="<?php echo esc_url($featured_article->featured_image); ?>" alt="<?php echo esc_attr($featured_article->title); ?>">
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/articles/default-featured.jpg" alt="Featured Article">
                            <?php endif; ?>
                            <div class="article-overlay">
                                <span class="article-category" aria-label="Article category">
                                    <?php if ($featured_article->is_ai_insight): ?>
                                        <span style="background: var(--accent); color: #000; padding: 2px 8px; border-radius: 3px; margin-right: 8px;">AI Insight</span>
                                    <?php endif; ?>
                                    <?php 
                                    $categories = array(
                                        'soliloquies' => '✒️ Soliloquies',
                                        'circuits' => '🧠 Circuits',
                                        'fragments' => '🔮 Fragments'
                                    );
                                    echo $categories[$featured_article->category] ?? 'Featured';
                                    ?>
                                </span>
                                <h3><?php echo esc_html($featured_article->title); ?></h3>
                                <p class="article-excerpt"><?php echo esc_html($featured_article->excerpt); ?></p>
                                <div class="article-meta">
                                    <span class="date" aria-label="Publication date"><?php echo date('F j, Y', strtotime($featured_article->published_date)); ?></span>
                                    <span class="read-time" aria-label="Reading time"><?php echo $featured_article->read_time; ?> min read</span>
                                </div>
                                <a href="<?php echo home_url('/human-algorithm/' . $featured_article->slug); ?>" class="read-more">Read Full Article</a>
                            </div>
                        </div>
                    </article>
                    <?php endif; ?>

                    <?php foreach ($articles as $article): ?>
                    <!-- Regular Article -->
                    <article class="article-card" role="listitem">
                        <div class="article-preview">
                            <?php if ($article->featured_image): ?>
                                <img src="<?php echo esc_url($article->featured_image); ?>" alt="<?php echo esc_attr($article->title); ?>">
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/articles/default-article.jpg" alt="Article Preview">
                            <?php endif; ?>
                            <div class="article-overlay">
                                <span class="article-category" aria-label="Article category">
                                    <?php if ($article->is_ai_insight): ?>
                                        <span style="background: var(--accent); color: #000; padding: 2px 8px; border-radius: 3px; margin-right: 8px;">AI</span>
                                    <?php endif; ?>
                                    <?php 
                                    $categories = array(
                                        'soliloquies' => '✒️ Soliloquies',
                                        'circuits' => '🧠 Circuits',
                                        'fragments' => '🔮 Fragments'
                                    );
                                    echo $categories[$article->category] ?? $article->category;
                                    ?>
                                </span>
                                <h3><?php echo esc_html($article->title); ?></h3>
                                <p class="article-excerpt"><?php echo esc_html($article->excerpt); ?></p>
                                <div class="article-meta">
                                    <span class="date" aria-label="Publication date"><?php echo date('M j, Y', strtotime($article->published_date)); ?></span>
                                    <span class="read-time" aria-label="Reading time"><?php echo $article->read_time; ?> min read</span>
                                </div>
                                <a href="<?php echo home_url('/human-algorithm/' . $article->slug); ?>" class="read-more">Read Full Article</a>
                            </div>
                        </div>
                    </article>
                    <?php endforeach; ?>

                    <?php if (empty($articles) && !$featured_article): ?>
                    <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 2rem;">
                        <p style="color: var(--text-secondary); font-size: 1.2rem;">No articles found. Try a different filter or check back soon!</p>
                    </div>
                    <?php endif; ?>
                </div>

                <?php if ($total_pages > 1): ?>
                <div class="pagination" role="navigation" aria-label="Article pagination">
                    <?php 
                    $base_url = home_url('/human-algorithm/');
                    $query_args = array();
                    if ($category_filter) $query_args['category'] = $category_filter;
                    if ($archive_month) $query_args['month'] = $archive_month;
                    
                    for ($i = 1; $i <= $total_pages; $i++): 
                        $page_url = $i > 1 ? $base_url . 'page/' . $i . '/' : $base_url;
                        if (!empty($query_args)) {
                            $page_url = add_query_arg($query_args, $page_url);
                        }
                    ?>
                        <?php if ($i == $current_page): ?>
                            <button class="pagination-btn active" aria-label="Page <?php echo $i; ?>" aria-current="page"><?php echo $i; ?></button>
                        <?php else: ?>
                            <a href="<?php echo $page_url; ?>" class="pagination-btn" aria-label="Page <?php echo $i; ?>"><?php echo $i; ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
                <?php endif; ?>
            </div>

            <aside class="sidebar" role="complementary" aria-label="Article sidebar">
                <div class="sidebar-section" aria-labelledby="categories-title">
                    <h3 id="categories-title">Categories</h3>
                    <ul class="archive-list" role="list">
                        <li role="listitem">
                            <a href="<?php echo home_url('/human-algorithm/?category=soliloquies'); ?>" 
                               <?php echo $category_filter === 'soliloquies' ? 'class="active" style="color: var(--accent);"' : ''; ?>>
                                ✒️ Soliloquies in Motion
                                <?php 
                                $count = 0;
                                foreach ($category_counts as $cat) {
                                    if ($cat->category == 'soliloquies') $count = $cat->count;
                                }
                                echo $count > 0 ? " ({$count})" : "";
                                ?>
                            </a>
                        </li>
                        <li role="listitem">
                            <a href="<?php echo home_url('/human-algorithm/?category=circuits'); ?>"
                               <?php echo $category_filter === 'circuits' ? 'class="active" style="color: var(--accent);"' : ''; ?>>
                                🧠 Thinking with Circuits
                                <?php 
                                $count = 0;
                                foreach ($category_counts as $cat) {
                                    if ($cat->category == 'circuits') $count = $cat->count;
                                }
                                echo $count > 0 ? " ({$count})" : "";
                                ?>
                            </a>
                        </li>
                        <li role="listitem">
                            <a href="<?php echo home_url('/human-algorithm/?category=fragments'); ?>"
                               <?php echo $category_filter === 'fragments' ? 'class="active" style="color: var(--accent);"' : ''; ?>>
                                🔮 Fragments of Tomorrow
                                <?php 
                                $count = 0;
                                foreach ($category_counts as $cat) {
                                    if ($cat->category == 'fragments') $count = $cat->count;
                                }
                                echo $count > 0 ? " ({$count})" : "";
                                ?>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="sidebar-section" aria-labelledby="support-title">
                    <h3 id="support-title">Support My Work</h3>
                    <div class="support-options" role="group" aria-label="Support options">
                        <a href="<?php echo home_url('/book-session/'); ?>" class="support-btn" aria-label="Book a Session">Book a Session</a>
                        <a href="<?php echo home_url('/courses/'); ?>" class="support-btn" aria-label="AI Video Courses">🎬 AI Video Courses</a>
                    </div>
                </div>

                <?php if (!empty($popular_articles)): ?>
                <div class="sidebar-section" aria-labelledby="popular-title">
                    <h3 id="popular-title">Popular Articles</h3>
                    <ul class="popular-list" role="list">
                        <?php foreach ($popular_articles as $article): ?>
                        <li role="listitem">
                            <a href="<?php echo home_url('/human-algorithm/' . $article->slug); ?>">
                                <span class="article-title"><?php echo esc_html($article->title); ?></span>
                                <span class="views"><?php echo $article->view_count > 999 ? number_format($article->view_count / 1000, 1) . 'k' : $article->view_count; ?> views</span>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <div class="sidebar-section" aria-labelledby="archive-title">
                    <h3 id="archive-title">Archives</h3>
                    <ul class="archive-list" role="list">
                        <?php foreach ($archive_months as $month): ?>
                        <li role="listitem">
                            <a href="<?php echo home_url('/human-algorithm/?month=' . $month->month); ?>"
                               <?php echo $archive_month === $month->month ? 'class="active" style="color: var(--accent);"' : ''; ?>>
                                <?php echo $month->month_name; ?> (<?php echo $month->count; ?>)
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </aside>
        </section>

        <!-- Category Descriptions -->
        <section class="content-section" aria-labelledby="categories-description-title">
            <div class="content-container">
                <h2 id="categories-description-title" style="margin-bottom: 2rem; text-align: center;">Categories</h2>
                <div class="category-descriptions" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem;" role="list" aria-label="Category descriptions">
                    <div class="category-item" style="background: rgba(0, 0, 0, 0.3); padding: 2rem; border-radius: 8px; border: 1px solid rgba(0, 255, 157, 0.1);" role="listitem">
                        <h3>✒️ Soliloquies in Motion</h3>
                        <p>Short prose, poetry, and meditative writing. Sometimes rhythmic, always resonant.</p>
                    </div>
                    <div class="category-item" style="background: rgba(0, 0, 0, 0.3); padding: 2rem; border-radius: 8px; border: 1px solid rgba(0, 255, 157, 0.1);" role="listitem">
                        <h3>🧠 Thinking with Circuits</h3>
                        <p>Observing AI through a human lens. How it mimics and misses the human. Tool reviews, insights, and explorations of AI like Cursor, Claude, Hedra, and more.</p>
                        <p style="margin-top: 0.5rem; font-size: 0.9em; color: var(--accent);">🔍 Look for the "AI Insight" badge on these articles!</p>
                    </div>
                    <div class="category-item" style="background: rgba(0, 0, 0, 0.3); padding: 2rem; border-radius: 8px; border: 1px solid rgba(0, 255, 157, 0.1);" role="listitem">
                        <h3>🔮 Fragments of Tomorrow</h3>
                        <p>Writing on future trends, ideas, random wonderings and open thoughts.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="<?php echo get_template_directory_uri(); ?>/js/shared.js"></script>
</body>
</html>

<?php get_footer(); ?> 