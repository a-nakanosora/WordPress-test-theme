<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>

        <div class="entry-info">

        <?php
        $len = count(get_the_category());
        $id = get_the_category()[0]->cat_ID;

        if($id !== 1) { /// $id === 1  => `未分類`
            echo '<span class="category">category:';
            the_category(' / ');
            echo '</span>';
        }
        ?>

        <?php
        $len = count(get_the_tags());
        $id = get_the_tags()[0]->term_id;

        if($id) {
            echo '<span class="tags">tag:';
            the_tags('', ' / ', '');
            echo '</span>';
        }
        ?>

        <span class="published"><?php the_time('Y/m/d'); ?></span>

        <?php if( get_the_time('Y/m/d') !== get_the_modified_date('Y/m/d') ): ?>
            <span class="updated">(<?php the_modified_date('Y/m/d'); ?> 更新)</span>
        <?php endif; ?>

        </div>

        <?php if( get_the_title() ) : ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php endif; ?>

        <div class="entry-body"><?php the_content(); ?></div>

        </article>
    <?php endwhile; ?>

    <ul class="nav-prevnext">
    <li class="prev-posts-link"><?php previous_posts_link('prev <<'); ?></li>
    <li class="next-posts-link"><?php next_posts_link('>> next'); ?></li>
    </ul>
<?php else: ?>
    <p>nothing</p>
<?php endif; ?>