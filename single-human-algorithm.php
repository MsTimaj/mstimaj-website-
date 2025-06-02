<?php
/**
 * Template for displaying single Human Algorithm articles
 *
 * @package Mstimaj
 */

// Get article from URL
$request_uri = $_SERVER['REQUEST_URI'];
$slug_match = array();
if (preg_match('/\/human-algorithm\/([^\/]+)\/?$/', $request_uri, $slug_match)) {
    $article_slug = $slug_match[1];
    
    global $wpdb;
    $articles_table = $wpdb->prefix . 'human_algorithm_articles';
    $article = $wpdb->get_row($wpdb->prepare("
        SELECT * FROM $articles_table 
        WHERE slug = %s AND status = 'published'
    ", $article_slug));
    
    if (!$article) {
        wp_redirect(home_url('/human-algorithm/'));
        exit;
    }
    
    // Increment view count
    $wpdb->query($wpdb->prepare("
        UPDATE $articles_table 
        SET view_count = view_count + 1 
        WHERE id = %d
    ", $article->id));
} else {
    wp_redirect(home_url('/human-algorithm/'));
    exit;
}

get_header();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&family=Inter:wght@400;500;600&display=swap">
    <title><?php echo esc_html($article->title); ?> | Mstimaj</title>
    <meta name="description" content="<?php echo esc_attr($article->meta_description ?: $article->excerpt); ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/mystyles.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/article.css">
</head>
<body>
    <!-- Matrix Rain Background -->
    <canvas id="matrix-bg" class="matrix-bg"></canvas>

    <header role="navigation" aria-label="Main navigation"></header>

    <main class="article-container">
        <nav class="article-nav" aria-label="Article navigation">
            <a href="<?php echo home_url('/human-algorithm/'); ?>" class="back-link">
                <span class="back-arrow">←</span>
                Back to Human Algorithm
            </a>
        </nav>
        
        <article class="article-content">
            <header class="article-header">
                <h1><?php echo esc_html($article->title); ?></h1>
                <div class="article-meta">
                    <span class="article-category">
                        <?php if ($article->is_ai_insight): ?>
                            <span style="background: var(--accent); color: #000; padding: 2px 8px; border-radius: 3px; margin-right: 8px;">AI Insight</span>
                        <?php endif; ?>
                        <?php 
                        $categories = array(
                            'soliloquies' => '✒️ Soliloquies in Motion',
                            'circuits' => '🧠 Thinking with Circuits',
                            'fragments' => '🔮 Fragments of Tomorrow'
                        );
                        echo $categories[$article->category] ?? $article->category;
                        ?>
                    </span>
                    <span class="article-date"><?php echo date('F j, Y', strtotime($article->published_date)); ?></span>
                    <span class="read-time"><?php echo $article->read_time; ?> min read</span>
                </div>
                
                <div class="article-author">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Version_3_transperant.png" alt="Mstimaj" class="author-avatar">
                    <div class="author-info">
                        <span class="author-name">Mstimaj</span>
                        <span class="author-title">Digital Creative & Tech Explorer</span>
                    </div>
                </div>
            </header>

            <?php if ($article->featured_image): ?>
            <div class="article-hero">
                <img src="<?php echo esc_url($article->featured_image); ?>" alt="<?php echo esc_attr($article->title); ?>">
            </div>
            <?php endif; ?>

            <div class="article-text">
                <?php echo wp_kses_post($article->content); ?>
            </div>

            <div class="article-footer">
                <?php if ($article->is_ai_insight): ?>
                <div class="article-tags">
                    <span class="tag">AI Tool Review</span>
                    <span class="tag">Tech Insights</span>
                    <?php if (strpos(strtolower($article->content), 'cursor') !== false): ?>
                        <span class="tag">Cursor</span>
                    <?php endif; ?>
                    <?php if (strpos(strtolower($article->content), 'claude') !== false): ?>
                        <span class="tag">Claude</span>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                
                <div class="article-share">
                    <h3>Share this article</h3>
                    <div class="share-buttons">
                        <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode($article->title); ?>&url=<?php echo urlencode(home_url('/human-algorithm/' . $article->slug)); ?>" target="_blank" class="share-btn">X (Twitter)</a>
                        <a href="https://bsky.app/intent/compose?text=<?php echo urlencode($article->title . ' ' . home_url('/human-algorithm/' . $article->slug)); ?>" target="_blank" class="share-btn">Bluesky</a>
                        <a href="https://www.threads.net/intent/post?text=<?php echo urlencode($article->title . ' ' . home_url('/human-algorithm/' . $article->slug)); ?>" target="_blank" class="share-btn">Threads</a>
                        <a href="https://reddit.com/submit?url=<?php echo urlencode(home_url('/human-algorithm/' . $article->slug)); ?>&title=<?php echo urlencode($article->title); ?>" target="_blank" class="share-btn">Reddit</a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(home_url('/human-algorithm/' . $article->slug)); ?>" target="_blank" class="share-btn">LinkedIn</a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(home_url('/human-algorithm/' . $article->slug)); ?>" target="_blank" class="share-btn">Facebook</a>
                    </div>
                </div>
                
                <div class="article-cta" style="background: rgba(0, 255, 157, 0.1); padding: 2rem; border-radius: 8px; margin: 3rem 0; text-align: center;">
                    <h3 style="color: var(--accent); margin-bottom: 1rem;">Inspired by this article?</h3>
                    <p style="margin-bottom: 1.5rem;">Book a session to explore these ideas together, learn the tools I use, or build your own digital space.</p>
                    <a href="<?php echo home_url('/connect/#services'); ?>" class="btn-primary" style="display: inline-block; background: var(--accent); color: #000; padding: 0.75rem 2rem; text-decoration: none; border-radius: 4px; font-weight: bold;">Book a Creative Session</a>
                </div>
                
                <!-- Newsletter Signup -->
                <div class="newsletter-cta" style="background: rgba(10, 10, 15, 0.8); border: 1px solid rgba(0, 255, 157, 0.3); padding: 2.5rem; border-radius: 8px; margin: 3rem 0; text-align: center;">
                    <h3 style="color: var(--accent); margin-bottom: 1rem;">📧 Stay in the Algorithm</h3>
                    <p style="margin-bottom: 1.5rem; color: var(--text-secondary);">Get weekly insights on AI tools, creative technology, and human perspectives. No spam, just thoughtful content.</p>
                    <form id="article-newsletter-form" style="max-width: 400px; margin: 0 auto;">
                        <div class="newsletter-form-message" style="display: none; padding: 1rem; margin-bottom: 1rem; border-radius: 4px;"></div>
                        <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
                            <input type="email" name="email" placeholder="your@email.com" required 
                                   style="flex: 1; padding: 0.75rem; background: rgba(0, 0, 0, 0.3); border: 1px solid rgba(0, 255, 157, 0.2); border-radius: 4px; color: var(--text);">
                            <button type="submit" style="background: var(--accent); color: #000; padding: 0.75rem 1.5rem; border: none; border-radius: 4px; font-weight: bold; cursor: pointer;">Subscribe</button>
                        </div>
                        <p style="font-size: 0.85rem; color: var(--text-secondary); margin: 0;">Join <?php 
                            global $wpdb;
                            $subscriber_count = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}newsletter_subscribers WHERE is_subscribed = 1");
                            echo $subscriber_count;
                        ?> other curious minds. Unsubscribe anytime.</p>
                    </form>
                </div>
            </div>

            <!-- Related Articles -->
            <?php
            $related_articles = $wpdb->get_results($wpdb->prepare("
                SELECT * FROM $articles_table 
                WHERE category = %s 
                AND id != %d 
                AND status = 'published' 
                ORDER BY published_date DESC 
                LIMIT 3
            ", $article->category, $article->id));
            
            if (!empty($related_articles)):
            ?>
            <section class="related-articles" style="margin-top: 4rem;">
                <h2 style="color: var(--accent); margin-bottom: 2rem;">More from <?php echo $categories[$article->category]; ?></h2>
                <div class="articles-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem;">
                    <?php foreach ($related_articles as $related): ?>
                    <article class="article-card">
                        <a href="<?php echo home_url('/human-algorithm/' . $related->slug); ?>" style="text-decoration: none; color: inherit;">
                            <?php if ($related->featured_image): ?>
                                <img src="<?php echo esc_url($related->featured_image); ?>" alt="<?php echo esc_attr($related->title); ?>" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
                            <?php endif; ?>
                            <h3 style="margin: 1rem 0; color: var(--text);"><?php echo esc_html($related->title); ?></h3>
                            <p style="color: var(--text-secondary);"><?php echo esc_html($related->excerpt); ?></p>
                            <span style="color: var(--accent); font-size: 0.9rem;">Read more →</span>
                        </a>
                    </article>
                    <?php endforeach; ?>
                </div>
            </section>
            <?php endif; ?>
            
            <!-- Comments Section -->
            <?php
            $comments_table = $wpdb->prefix . 'human_algorithm_comments';
            $comments = $wpdb->get_results($wpdb->prepare("
                SELECT * FROM $comments_table 
                WHERE article_id = %d AND status = 'approved'
                ORDER BY comment_date DESC
            ", $article->id));
            $comment_count = count($comments);
            ?>
            <section class="comments-section" id="comments">
                <h2>Comments (<?php echo $comment_count; ?>)</h2>
                
                <form class="comment-form" id="article-comment-form">
                    <h3>Join the discussion</h3>
                    <div class="comment-form-message" style="display: none; padding: 1rem; margin-bottom: 1rem; border-radius: 4px;"></div>
                    <textarea name="comment_text" placeholder="Share your thoughts..." required></textarea>
                    <div class="form-row">
                        <input type="text" name="author_name" placeholder="Your name" required>
                        <input type="email" name="author_email" placeholder="Your email (not published)" required>
                    </div>
                    <input type="hidden" name="article_id" value="<?php echo $article->id; ?>">
                    <button type="submit">Post Comment</button>
                </form>
                
                <div class="comments-list">
                    <?php if (!empty($comments)): ?>
                        <?php foreach ($comments as $comment): ?>
                        <div class="comment">
                            <div class="comment-content">
                                <div class="comment-header">
                                    <span class="comment-author"><?php echo esc_html($comment->author_name); ?></span>
                                    <span class="comment-date"><?php echo date('F j, Y', strtotime($comment->comment_date)); ?></span>
                                </div>
                                <p><?php echo nl2br(esc_html($comment->comment_text)); ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="no-comments">Be the first to comment!</p>
                    <?php endif; ?>
                </div>
            </section>
        </article>
    </main>

    <?php get_footer(); ?>

    <script src="<?php echo get_template_directory_uri(); ?>/js/shared.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initMatrixRain();
            loadSharedHeader();
            loadSharedFooter();
            initNavigation();
            
            // Handle comment form submission
            const commentForm = document.getElementById('article-comment-form');
            if (commentForm) {
                commentForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const submitBtn = this.querySelector('button[type="submit"]');
                    const messageDiv = this.querySelector('.comment-form-message');
                    const originalText = submitBtn.textContent;
                    
                    submitBtn.textContent = 'Posting...';
                    submitBtn.disabled = true;
                    
                    const formData = new FormData(this);
                    formData.append('action', 'post_article_comment');
                    formData.append('nonce', '<?php echo wp_create_nonce("article_comment_nonce"); ?>');
                    
                    fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            messageDiv.style.display = 'block';
                            messageDiv.style.background = 'rgba(0, 255, 157, 0.1)';
                            messageDiv.style.color = 'var(--accent)';
                            messageDiv.textContent = data.data;
                            commentForm.reset();
                            
                            // Reload page after 2 seconds to show new comment
                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);
                        } else {
                            messageDiv.style.display = 'block';
                            messageDiv.style.background = 'rgba(255, 0, 0, 0.1)';
                            messageDiv.style.color = '#ff0000';
                            messageDiv.textContent = data.data;
                        }
                    })
                    .catch(error => {
                        messageDiv.style.display = 'block';
                        messageDiv.style.background = 'rgba(255, 0, 0, 0.1)';
                        messageDiv.style.color = '#ff0000';
                        messageDiv.textContent = 'Error posting comment. Please try again.';
                    })
                    .finally(() => {
                        submitBtn.textContent = originalText;
                        submitBtn.disabled = false;
                    });
                });
            }
            
            // Handle newsletter form submission
            const newsletterForm = document.getElementById('article-newsletter-form');
            if (newsletterForm) {
                newsletterForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const submitBtn = this.querySelector('button[type="submit"]');
                    const messageDiv = this.querySelector('.newsletter-form-message');
                    const originalText = submitBtn.textContent;
                    
                    submitBtn.textContent = 'Subscribing...';
                    submitBtn.disabled = true;
                    
                    const formData = new FormData(this);
                    formData.append('action', 'handle_newsletter_signup');
                    formData.append('nonce', '<?php echo wp_create_nonce("newsletter_signup_nonce"); ?>');
                    
                    fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        messageDiv.style.display = 'block';
                        if (data.success) {
                            messageDiv.style.background = 'rgba(0, 255, 157, 0.1)';
                            messageDiv.style.color = 'var(--accent)';
                            messageDiv.textContent = 'Welcome! Check your email for confirmation.';
                            newsletterForm.reset();
                        } else {
                            messageDiv.style.background = 'rgba(255, 0, 0, 0.1)';
                            messageDiv.style.color = '#ff0000';
                            messageDiv.textContent = data.data || 'Error subscribing. Please try again.';
                        }
                    })
                    .catch(error => {
                        messageDiv.style.display = 'block';
                        messageDiv.style.background = 'rgba(255, 0, 0, 0.1)';
                        messageDiv.style.color = '#ff0000';
                        messageDiv.textContent = 'Network error. Please try again.';
                    })
                    .finally(() => {
                        submitBtn.textContent = originalText;
                        submitBtn.disabled = false;
                    });
                });
            }
        });
    </script>
</body>
</html> 